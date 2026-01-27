@extends('studentEnd.studentLayout')


@section('content')

<div class="container-fluid">

    {{-- COURSE TITLE --}}
    <h4 class="mb-3">{{ $course->CourseName }}</h4>

    <div class="row">

        {{-- ================= LEFT SUBJECT TREE ================= --}}
        <div class="col-md-3 border-end">
            <h6 class="mb-3">Classes</h6>

            @foreach($subjects as $subject)
                <div class="mb-2">
                    <strong>{{ $subject->SubjectName }}</strong>

                    <ul class="list-unstyled ms-2 mt-1">
                        @foreach($lectures[$subject->SubjectId] ?? [] as $lec)
                            <li class="small mb-1">
                                <a href="{{ route('student.lecture.view', $lec->LectureId) }}"
                                   class="text-decoration-none">
                                    {{ $lec->LectureTitle ?? 'Lecture '.$lec->LectureId }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>

        {{-- ================= RIGHT CONTENT ================= --}}
        <div class="col-md-9">

            {{-- TABS --}}
            <ul class="nav nav-tabs mb-3" id="courseTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active"
                       data-bs-toggle="tab"
                       href="#video">
                        VIDEO
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       data-bs-toggle="tab"
                       href="#handouts">
                        HANDOUTS
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       data-bs-toggle="tab"
                       href="#prelims">
                        PRELIMS PRACTICE QUESTIONS
                    </a>
                </li>
            </ul>

            {{-- TAB CONTENT --}}
            <div class="tab-content">

                {{-- ================= VIDEO TAB ================= --}}
                <div class="tab-pane fade show active" id="video">
                    <div class="alert alert-info">
                        Please select a lecture from the left panel to watch video.
                    </div>
                </div>

                {{-- ================= HANDOUT TAB ================= --}}
                <div class="tab-pane fade" id="handouts">
                    <div class="alert alert-warning">
                        Handouts will appear after selecting a lecture.
                    </div>
                </div>

                {{-- ================= PRELIMS TAB ================= --}}
                <div class="tab-pane fade" id="prelims">
                    <div class="alert alert-secondary">
                        Prelims practice questions will be shown here.
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection


