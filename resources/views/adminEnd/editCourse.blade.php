@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-4">

<h4 class="fw-bold mb-3">Edit Course</h4>

<div class="card shadow-sm">
<div class="card-body course-scroll">

<form method="POST" action="{{ route('admin.updateCourse', $course->CourseId) }}">
@csrf

{{-- 1. Course Code --}}
<div class="mb-3">
    <label>Course Code</label>
    <input type="text" name="course_code" class="form-control"
           value="{{ $course->course_code }}">
</div>

{{-- 2. Exam Type --}}
<div class="mb-3">
    <label>Exam Type</label>
    <select name="exam_type_id" class="form-select">
        @foreach($examTypes as $exam)
            <option value="{{ $exam->ExamTypeId }}"
              {{ $course->exam_type_id == $exam->ExamTypeId ? 'selected' : '' }}>
              {{ $exam->ExamTypeName }}
            </option>
        @endforeach
    </select>
</div>

{{-- 3. Course Type --}}
<div class="mb-3">
    <label>Course Type</label>
    <select name="course_type_id" class="form-select">
        @foreach($courseTypes as $type)
            <option value="{{ $type->CourseTypeId }}"
             {{ $course->CourseTypeId == $type->CourseTypeId ? 'selected' : '' }}>
             {{ $type->CourseTypeName }}
            </option>
        @endforeach
    </select>
</div>

{{-- 4. Course Sub Type --}}
<div class="mb-3">
    <label>Course Sub Type</label>
    <select name="course_sub_type_id" class="form-select">
        @foreach($courseSubTypes as $sub)
            <option value="{{ $sub->CourseSubTypeId }}"
             {{ $course->CourseSubTypeId == $sub->CourseSubTypeId ? 'selected' : '' }}>
             {{ $sub->CourseSubTypeName }}
            </option>
        @endforeach
    </select>
</div>

{{-- 5. Medium --}}
<div class="mb-3">
    <label>Medium</label>
    <select name="course_medium" class="form-select">
        @foreach(['Hindi','English','English+Hindi'] as $m)
            <option {{ $course->CourseMedium==$m?'selected':'' }}>{{ $m }}</option>
        @endforeach
    </select>
</div>

{{-- 6. Course Name --}}
<div class="mb-3">
    <label>Course Name</label>
    <input type="text" name="course_name" class="form-control"
           value="{{ $course->CourseName }}">
</div>

{{-- 7. Fee --}}
<div class="row">
<div class="col-md-6">
    <label>Fee</label>
    <select name="fee" class="form-select">
        <option value="1" {{ $course->Fee==1?'selected':'' }}>Yes</option>
        <option value="0" {{ $course->Fee==0?'selected':'' }}>No</option>
    </select>
</div>

<div class="col-md-6">
    <label>Fee Amount</label>
    <input type="text" name="fee_amount" class="form-control"
           value="{{ $course->FeeAmount }}">
</div>
</div>

{{-- 8. Years --}}
<div class="row mt-3">
<div class="col-md-6">
    <label>Base Year</label>
    <input type="number" name="base_year" class="form-control"
           value="{{ $course->BaseYear }}">
</div>

<div class="col-md-6">
    <label>Target Year</label>
    <input type="number" name="target_year" class="form-control"
           value="{{ $course->TargetYear }}">
</div>
</div>

{{-- 9. Live --}}
<div class="row mt-3">
<div class="col-md-6">
    <label>Live Channel</label>
    <select name="live_channel" class="form-select">
        <option value="1" {{ $course->LiveChannel==1?'selected':'' }}>Yes</option>
        <option value="0" {{ $course->LiveChannel==0?'selected':'' }}>No</option>
    </select>
</div>

<div class="col-md-6">
    <label>Live Chat</label>
    <select name="live_chat" class="form-select">
        <option value="1" {{ $course->LiveChat==1?'selected':'' }}>Yes</option>
        <option value="0" {{ $course->LiveChat==0?'selected':'' }}>No</option>
    </select>
</div>
</div>

{{-- 10. Dates --}}
<div class="row mt-3">
<div class="col-md-6">
    <label>Start Date</label>
    <input type="date" name="course_start_date" class="form-control"
           value="{{ $course->CourseStartDate }}">
</div>

<div class="col-md-6">
    <label>End Date</label>
    <input type="date" name="course_end_date" class="form-control"
           value="{{ $course->CourseEndDate }}">
</div>
</div>

{{-- 11. Status --}}
<div class="mt-3">
    <label>Status</label>
    <select name="course_status" class="form-select">
        <option value="1" {{ $course->CourseStatus==1?'selected':'' }}>Active</option>
        <option value="0" {{ $course->CourseStatus==0?'selected':'' }}>Inactive</option>
    </select>
</div>

<div class="text-end mt-4">
    <button class="btn btn-primary">Update Course</button>
</div>

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
