@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-3">

    <div class="testpaper-scroll">

        <h4 class="fw-bold mb-3">Create Prelims Test Paper</h4>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <form method="POST"
                      action="{{ route('admin.prelims.storeTestPaper') }}">
                    @csrf

                    {{-- Course --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Course *
                        </label>
                        <select name="course_id"
                                class="form-select"
                                required>
                            <option value="">Select Course</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->CourseId }}">
                                    {{ $course->CourseName }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Subject --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Subject *
                        </label>
                        <select name="test_paper_subject_id"
                                class="form-select"
                                required>
                            <option value="">Select Subject</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->SubjectId }}">
                                    {{ $subject->SubjectName }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Test Paper Name --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Test Paper Name *
                        </label>
                        <input type="text"
                               name="test_paper_name"
                               class="form-control"
                               placeholder="Eg: Polity Prelims Test - 01"
                               required>
                    </div>

                    <div class="text-end">
                        <button class="btn btn-primary">
                            Save Test Paper
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

{{-- SCROLL FIX --}}
<style>
.testpaper-scroll{
    max-height: calc(100vh - 160px);
    overflow-y: auto;
    padding-right: 12px;
}
</style>
@endsection
