<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HandoutController extends Controller
{
     // Handout Form
  public function create($lectureId)
{
    $lecture = DB::table('lecture')
        ->join('course', 'lecture.CourseId', '=', 'course.CourseId')
        ->join('subjects', 'lecture.SubjectId', '=', 'subjects.SubjectId')
        ->where('lecture.LectureId', $lectureId)
        ->select(
            'lecture.*',
            'course.CourseName',
            'subjects.SubjectName'
        )
        ->first();

    if (!$lecture) {
        abort(404);
    }

    //  REQUIRED DATA FOR FORM
    $subjectiveQuestions = DB::table('subjectivequestion')->get();
    $objectiveQuestions  = DB::table('objectivequestion')->get();
    $questionNatures     = DB::table('naturesubjectivequestion')->get();

    return view('adminEnd.createHandout', compact(
        'lecture',
        'subjectiveQuestions',
        'objectiveQuestions',
        'questionNatures'
    ));
}

}