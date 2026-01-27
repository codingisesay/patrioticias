@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-4">
    <h4 class="fw-bold mb-3">Create Course</h4>

    <div class="card shadow-sm border-0">
        <div class="card-body course-scroll">

            <form action="{{ route('admin.storeCourse') }}" method="POST">
                @csrf

                {{-- Course Code --}}
                <div class="mb-3">
                    <label class="form-label">Course Code</label>
                    <input type="text" name="course_code" class="form-control">
                </div>

                {{-- Exam Type (SEARCHABLE) --}}
                <div class="mb-3">
                    <label class="form-label">Exam Type *</label>
                    <select name="exam_type_id"
                            class="form-select searchable-select"
                            required>
                        <option value="">Select Exam</option>
                        @foreach($examTypes as $exam)
                            <option value="{{ $exam->ExamTypeId }}">
                                {{ $exam->ExamTypeName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Course Type (SEARCHABLE) --}}
                <div class="mb-3">
                    <label class="form-label">Course Type *</label>
                    <select name="course_type_id"
                            class="form-select searchable-select"
                            required>
                        <option value="">Select Course Type</option>
                        @foreach($courseTypes as $type)
                            <option value="{{ $type->CourseTypeId }}">
                                {{ $type->CourseTypeName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Course Sub Type (SEARCHABLE) --}}
                <div class="mb-3">
                    <label class="form-label">Course Sub Type *</label>
                    <select name="course_sub_type_id"
                            class="form-select searchable-select"
                            required>
                        <option value="">Select Course Sub Type</option>
                        @foreach($courseSubTypes as $sub)
                            <option value="{{ $sub->CourseSubTypeId }}">
                                {{ $sub->CourseSubTypeName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Medium --}}
                <div class="mb-3">
                    <label class="form-label">Medium *</label>
                    <select name="course_medium" class="form-select" required>
                        <option>Hindi</option>
                        <option>English</option>
                        <option>English+Hindi</option>
                    </select>
                </div>

                {{-- Course Name --}}
                <div class="mb-3">
                    <label class="form-label">Course Name *</label>
                    <input type="text" name="course_name" class="form-control" required>
                </div>

                {{-- Fee --}}
                <div class="mb-3">
                    <label class="form-label">Fee Applicable *</label>
                    <select name="fee" class="form-select" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                {{-- Fee Amount --}}
                <div class="mb-3">
                    <label class="form-label">Fee Amount *</label>
                    <input type="number" name="fee_amount" class="form-control" required>
                </div>

                {{-- Base Year --}}
                <div class="mb-3">
                    <label class="form-label">Base Year *</label>
                    <input type="number" name="base_year" class="form-control" required>
                </div>

                {{-- Target Year --}}
                <div class="mb-3">
                    <label class="form-label">Target Year *</label>
                    <input type="number" name="target_year" class="form-control" required>
                </div>

                {{-- Live Channel --}}
                <div class="mb-3">
                    <label class="form-label">Live Channel *</label>
                    <select name="live_channel" class="form-select">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                {{-- Live Chat --}}
                <div class="mb-3">
                    <label class="form-label">Live Chat *</label>
                    <select name="live_chat" class="form-select">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                {{-- Start Date --}}
                <div class="mb-3">
                    <label class="form-label">Start Date *</label>
                    <input type="date" name="course_start_date" class="form-control" required>
                </div>

                {{-- End Date --}}
                <div class="mb-3">
                    <label class="form-label">End Date</label>
                    <input type="date" name="course_end_date" class="form-control">
                </div>

                {{-- Status --}}
                <div class="mb-4">
                    <label class="form-label">Status *</label>
                    <select name="course_status" class="form-select">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <button class="btn btn-primary">Save Course</button>
            </form>

        </div>
    </div>
</div>

<style>
.course-scroll{
    max-height: calc(100vh - 200px);
    overflow-y: auto;
}
</style>

{{-- SAME SEARCH BEHAVIOUR AS CREATE LECTURE --}}
@push('scripts')
<script>
$(document).ready(function () {
    $('.searchable-select').select2({
        placeholder: "Select option",
        allowClear: true,
        width: '100%'
    });
});
</script>
@endpush

@endsection
