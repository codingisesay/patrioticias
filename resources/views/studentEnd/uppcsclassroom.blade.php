@extends('layout')

@section('content')





<div class="container my-5">

    <h2 class="text-center mb-4">UPPCS Classroom Programmes</h2>

    @if($courses->count() == 0)
        <p class="text-center text-muted">No courses available</p>
    @else
        <div class="row">

            @foreach($courses as $course)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">

                        <div class="card-header bg-dark text-white text-center">
                            {{ $course->CourseName }}
                            <br>
                            <small>Code: {{ $course->course_code }}</small>
                        </div>

                        <div class="card-body">
                            <p><strong>Course Type:</strong> {{ $course->CourseTypeName }}</p>
                            <p><strong>Sub Type:</strong> {{ $course->CourseSubTypeName }}</p>
                            <p><strong>Medium:</strong> {{ $course->CourseMedium }}</p>
                            <p><strong>Fee:</strong> ₹ {{ number_format($course->FeeAmount) }}</p>
                        </div>

                        <div class="card-footer text-center">
                            <a href="#" class="btn btn-dark btn-sm">Counselling</a>
                            <a href="#" class="btn btn-outline-dark btn-sm">Details</a>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    @endif

</div>




@endsection