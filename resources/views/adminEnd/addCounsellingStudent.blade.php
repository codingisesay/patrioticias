@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="mb-3">
        <h4 class="fw-bold mb-1">Add Counselling Request</h4>
        <p class="text-muted mb-0">Register student counselling enquiry</p>
    </div>

    {{-- Success --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Card --}}
    <div class="card shadow-sm border-0">
        <div class="card-body counselling-scroll">

            <form action="{{ route('admin.storeCounselling') }}" method="POST">
                @csrf

                {{-- Course --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Select Course <span class="text-danger">*</span>
                    </label>
                    <select name="course_id" class="form-select" required>
                        <option value="">Select Course</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->CourseId }}">
                                {{ $course->CourseName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Name --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Student Name <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="enq_per_name" class="form-control" required>
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Email <span class="text-danger">*</span>
                    </label>
                    <input type="email" name="enq_per_email" class="form-control" required>
                </div>

                {{-- Phone --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Phone Number <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="enq_per_phone" class="form-control" required>
                </div>

                {{-- Message --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Enquiry Message <span class="text-danger">*</span>
                    </label>
                    <textarea name="enq_per_msg" class="form-control" rows="3" required></textarea>
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Counselling Status <span class="text-danger">*</span>
                    </label>
                    <select name="counselling_status" class="form-select" required>
                        <option value="0">Pending</option>
                        <option value="1">Completed</option>
                    </select>
                </div>

                {{-- Optional Comment --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Counselling Comment (Optional)
                    </label>
                    <textarea name="counselling_comment" class="form-control" rows="2"></textarea>
                </div>

                {{-- Optional Date --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Counselling Date & Time (Optional)
                    </label>
                    <input type="datetime-local" name="counsellingDateTime" class="form-control">
                </div>

                {{-- Buttons --}}
                <div class="text-end">
                    <button class="btn btn-primary">
                        Save Counselling
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

{{-- SCROLL FIX --}}
<style>
.counselling-scroll{
    max-height: calc(100vh - 220px);
    overflow-y: auto;
    padding-right: 10px;
}
</style>
@endsection
