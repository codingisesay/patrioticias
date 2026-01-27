@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-4">

    <h4 class="fw-bold mb-3">Edit Course Sub Type</h4>

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form action="{{ route('admin.updateCourseSubType', $courseSubType->CourseSubTypeId) }}"
                  method="POST">
                @csrf

                {{-- Course Type (REQUIRED) --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Course Type *</label>
                    <select name="course_type_id" class="form-select" required>
                        @foreach($courseTypes as $type)
                            <option value="{{ $type->CourseTypeId }}"
                                {{ $courseSubType->CourseTypeId == $type->CourseTypeId ? 'selected' : '' }}>
                                {{ $type->CourseTypeName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Course Sub Type Name --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Course Sub Type Name *</label>
                    <input type="text"
                           name="course_sub_type_name"
                           value="{{ $courseSubType->CourseSubTypeName }}"
                           class="form-control"
                           required>
                </div>

                {{-- Status --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">Status *</label>
                    <select name="status" class="form-select" required>
                        <option value="1" {{ $courseSubType->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $courseSubType->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="text-end">
                    <a href="{{ route('admin.manageCourseSubType') }}"
                       class="btn btn-secondary me-2">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Update Course Sub Type
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
