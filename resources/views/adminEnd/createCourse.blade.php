@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-4">
<h4 class="fw-bold mb-3">Create Course</h4>

<div class="card shadow-sm border-0">
<div class="card-body course-scroll">

<form action="{{ route('admin.storeCourse') }}" method="POST">
@csrf

{{-- 2️⃣ course_code --}}
<div class="mb-3">
    <label class="form-label">Course Code</label>
    <input type="text" name="course_code" class="form-control">
</div>

{{-- 3️⃣ exam_type_id --}}
<div class="mb-3">
    <label class="form-label">Exam Type *</label>
    <select name="exam_type_id" class="form-select" required>
        <option value="">Select Exam</option>
        @foreach($examTypes as $exam)
            <option value="{{ $exam->ExamTypeId }}">
                {{ $exam->ExamTypeName }}
            </option>
        @endforeach
    </select>
</div>

{{-- 4️⃣ CourseTypeId --}}
<div class="mb-3">
    <label class="form-label">Course Type *</label>
    <select name="course_type_id" class="form-select" required>
        @foreach($courseTypes as $type)
            <option value="{{ $type->CourseTypeId }}">
                {{ $type->CourseTypeName }}
            </option>
        @endforeach
    </select>
</div>

{{-- 5️⃣ CourseSubTypeId --}}
<div class="mb-3">
    <label class="form-label">Course Sub Type *</label>
    <select name="course_sub_type_id" class="form-select" required>
        @foreach($courseSubTypes as $sub)
            <option value="{{ $sub->CourseSubTypeId }}">
                {{ $sub->CourseSubTypeName }}
            </option>
        @endforeach
    </select>
</div>

{{-- 6️⃣ CourseMedium --}}
<div class="mb-3">
    <label class="form-label">Medium *</label>
    <select name="course_medium" class="form-select" required>
        <option>Hindi</option>
        <option>English</option>
        <option>English+Hindi</option>
    </select>
</div>

{{-- 7️⃣ CourseName --}}
<div class="mb-3">
    <label class="form-label">Course Name *</label>
    <input type="text" name="course_name" class="form-control" required>
</div>

{{-- 8️⃣ Fee --}}
<div class="mb-3">
    <label class="form-label">Fee Applicable *</label>
    <select name="fee" class="form-select" required>
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
</div>

{{-- 9️⃣ FeeAmount --}}
<div class="mb-3">
    <label class="form-label">Fee Amount *</label>
    <input type="text" name="fee_amount" class="form-control" required>
</div>

{{-- 🔟 BaseYear --}}
<div class="mb-3">
    <label class="form-label">Base Year *</label>
    <input type="number" name="base_year" class="form-control" required>
</div>

{{-- 1️⃣1️⃣ TargetYear --}}
<div class="mb-3">
    <label class="form-label">Target Year *</label>
    <input type="number" name="target_year" class="form-control" required>
</div>

{{-- 1️⃣2️⃣ LiveChannel --}}
<div class="mb-3">
    <label class="form-label">Live Channel *</label>
    <select name="live_channel" class="form-select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
</div>

{{-- 1️⃣3️⃣ LiveChat --}}
<div class="mb-3">
    <label class="form-label">Live Chat *</label>
    <select name="live_chat" class="form-select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
</div>

{{-- 1️⃣4️⃣ CourseStartDate --}}
<div class="mb-3">
    <label class="form-label">Start Date *</label>
    <input type="date" name="course_start_date" class="form-control" required>
</div>

{{-- 1️⃣5️⃣ CourseEndDate --}}
<div class="mb-3">
    <label class="form-label">End Date</label>
    <input type="date" name="course_end_date" class="form-control">
</div>

{{-- 1️⃣6️⃣ CourseStatus --}}
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
@endsection
