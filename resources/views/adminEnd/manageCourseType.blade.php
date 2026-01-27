@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-4">

    <div class="mb-4">
        <h4 class="fw-bold mb-1">Manage Course Types</h4>
        <p class="text-muted mb-0">View, edit or delete course types</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <table class="table align-middle table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Course Type Name</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($courseTypes as $index => $type)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td class="fw-semibold">
                                {{ $type->CourseTypeName }}
                            </td>

                            {{-- STATUS --}}
                            <td>
                                <span class="badge {{ $type->status == 1 ? 'bg-success' : 'bg-danger' }}">
                                    {{ $type->status == 1 ? 'Active' : 'Inactive' }}
                                </span>
                            </td>

                            {{-- ACTION --}}
                            <td class="text-end">
                                <a href="{{ route('admin.editCourseType', $type->CourseTypeId) }}"
                                   class="btn btn-sm btn-outline-primary me-2">
                                    Edit
                                </a>

                                <form action="{{ route('admin.deleteCourseType', $type->CourseTypeId) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this course type?')">
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
                            <td colspan="4" class="text-center text-muted py-4">
                                No course types found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
