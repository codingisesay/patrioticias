@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-4">

    <div class="mb-4">
        <h4 class="fw-bold mb-1">Manage Course Sub Type</h4>
        <p class="text-muted">View and manage course sub categories</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Course Type</th>
                        <th>Course Sub Type</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($subTypes as $index => $sub)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td class="fw-semibold">
                                {{ $sub->CourseTypeName }}
                            </td>

                            <td>
                                {{ $sub->CourseSubTypeName }}
                            </td>

                            <td class="text-end">
                                {{-- Edit --}}
                               <a href="{{ route('admin.editCourseSubType', $sub->CourseSubTypeId) }}"
                                    class="btn btn-sm btn-outline-primary">
                                                    Edit
                                </a>


                                {{-- Delete --}}
                                <form action="{{ route('admin.deleteCourseSubType', $sub->CourseSubTypeId) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete?')">
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
                                No course sub types found
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

</div>
@endsection
