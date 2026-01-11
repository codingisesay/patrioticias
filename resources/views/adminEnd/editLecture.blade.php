@extends('adminEnd.adminLayout')

@section('content')

{{-- FULL HEIGHT WRAPPER --}}
<div class="container-fluid py-3 lecture-page">

    <h4 class="fw-bold mb-3">Edit Lecture</h4>

    <div class="card shadow-sm border-0 h-100">
        <div class="card-body p-0">

            {{-- SCROLL AREA --}}
            <div class="lecture-scroll p-4">

                <form action="{{ route('admin.updateLecture', $lecture->LectureId) }}" method="POST">
                    @csrf

                    {{-- Course --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Course *</label>
                        <select name="course_id" class="form-select" required>
                            @foreach($courses as $course)
                                <option value="{{ $course->CourseId }}"
                                    {{ $lecture->CourseId == $course->CourseId ? 'selected' : '' }}>
                                    {{ $course->CourseName }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Subject --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Subject *</label>
                        <select name="subject_id" class="form-select" required>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->SubjectId }}"
                                    {{ $lecture->SubjectId == $subject->SubjectId ? 'selected' : '' }}>
                                    {{ $subject->SubjectName }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Topic --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Lecture Topic *</label>
                        <input type="text" class="form-control"
                               name="subject_local_name"
                               value="{{ $lecture->SubjectLocalName }}" required>
                    </div>

                    {{-- Time --}}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Start Time *</label>
                            <input type="datetime-local" class="form-control"
                                   name="lecture_start_time"
                                   value="{{ date('Y-m-d\TH:i', strtotime($lecture->LectureStartTime)) }}"
                                   required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">End Time *</label>
                            <input type="datetime-local" class="form-control"
                                   name="lecture_end_time"
                                   value="{{ date('Y-m-d\TH:i', strtotime($lecture->LectureEndTime)) }}"
                                   required>
                        </div>
                    </div>

                    {{-- Video --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Video Embed Code *</label>
                        <textarea class="form-control" rows="4"
                                  name="video_embed_code">{{ $lecture->VideoEmbedCode }}</textarea>
                    </div>

                    {{-- Preview --}}
                    @if($lecture->VideoEmbedCode)
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Video Preview</label>
                            <div class="ratio ratio-16x9 border rounded">
                                {!! $lecture->VideoEmbedCode !!}
                            </div>
                        </div>
                    @endif

                    {{-- Synopsis --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Synopsis</label>
                        <textarea class="form-control"
                                  rows="3"
                                  name="synopsis">{{ $lecture->Synopsis }}</textarea>
                    </div>

                    {{-- Buttons --}}
                    <div class="text-end">
                        <a href="{{ route('admin.manageLecture') }}" class="btn btn-secondary me-2">
                            Back
                        </a>
                        <button class="btn btn-primary">
                            Update Lecture
                        </button>
                    </div>

                </form>

            </div>
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
@endsection



