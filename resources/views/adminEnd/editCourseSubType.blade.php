@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-4">

    <div class="mb-4">
        <h4 class="fw-bold mb-1">Edit Course Sub Type</h4>
        <p class="text-muted">Update course sub category details</p>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form action="{{ route('admin.updateCourseSubType', $courseSubType->CourseSubTypeId) }}"
                  method="POST">
                @csrf

                {{-- Course Type --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Course Type <span class="text-danger">*</span>
                    </label>

                    <select name="course_type_id"
                            class="form-select @error('course_type_id') is-invalid @enderror">
                        <option value="">Select Course Type</option>

                        @foreach($courseTypes as $type)
                            <option value="{{ $type->CourseTypeId }}"
                                {{ $courseSubType->CourseTypeId == $type->CourseTypeId ? 'selected' : '' }}>
                                {{ $type->CourseTypeName }}
                            </option>
                        @endforeach
                    </select>

                    @error('course_type_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Course Sub Type Name --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Course Sub Type Name <span class="text-danger">*</span>
                    </label>

                    <input type="text"
                           name="course_sub_type_name"
                           class="form-control @error('course_sub_type_name') is-invalid @enderror"
                           value="{{ old('course_sub_type_name', $courseSubType->CourseSubTypeName) }}">

                    @error('course_sub_type_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Buttons --}}
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.manageCourseSubType') }}"
                       class="btn btn-light">
                        Cancel
                    </a>

                    <button class="btn btn-primary">
                        Update Course Sub Type
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
