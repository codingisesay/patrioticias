@extends('adminEnd.adminLayout')

@section('content')
<head>
<style>
  .table-scroll {
    max-height: calc(100vh - 260px); /* adjust based on your header size */
    overflow-y: auto;
  }
</style>
</head>
<div class="container-fluid py-4">
  <div class="card shadow-sm">
    <div class="card-body">

      <h4 class="mb-3">Manage Courses</h4>

      <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-3">
        <div class="d-flex align-items-center gap-2">
          <label class="mb-0 small text-muted">Entries per page</label>
          <select id="perPage" class="form-select form-select-sm" style="width:110px;">
            <option value="10" selected>10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
          </select>
        </div>

        <div class="d-flex align-items-center gap-2">
          <label class="mb-0 small text-muted">Search:</label>
          <input id="searchBox" type="text" class="form-control form-control-sm" style="width:260px;"
                 placeholder="Search by id, name, email, mobile, status">
        </div>
      </div>

   <div class="table-responsive table-scroll">
   <table class="table table-bordered table-hover align-middle w-100 mb-0">
          <thead class="table-dark">
          <tr>
            <th style="white-space:nowrap;">Student Id</th>
            <th>Name</th>
            <th>Mail Id</th>
            <th style="white-space:nowrap;">Mobile No.</th>
            <th>Status</th>
            <th style="width:90px;">Edit</th>
            <th style="width:90px;">Print</th>
          </tr>
          </thead>
          <tbody id="tableBody"></tbody>
        </table>
      </div>

      <div class="d-flex flex-wrap justify-content-between align-items-center mt-3 gap-2">
        <div id="infoText" class="small text-muted"></div>
        <nav>
          <ul id="pagination" class="pagination pagination-sm mb-0"></ul>
        </nav>
      </div>

    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  // ✅ STATIC DATA (works now because layout has @yield('scripts'))
  var students = [
    { id: 1,  name: "Akash Singh",        email: "akashsngh681681@gmail.com",  mobile: "6394877241", status: "Active" },
    { id: 5,  name: "Amit Gupta",         email: "amitgupt2603@gmail.com",     mobile: "9315316296", status: "Active" },
    { id: 6,  name: "Priyanka Gupta",     email: "patrioticias@gmail.com",     mobile: "9140950989", status: "Active" },
    { id: 7,  name: "Vinay Kumar Dobare", email: "ramadheenprasad4@gmail.com", mobile: "9532229487", status: "Active" },
    { id: 8,  name: "Pooja Yadav",        email: "mrranjeet9336@gmail.com",    mobile: "8468029028", status: "Active" },
    { id: 9,  name: "Shreya Pathak",      email: "Pathakshreya2777@gmail",     mobile: "7706894055", status: "Active" },
    { id: 10, name: "Shreya Pathak",      email: "shreyapatriotic@gmail.com",  mobile: "7706894055", status: "Active" },
    { id: 11, name: "Neha Yadav",         email: "nehayadav876h@gmail.com",    mobile: "8957449099", status: "Active" },
    { id: 12, name: "Deepali Tripathi",   email: "deepalipatriotic@gmail.com", mobile: "8303779703", status: "Active" },
    { id: 13, name: "Pooja Yadav",        email: "Pooja0610@gmail.com",        mobile: "8468029028", status: "Active" }
  ];

  var tableBody = document.getElementById("tableBody");
  var pagination = document.getElementById("pagination");
  var perPageSelect = document.getElementById("perPage");
  var searchBox = document.getElementById("searchBox");
  var infoText = document.getElementById("infoText");
  var currentPage = 1;

  function escapeHtml(str) {
    str = String(str === undefined || str === null ? "" : str);
    return str
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");
  }

  function getFilteredData() {
    var q = (searchBox.value || "").replace(/^\s+|\s+$/g, "").toLowerCase();
    if (!q) return students;

    var out = [];
    for (var i = 0; i < students.length; i++) {
      var s = students[i];
      var hay = (s.id + " " + s.name + " " + s.email + " " + s.mobile + " " + s.status).toLowerCase();
      if (hay.indexOf(q) !== -1) out.push(s);
    }
    return out;
  }

  function renderTable() {
    var perPage = parseInt(perPageSelect.value, 10);
    var filtered = getFilteredData();
    var total = filtered.length;
    var totalPages = Math.max(1, Math.ceil(total / perPage));

    if (currentPage > totalPages) currentPage = totalPages;
    if (currentPage < 1) currentPage = 1;

    var startIndex = (currentPage - 1) * perPage;
    var pageRows = filtered.slice(startIndex, startIndex + perPage);

    if (pageRows.length === 0) {
      tableBody.innerHTML = '<tr><td colspan="7" class="text-center text-muted py-4">No data found</td></tr>';
    } else {
      var html = "";
      for (var i = 0; i < pageRows.length; i++) {
        var s = pageRows[i];
        var badgeClass = (s.status === "Active") ? "text-bg-success" : "text-bg-secondary";

        html += '<tr>' +
          '<td>' + escapeHtml(s.id) + '</td>' +
          '<td>' + escapeHtml(s.name) + '</td>' +
          '<td>' + escapeHtml(s.email) + '</td>' +
          '<td>' + escapeHtml(s.mobile) + '</td>' +
          '<td><span class="badge ' + badgeClass + '">' + escapeHtml(s.status) + '</span></td>' +
          '<td><a class="btn btn-sm btn-warning" href="/students/' + encodeURIComponent(s.id) + '/edit">Edit</a></td>' +
          '<td><button class="btn btn-sm btn-info" onclick="printStudent(' + Number(s.id) + ')">Print</button></td>' +
        '</tr>';
      }
      tableBody.innerHTML = html;
    }

    var from = total === 0 ? 0 : startIndex + 1;
    var to = Math.min(startIndex + perPage, total);
    infoText.textContent = "Showing " + from + " to " + to + " of " + total + " entries";

    renderPagination(totalPages);
  }

  function renderPagination(totalPages) {
    var maxButtons = 5;
    var start = Math.max(1, currentPage - Math.floor(maxButtons / 2));
    var end = start + maxButtons - 1;

    if (end > totalPages) {
      end = totalPages;
      start = Math.max(1, end - maxButtons + 1);
    }

    var items = "";
    items += '<li class="page-item ' + (currentPage === 1 ? "disabled" : "") + '">' +
      '<button class="page-link" onclick="goToPage(' + (currentPage - 1) + ')">Prev</button></li>';

    if (start > 1) {
      items += '<li class="page-item"><button class="page-link" onclick="goToPage(1)">1</button></li>';
      if (start > 2) items += '<li class="page-item disabled"><span class="page-link">…</span></li>';
    }

    for (var p = start; p <= end; p++) {
      items += '<li class="page-item ' + (p === currentPage ? "active" : "") + '">' +
        '<button class="page-link" onclick="goToPage(' + p + ')">' + p + '</button></li>';
    }

    if (end < totalPages) {
      if (end < totalPages - 1) items += '<li class="page-item disabled"><span class="page-link">…</span></li>';
      items += '<li class="page-item"><button class="page-link" onclick="goToPage(' + totalPages + ')">' + totalPages + '</button></li>';
    }

    items += '<li class="page-item ' + (currentPage === totalPages ? "disabled" : "") + '">' +
      '<button class="page-link" onclick="goToPage(' + (currentPage + 1) + ')">Next</button></li>';

    pagination.innerHTML = items;
  }

  window.goToPage = function(page) {
    currentPage = page;
    renderTable();
  };

  window.printStudent = function(studentId) {
    alert("Print Student ID: " + studentId);
  };

  perPageSelect.addEventListener("change", function() {
    currentPage = 1;
    renderTable();
  });

  searchBox.addEventListener("input", function() {
    currentPage = 1;
    renderTable();
  });

  renderTable();
</script>
@endsection
