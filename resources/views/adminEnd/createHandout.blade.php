@extends('adminEnd.adminLayout')

@section('content')

{{-- ===============================
   FULL PAGE SCROLLABLE WRAPPER
================================ --}}
<div class="container-fluid py-3">

    <div class="handout-scroll">

        {{-- ===============================
           PAGE TITLE
        ================================ --}}
        <h4 class="fw-bold mb-3">Add Lecture Handout</h4>

        {{-- ===============================
           HANDOUT UPLOAD CARD
        ================================ --}}
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">

                {{-- Lecture Info --}}
                <div class="mb-4">
                    <strong>Course:</strong> {{ $lecture->CourseName }} <br>
                    <strong>Subject:</strong> {{ $lecture->SubjectName }} <br>
                    <strong>Lecture Topic:</strong> {{ $lecture->SubjectLocalName }}
                </div>

                <form action="{{ route('admin.storeHandout') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    <input type="hidden"
                           name="lecture_id"
                           value="{{ $lecture->LectureId }}">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Handout Name *
                        </label>
                        <input type="text"
                               name="handout_name"
                               class="form-control"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Upload Handout *
                        </label>
                        <input type="file"
                               name="handout_file"
                               class="form-control"
                               accept=".pdf,.doc,.docx"
                               required>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('admin.manageLecture') }}"
                           class="btn btn-secondary me-2">
                            Back
                        </a>
                        <button class="btn btn-primary">
                            Upload Handout
                        </button>
                    </div>

                </form>
            </div>
        </div>

        {{-- ===============================
           SUBJECTIVE QUESTION SECTION
        ================================ --}}
        <div class="card mb-4">
            <div class="card-header fw-bold">
                Subjective Question Section
            </div>

            <div class="card-body">

                <form method="POST"
                      action="{{ route('admin.addSubjectiveQuestion') }}">
                    @csrf

                    <input type="hidden"
                           name="lecture_id"
                           value="{{ $lecture->LectureId }}">

                    <div class="mb-3">
                        <label>Select Question</label>
                        <select name="subjective_question_id"
                                class="form-select" required>
                            <option value="">Select any one</option>
                            @foreach($subjectiveQuestions as $q)
                                <option value="{{ $q->SubjectiveQuestionId }}">
                                    {{ $q->QuestionText }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label>Question Nature</label>
                            <select name="nature_id"
                                    class="form-select" required>
                                <option value="">Select any one</option>
                                @foreach($questionNatures as $n)
                                    <option value="{{ $n->NatureSubjectiveQuestionId }}">
                                        {{ $n->NatureName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Question Marks</label>
                            <input type="text"
                                   name="marks"
                                   class="form-control"
                                   placeholder="Ex-10 Marks" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Word Limit</label>
                            <input type="text"
                                   name="word_limit"
                                   class="form-control"
                                   placeholder="Ex-250 Words" required>
                        </div>
                    </div>

                    <button class="btn btn-success">
                        Submit
                    </button>

                </form>
            </div>
        </div>

        {{-- ===============================
           OBJECTIVE QUESTION SECTION
        ================================ --}}
        <div class="card mb-4">
            <div class="card-header fw-bold">
                Objective Question Section
            </div>

            <div class="card-body">

                <form method="POST"
                      action="{{ route('admin.addObjectiveQuestion') }}">
                    @csrf

                    <input type="hidden"
                           name="lecture_id"
                           value="{{ $lecture->LectureId }}">

                    <div class="mb-3">
                        <label>Select Question</label>
                        <select name="objective_question_id"
                                class="form-select" required>
                            <option value="">Select any one</option>
                            @foreach($objectiveQuestions as $q)
                                <option value="{{ $q->ObjectiveQuestionId }}">
                                    {{ $q->Question }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Question Marks</label>
                        <input type="text"
                               name="marks"
                               class="form-control"
                               placeholder="Ex-10 Marks" required>
                    </div>

                    <button class="btn btn-success">
                        Submit
                    </button>

                </form>
            </div>
        </div>

    </div> {{-- handout-scroll --}}
</div>

{{-- ===============================
   SCROLL CSS (NO LAYOUT CHANGE)
================================ --}}
<style>
.handout-scroll{
    max-height: calc(100vh - 160px); /* header + padding safe */
    overflow-y: auto;
    padding-right: 12px;
}
</style>

@endsection
