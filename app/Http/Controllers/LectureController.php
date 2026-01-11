<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    /* =========================
       CREATE FORM
    ==========================*/
public function create()
{
    $courses = DB::table('course')
        ->select('CourseId', 'CourseName', 'course_code')
        ->orderBy('CourseName')
        ->get();

    $subjects = DB::table('subjects')->get();

    return view('adminEnd.createLecture', compact('courses', 'subjects'));
}


    /* =========================
       STORE LECTURE
    ==========================*/
   public function store(Request $request)
{
    $request->validate([
        'course_id'          => 'required|integer',
        'subject_id'         => 'required|integer',
        'subject_local_name' => 'required|string|max:191',
        'lecture_start_time' => 'required|date',
        'lecture_end_time'   => 'required|date|after:lecture_start_time',
        'video_embed_code'   => 'required|string',
        'faculty'            => 'nullable|integer',
        'synopsis'           => 'nullable|string',
    ]);

    DB::table('lecture')->insert([
        'CourseId'         => $request->course_id,
        'SubjectId'        => $request->subject_id,
        'SubjectLocalName' => $request->subject_local_name,
        'LectureStartTime' => $request->lecture_start_time,
        'LectureEndTime'   => $request->lecture_end_time,
        'Faculty'          => $request->faculty,
        'VideoEmbedCode'   => $request->video_embed_code,
        'Synopsis'         => $request->synopsis,
        'created_at'       => now(),
        'updated_at'       => now(),
    ]);

    return redirect()
        ->route('admin.manageLecture')
        ->with('success', 'Lecture created successfully');
}

   /* =========================
       MANAGE LECTURE
    ==========================*/
    public function index()
    {
        $lectures = DB::table('lecture')
            ->join('course', 'lecture.CourseId', '=', 'course.CourseId')
            ->join('subjects', 'lecture.SubjectId', '=', 'subjects.SubjectId')
            ->select(
                'lecture.*',
                'course.CourseName',
                'subjects.SubjectName'
            )
            ->orderBy('lecture.LectureId', 'desc')
            ->get();

        return view('adminEnd.manageLecture', compact('lectures'));
    }

    /* =========================
       EDIT FORM
    ==========================*/
    public function edit($id)
    {
        $lecture  = DB::table('lecture')->where('LectureId', $id)->first();
        $courses  = DB::table('course')->get();
        $subjects = DB::table('subjects')->get();

        return view('adminEnd.editLecture', compact('lecture', 'courses', 'subjects'));
    }

    /* =========================
       UPDATE
    ==========================*/
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_id'          => 'required|integer',
            'subject_id'         => 'required|integer',
            'subject_local_name' => 'required|string|max:191',
            'lecture_start_time' => 'required|date',
            'lecture_end_time'   => 'required|date|after:lecture_start_time',
            'video_embed_code'   => 'required|string',
            'synopsis'           => 'nullable|string',
        ]);

        DB::table('lecture')
            ->where('LectureId', $id)
            ->update([
                'CourseId'          => $request->course_id,
                'SubjectId'         => $request->subject_id,
                'SubjectLocalName'  => $request->subject_local_name,
                'LectureStartTime'  => $request->lecture_start_time,
                'LectureEndTime'    => $request->lecture_end_time,
                'VideoEmbedCode'    => $request->video_embed_code,
                'Synopsis'          => $request->synopsis,
                'updated_at'        => now(),
            ]);

        return redirect()
            ->route('admin.manageLecture')
            ->with('success', 'Lecture updated successfully');
    }

    /* =========================
       DELETE
    ==========================*/
    public function destroy($id)
    {
        DB::table('lecture')->where('LectureId', $id)->delete();

        return redirect()
            ->route('admin.manageLecture')
            ->with('success', 'Lecture deleted successfully');
    }


     

}
