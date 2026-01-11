@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-4">

    <div class="mb-3">
        <h4 class="fw-bold mb-1">Edit Counselling</h4>
        <p class="text-muted">Update counselling details</p>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body counselling-scroll">

            <form action="{{ route('admin.updateCounselling', $counselling->id) }}" method="POST">
                @csrf

                {{-- Course --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Course *</label>
                    <select name="course_id" class="form-select" required>
                        @foreach($courses as $course)
                            <option value="{{ $course->CourseId }}"
                                @selected($course->CourseId == $counselling->course_id)>
                                {{ $course->CourseName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Name --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Student Name *</label>
                    <input type="text" name="enq_per_name"
                           value="{{ $counselling->enq_per_name }}"
                           class="form-control" required>
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email *</label>
                    <input type="email" name="enq_per_email"
                           value="{{ $counselling->enq_per_email }}"
                           class="form-control" required>
                </div>

                {{-- Phone --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Phone *</label>
                    <input type="text" name="enq_per_phone"
                           value="{{ $counselling->enq_per_phone }}"
                           class="form-control" required>
                </div>

                {{-- Message --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Message *</label>
                    <textarea name="enq_per_msg"
                              class="form-control"
                              rows="3"
                              required>{{ $counselling->enq_per_msg }}</textarea>
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Status *</label>
                    <select name="counselling_status" class="form-select">
                        <option value="0" @selected($counselling->counselling_status == 0)>
                            Pending
                        </option>
                        <option value="1" @selected($counselling->counselling_status == 1)>
                            Completed
                        </option>
                    </select>
                </div>

                {{-- Comment --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Comment</label>
                    <textarea name="counselling_comment"
                              class="form-control"
                              rows="2">{{ $counselling->counselling_comment }}</textarea>
                </div>

                {{-- Date --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">Counselling Date & Time</label>
                    <input type="datetime-local"
                           name="counsellingDateTime"
                           value="{{ $counselling->counsellingDateTime }}"
                           class="form-control">
                </div>

                <div class="text-end">
                    <button class="btn btn-primary">Update Counselling</button>
                </div>

            </form>

        </div>
    </div>

</div>

<style>
.counselling-scroll{
    max-height: calc(100vh - 220px);
    overflow-y: auto;
}
</style>
@endsection