@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-4">

    <div class="mb-4">
        <h4 class="fw-bold mb-1">Add Course Sub Type</h4>
        <p class="text-muted">Create sub categories under course types</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form action="{{ route('admin.storeCourseSubType') }}" method="POST">
                @csrf

                {{-- Course Type (REQUIRED) --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Course Type <span class="text-danger">*</span>
                    </label>
                    <select name="course_type_id"
                            class="form-select @error('course_type_id') is-invalid @enderror">
                        <option value="">Select Course Type</option>
                        @foreach($courseTypes as $type)
                            <option value="{{ $type->CourseTypeId }}"
                                {{ old('course_type_id') == $type->CourseTypeId ? 'selected' : '' }}>
                                {{ $type->CourseTypeName }}
                            </option>
                        @endforeach
                    </select>

                    @error('course_type_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Course Sub Type Name (REQUIRED) --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Course Sub Type Name <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                           name="course_sub_type_name"
                           class="form-control @error('course_sub_type_name') is-invalid @enderror"
                           placeholder="e.g. GS Foundation 1 Year"
                           value="{{ old('course_sub_type_name') }}">

                    @error('course_sub_type_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- OPTIONAL UI FIELDS (DB me save nahi honge) --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Description (Optional)</label>
                    <textarea class="form-control"
                              rows="3"
                              placeholder="Optional description (UI purpose only)"></textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary">
                        Save Course Sub Type
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
