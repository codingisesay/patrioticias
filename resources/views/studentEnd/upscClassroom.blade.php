@extends('layout')

@section('content')

<section class="py-5">
    <div class="container">

        <h2 class="text-center fw-bold mb-4">Classroom Programmes</h2>

        @if($courses->count() == 0)
            <p class="text-center text-muted">No courses available</p>
        @endif

        <div class="row g-4">

            @foreach($courses as $course)
            <div class="col-md-4">
                <div class="card shadow-sm h-100">

                    {{-- Header --}}
                    <div class="bg-dark text-white text-center py-3 fw-semibold">
                        {{ $course->CourseName }}
                        @if($course->course_code)
                            <div class="small">(Code: {{ $course->course_code }})</div>
                        @endif
                    </div>

                    {{-- Body --}}
                    <div class="card-body">
                        <p><strong>Course Type:</strong> {{ $course->CourseTypeName }}</p>
                        <p><strong>Course Sub Type:</strong> {{ $course->CourseSubTypeName }}</p>
                        <p><strong>Course Medium:</strong> {{ $course->CourseMedium }}</p>
                        <p><strong>Course Fee:</strong> ₹ {{ number_format($course->FeeAmount) }}</p>
                        <p><strong>Batch:</strong> {{ $course->BaseYear }} – {{ $course->TargetYear }}</p>
                    </div>

                    {{-- Footer --}}
                    <div class="card-footer bg-white border-0 text-center">
                        <a href="#" class="btn btn-dark btn-sm me-2">Counselling</a>
                        <a href="#" class="btn btn-outline-dark btn-sm">Details</a>
                    </div>

                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>
@endsection