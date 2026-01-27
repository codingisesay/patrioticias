@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-4">

    {{-- PAGE HEADER --}}
    <div class="mb-4">
        <h4 class="fw-bold mb-1">Manage Course Bundling</h4>
        <p class="text-muted mb-0">View and delete course bundles</p>
    </div>

    {{-- SUCCESS MESSAGE --}}
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
                        <th>Main Course</th>
                        <th>Bundled With</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($bundles as $index => $bundle)
                    <tr>
                        <td>{{ $index + 1 }}</td>

                        <td class="fw-semibold">
                            {{ $bundle->MainCourse }}
                        </td>

                        <td>
                            {{ $bundle->BundledWith }}
                        </td>

                       <td class="text-end">

                        <a href="{{ route('admin.courseBundling.edit', $bundle->CourseBoundlingId) }}"
                        class="btn btn-sm btn-outline-primary">
                            Edit
                        </a>

                        <form action="{{ route('admin.courseBundling.delete', $bundle->CourseBoundlingId) }}"
                            method="POST"
                            class="d-inline"
                            onsubmit="return confirm('Delete this course bundling?')">
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
                            No course bundling found
                        </td>
                    </tr>
                @endforelse
                </tbody>

            </table>

        </div>
    </div>

</div>
@endsection
