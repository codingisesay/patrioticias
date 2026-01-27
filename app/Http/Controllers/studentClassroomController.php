<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class StudentClassroomController extends Controller
{
   public function index()
{
    $courses = DB::table('course')
        ->where('CourseStatus', '1')
        ->orderBy('CourseStartDate', 'desc')
        ->get();

    return view('studentEnd.classroom', compact('courses'));
}


  public function courseView($courseId)
{
    $course = DB::table('course')->where('CourseId', $courseId)->first();

    $subjects = DB::table('subjects')->get();

    $lectures = DB::table('lecture')
        ->where('CourseId', $courseId)
        ->get()
        ->groupBy('SubjectId');

    return view('studentEnd.courseView', compact(
        'course',
        'subjects',
        'lectures'
    ));
}
public function lectureView($lectureId)
{
    $lecture = DB::table('lecture')->where('LectureId', $lectureId)->first();

    $handouts = DB::table('lecturehandout')
        ->where('LectureId', $lectureId)
        ->get();

    return view('studentEnd.lectureView', compact('lecture', 'handouts'));
}

}
