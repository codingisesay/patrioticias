<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class classRoomController extends Controller
{
    public function create()
{
    return view('adminEnd.createCourse', [
        'courseTypes'     => DB::table('coursetype')->get(),
        'courseSubTypes'  => DB::table('coursesubtype')->get(),
        'examTypes'       => DB::table('examtype')->get(),
    ]);
}

public function store(Request $request)
{
    $request->validate([
        'course_code'       => 'nullable|string|max:50',
        'exam_type_id'      => 'required|integer',
        'course_type_id'    => 'required|integer',
        'course_sub_type_id'=> 'required|integer',
        'course_medium'     => 'required',
        'course_name'       => 'required',
        'fee'               => 'required',
        'fee_amount'        => 'required',
        'base_year'         => 'required',
        'target_year'       => 'required',
        'live_channel'      => 'required',
        'live_chat'         => 'required',
        'course_start_date' => 'required|date',
        'course_status'     => 'required',
    ]);

    DB::table('course')->insert([
        'course_code'      => $request->course_code,
        'exam_type_id'     => $request->exam_type_id,
        'CourseTypeId'     => $request->course_type_id,
        'CourseSubTypeId'  => $request->course_sub_type_id,
        'CourseMedium'     => $request->course_medium,
        'CourseName'       => $request->course_name,
        'Fee'              => $request->fee,
        'FeeAmount'        => $request->fee_amount,
        'BaseYear'         => $request->base_year,
        'TargetYear'       => $request->target_year,
        'LiveChannel'      => $request->live_channel,
        'LiveChat'         => $request->live_chat,
        'CourseStartDate'  => $request->course_start_date,
        'CourseEndDate'    => $request->course_end_date,
        'CourseStatus'     => $request->course_status,
        'created_at'       => now(),
        'updated_at'       => now(),
    ]);

    return redirect()->route('admin.manageCourse')
        ->with('success','Course created successfully');
}


  /* =========================
       MANAGE COURSE
    ==========================*/
    public function index()
    {
        $courses = DB::table('course')
            ->join('coursetype', 'course.CourseTypeId', '=', 'coursetype.CourseTypeId')
            ->join('coursesubtype', 'course.CourseSubTypeId', '=', 'coursesubtype.CourseSubTypeId')
            ->select(
                'course.*',
                'coursetype.CourseTypeName',
                'coursesubtype.CourseSubTypeName'
            )
            ->orderBy('course.CourseId', 'desc')
            ->get();

        return view('adminEnd.manageCourse', compact('courses'));
    }

public function edit($id)
{
    $course = DB::table('course')->where('CourseId', $id)->first();

    $courseTypes     = DB::table('coursetype')->get();
    $courseSubTypes  = DB::table('coursesubtype')->get();
    $examTypes       = DB::table('examtype')->get(); // UPSC / UPPCS

    return view('adminEnd.editCourse', compact(
        'course',
        'courseTypes',
        'courseSubTypes',
        'examTypes'
    ));
}


public function update(Request $request, $id)
{
    DB::table('course')->where('CourseId', $id)->update([
        'course_code'       => $request->course_code,
        'exam_type_id'      => $request->exam_type_id,
        'CourseTypeId'      => $request->course_type_id,
        'CourseSubTypeId'   => $request->course_sub_type_id,
        'CourseMedium'      => $request->course_medium,
        'CourseName'        => $request->course_name,
        'Fee'               => $request->fee,
        'FeeAmount'         => $request->fee_amount,
        'BaseYear'          => $request->base_year,
        'TargetYear'        => $request->target_year,
        'LiveChannel'       => $request->live_channel,
        'LiveChat'          => $request->live_chat,
        'CourseStartDate'   => $request->course_start_date,
        'CourseEndDate'     => $request->course_end_date,
        'CourseStatus'      => $request->course_status,
        'updated_at'        => now(),
    ]);

    return redirect()->route('admin.manageCourse')
        ->with('success', 'Course updated successfully');
}


}
