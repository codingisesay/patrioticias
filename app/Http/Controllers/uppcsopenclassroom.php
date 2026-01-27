<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class uppcsOpenClassroom extends Controller
{
    public function index()
    {
        $courses = DB::table('course as c')
            ->join('coursetype as ct', 'ct.CourseTypeId', '=', 'c.CourseTypeId')
            ->join('coursesubtype as cst', 'cst.CourseSubTypeId', '=', 'c.CourseSubTypeId')
            ->where('c.exam_type_id', 3)     // UPPCS
            ->where('c.CourseStatus', 1)     // Active only
            ->select(
                'c.CourseId',
                'c.CourseName',
                'c.course_code',
                'c.CourseMedium',
                'c.FeeAmount',
                'ct.CourseTypeName',
                'cst.CourseSubTypeName'
            )
            ->orderBy('c.CourseId', 'DESC')
            ->get();

        return view('studentEnd.uppcsClassroom', compact('courses'));
    }
}
