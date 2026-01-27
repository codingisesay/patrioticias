@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-4">

    <div class="mb-4">
        <h4 class="fw-bold mb-1">Add Course Type</h4>
        <p class="text-muted">
            Create course categories like GS Foundation, Optional, Test Series
        </p>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form action="{{ route('admin.storeCourseType') }}" method="POST">
                @csrf

                {{-- REQUIRED FIELD (DB) --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Course Type Name <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                           name="course_type_name"
                           class="form-control @error('course_type_name') is-invalid @enderror"
                           placeholder="e.g. GS Foundation"
                           value="{{ old('course_type_name') }}">

                    @error('course_type_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- {{-- OPTIONAL: SHORT CODE --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Course Code <span class="text-muted">(Optional)</span>
                    </label>
                    <input type="text"
                           name="course_code"
                           class="form-control"
                           placeholder="e.g. GS-FND">
                </div> -->

                <!-- {{-- OPTIONAL: DESCRIPTION --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Description <span class="text-muted">(Optional)</span>
                    </label>
                    <textarea name="description"
                              class="form-control"
                              rows="3"
                              placeholder="Short description about this course type"></textarea>
                </div> -->

                {{-- OPTIONAL: STATUS --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Status <span class="text-muted"></span>
                    </label>
                    <select name="status" class="form-select">
                        <option value="1" selected>Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
<!-- 
                {{-- OPTIONAL: DISPLAY ORDER --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Display Order <span class="text-muted">(Optional)</span>
                    </label>
                    <input type="number"
                           name="display_order"
                           class="form-control"
                           placeholder="e.g. 1">
                </div> -->

                {{-- BUTTON --}}
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary">
                        Save Course Type
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
