@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-4">

    <h4 class="fw-bold mb-3">Create Lecture</h4>

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
        <div class="card-body lecture-scroll">

            <form action="{{ route('admin.storeLecture') }}" method="POST">
                @csrf

                {{-- 1. Course --}}
               <div class="mb-3">
    <label class="form-label fw-semibold">Course *</label>

    <select name="course_id"
            id="courseSelect"
            class="form-select"
            required>
        <option value="">Select Course</option>

        @foreach($courses as $course)
            <option value="{{ $course->CourseId }}">
                {{ $course->CourseName }}
                @if($course->course_code)
                    (Code: {{ $course->course_code }})
                @endif
            </option>
        @endforeach
    </select>
</div>


                {{-- 2. Subject --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Subject *</label>
                    <select name="subject_id" class="form-select" required>
                        <option value="">Select Subject</option>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->SubjectId }}">
                                {{ $subject->SubjectName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- 3. Subject Local Name --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Lecture Topic *</label>
                    <input type="text"
                           name="subject_local_name"
                           class="form-control"
                           required>
                </div>

                {{-- 4. Start / End Time --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Start Time *</label>
                        <input type="datetime-local"
                               name="lecture_start_time"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">End Time *</label>
                        <input type="datetime-local"
                               name="lecture_end_time"
                               class="form-control"
                               required>
                    </div>
                </div>

                {{-- 5. Faculty (optional) --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Faculty (optional)</label>
                    <input type="number"
                           name="faculty"
                           class="form-control"
                           placeholder="Faculty ID (optional)">
                </div>

                {{-- 6. Video Embed Code --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Video Embed Code *</label>
                    <textarea name="video_embed_code"
                              class="form-control"
                              rows="4"
                              placeholder="Paste iframe embed code"
                              required></textarea>
                </div>

                {{-- 7. Synopsis --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">Synopsis</label>
                    <textarea name="synopsis"
                              class="form-control"
                              rows="3"></textarea>
                </div>

                <div class="text-end">
                    <button class="btn btn-primary">
                        Save Lecture
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<style>
.lecture-scroll{
    max-height: calc(100vh - 220px);
    overflow-y: auto;
    padding-right: 10px;
}
</style>

@push('scripts')
<script>
$(document).ready(function () {
    $('#courseSelect').select2({
        placeholder: "Select Course",
        allowClear: true,
        width: '100%'
    });
});
</script>
@endpush

@endsection
