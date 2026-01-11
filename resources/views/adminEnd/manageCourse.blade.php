@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0">Manage Courses</h4>

        <a href="{{ route('admin.createCourse') }}" class="btn btn-primary">
            + Create Course
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table Card --}}
    <div class="card shadow-sm border-0">
        <div class="card-body course-scroll p-0">

            <table class="table table-hover align-middle mb-0">
                <thead class="table-light sticky-top">
                    <tr>
                        <th style="width:60px;">#</th>
                        <th>Course Name</th>
                        <th>Type</th>
                        <th>Sub Type</th>
                        <th>Medium</th>
                        <th>Fee</th>
                        <th>Status</th>
                        <th class="text-end" style="width:120px;">Action</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($courses as $index => $course)
                    <tr>
                        <td>{{ $index + 1 }}</td>

                        <td class="fw-semibold">
                            {{ $course->CourseName }}
                        </td>

                        <td>{{ $course->CourseTypeName }}</td>

                        <td>{{ $course->CourseSubTypeName }}</td>

                        <td>{{ $course->CourseMedium }}</td>

                        <td>
                            @if($course->Fee == 1)
                                ₹ {{ $course->FeeAmount }}
                            @else
                                <span class="text-success fw-semibold">Free</span>
                            @endif
                        </td>

                        <td>
                            @if($course->CourseStatus == 1)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>

                        <td class="text-end">
                            <a href="{{ route('admin.editCourse', $course->CourseId) }}"
                               class="btn btn-sm btn-warning">
                                Edit
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">
                            No courses found
                        </td>
                    </tr>
                @endforelse
                </tbody>

            </table>

        </div>
    </div>

</div>

{{-- Scroll Fix --}}
<style>
.course-scroll{
    max-height: calc(100vh - 220px);
    overflow-y: auto;
}
</style>
@endsection
