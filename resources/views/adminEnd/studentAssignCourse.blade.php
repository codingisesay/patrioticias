@extends('adminEnd.adminLayout')

@section('content')
<div class="container">
    <h3>Assign Course to Student</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.studentAssignCourse.store') }}">
        @csrf

        <!-- STUDENT -->
        <div class="mb-3">
            <label>Student</label>
            <select name="StudentId" class="form-control" required>
                <option value="">Select Student</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">
                        {{ $student->name }} ({{ $student->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <!-- COURSE -->
        <div class="mb-3">
            <label>Course</label>
            <select name="CourseId" class="form-control" required>
                <option value="">Select Course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->CourseId }}">
                        {{ $course->CourseName }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Assign Course</button>
    </form>
</div>
@endsection
