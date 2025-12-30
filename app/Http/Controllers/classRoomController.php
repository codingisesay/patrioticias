<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class classRoomController extends Controller
{
    public function showCreateCourseForm()
    {
        return view('adminEnd.createCourse');
    }

    public function showCreateLectureForm()
    {
        return view('adminEnd.createLecture');
    }

     public function showManageCourse()
    {
        return view('adminEnd.manageCourse');
    }

    public function showManageLecture()
    {
        return view('adminEnd.manageLecture');
    }

   
}
