@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Manage Student Assign Course</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Status</th>
                        <th>Assigned On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($assignments as $key => $row)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $row->student_name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->CourseName }}</td>
                        <td>
                            @if($row->status == '1')
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                        <td>
                            <form method="POST"
                                  action="{{ route('admin.student.assign.delete', $row->StudentAssignCourseId) }}"
                                  onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No records found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
