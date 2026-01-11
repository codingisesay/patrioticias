<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class uppcsOpenClassroom extends Controller
{
    public function index()
    {
        $courses = DB::table('course')
            ->where('CourseTypeId', 2) // UPPCS
            ->where('CourseStatus', 1)
            ->get();

        return view('studentEnd.uppcsClassroom', [
            'courses' => $courses,
            'title'   => 'UPPCS Classroom Programmes'
        ]);
    }
}
