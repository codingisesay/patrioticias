<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class upscOpenClassroom extends Controller
{
    public function index()
    {
        $courses = DB::table('course')
            ->where('CourseTypeId', 1) // UPSC
            ->where('CourseStatus', 1)
            ->get();

        return view('studentEnd.upscClassroom', [
            'courses' => $courses,
            'title'   => 'UPSC Classroom Programmes'
        ]);
    }
}
