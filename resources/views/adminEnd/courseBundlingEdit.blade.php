@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-4">

    <div class="mb-4">
        <h4 class="fw-bold mb-1">Edit Course Bundling</h4>
        <p class="text-muted mb-0">Update bundled courses</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form action="{{ route('admin.courseBundling.update', $bundle->CourseBoundlingId) }}"
                  method="POST">
                @csrf
                @method('PUT')

                <div class="row">

                    {{-- MAIN COURSE --}}
                    <div class="col-md-5">
                        <label class="form-label fw-semibold">
                            Main Course <span class="text-danger">*</span>
                        </label>
                        <select name="bundle_course"
                                class="form-select searchable"
                                required>
                            @foreach($courses as $course)
                                <option value="{{ $course->CourseId }}"
                                    {{ $bundle->BoundleCourse == $course->CourseId ? 'selected' : '' }}>
                                    {{ $course->CourseName }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- BUNDLE WITH --}}
                    <div class="col-md-5">
                        <label class="form-label fw-semibold">
                            Bundle With <span class="text-danger">*</span>
                        </label>
                        <select name="bundle_course_with"
                                class="form-select searchable"
                                required>
                            @foreach($courses as $course)
                                <option value="{{ $course->CourseId }}"
                                    {{ $bundle->BoundleCourseWith == $course->CourseId ? 'selected' : '' }}>
                                    {{ $course->CourseName }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- BUTTON --}}
                    <div class="col-md-2 d-flex align-items-end">
                        <button class="btn btn-primary w-100">
                            Update
                        </button>
                    </div>

                </div>

            </form>

        </div>
    </div>

</div>
@endsection
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function () {
    $('.searchable').select2({
        placeholder: "Search course",
        width: '100%'
    });
});
</script>
@endpush
