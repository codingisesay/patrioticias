@extends('studentEnd.studentLayout')

@section('content')
<div class="container-fluid">
    <h4 class="mb-4">My Classroom</h4>

    <div class="row">
        @forelse($courses as $course)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-dark text-white">
                        <h6 class="mb-0">{{ $course->CourseName }}</h6>
                    </div>

                    <div class="card-body">
                        <p class="mb-1">
                            <strong>Medium:</strong> {{ $course->CourseMedium }}
                        </p>
                        <p class="mb-2">
                            <strong>Start:</strong>
                            {{ date('d M Y', strtotime($course->CourseStartDate)) }}
                        </p>

                        <a href="{{ url('student/classroom/'.$course->CourseId) }}"
                           class="btn btn-dark btn-sm">
                            View
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning">
                    No classroom courses assigned.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
