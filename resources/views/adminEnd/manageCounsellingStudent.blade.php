@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h4 class="fw-bold mb-1">Manage Counselling Requests</h4>
            <p class="text-muted mb-0">View & manage student counselling enquiries</p>
        </div>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Card --}}
    <div class="card shadow-sm border-0">
        <div class="card-body table-responsive">

            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Student</th>
                        <th>Course</th>
                        <th>Contact</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($counsellings as $index => $row)
                    <tr>
                        <td>{{ $index + 1 }}</td>

                        <td>
                            <strong>{{ $row->enq_per_name }}</strong><br>
                            <small class="text-muted">{{ $row->enq_per_email }}</small>
                        </td>

                        <td>
                            {{ $row->course_name ?? '—' }}
                        </td>

                        <td>
                            {{ $row->enq_per_phone }}
                        </td>

                        <td>
                            @if($row->counselling_status == 1)
                                <span class="badge bg-success">Completed</span>
                            @else
                                <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                        </td>

                        <td>
                            {{ $row->counsellingDateTime 
                                ? \Carbon\Carbon::parse($row->counsellingDateTime)->format('d M Y, h:i A')
                                : '-' }}
                        </td>

                        <td class="text-end">
                            <a href="{{ route('admin.editCounselling', $row->id) }}"
                               class="btn btn-sm btn-outline-primary">
                                Edit
                            </a>

                            <form action="{{ route('admin.deleteCounselling', $row->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">
                            No counselling requests found
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
