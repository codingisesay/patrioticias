<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class studentRegisterationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('adminEnd.registerStudent');
    }

    public function showStudentLists()
    {
        // Logic to load and return student lists
        return view('adminEnd.studentLists'); // Assuming you have a view for student lists
    }
}
