@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-3">

    <h4 class="fw-bold mb-3">Manage Prelims Test Papers</h4>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body table-responsive">

            <table class="table table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Test Paper Name</th>
                        <th>Course</th>
                        <th>Subject</th>
                        <th>Created At</th>
                        <th width="120">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testPapers as $key => $paper)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $paper->TestPaperLocalName }}</td>
                            <td>{{ $paper->CourseName }}</td>
                            <td>{{ $paper->SubjectName }}</td>
                            <td>{{ date('d M Y', strtotime($paper->created_at)) }}</td>
                            <td>
                                <a href="{{ route('admin.prelims.deleteTestPaper', $paper->PrelimsTestPaperId) }}"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Are you sure?')">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                No test papers found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
