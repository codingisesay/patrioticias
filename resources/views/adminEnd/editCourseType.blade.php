@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-4">

    <div class="mb-4">
        <h4 class="fw-bold mb-1">Edit Course Type</h4>
        <p class="text-muted mb-0">Update course type details</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form action="{{ route('admin.updateCourseType', $courseType->CourseTypeId) }}"
                  method="POST">
                @csrf
                @method('PUT')

                {{-- Course Type Name --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Course Type Name *
                    </label>
                    <input type="text"
                           name="course_type_name"
                           class="form-control"
                           value="{{ old('course_type_name', $courseType->CourseTypeName) }}"
                           required>
                </div>

                <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>


                {{-- Buttons --}}
                <div class="text-end">
                    <a href="{{ route('admin.manageCourseType') }}"
                       class="btn btn-secondary me-2">
                        Back
                    </a>

                    <button class="btn btn-primary">
                        Update Course Type
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
