<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class studentRegisterationController extends Controller
{
    // ===============================
    // SHOW REGISTRATION FORM
    // ===============================
    public function showRegistrationForm()
    {
        return view('adminEnd.registerStudent');
    }

    // ===============================
    // STORE STUDENT
    // ===============================
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:150',
            'email'  => 'required|email|unique:students,email',
            'mobile' => 'required|digits:10',
            'course' => 'required',
        ]);

        DB::table('students')->insert([
            'name'       => $request->name,
            'email'      => $request->email,
            'mobile'     => $request->mobile,
            'course'     => $request->course,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('admin.manageStudents')
            ->with('success', 'Student registered successfully');
    }

    // ===============================
    // STUDENT LIST
    // ===============================
    public function showStudentLists()
    {
        $students = DB::table('students')
            ->orderBy('id', 'desc')
            ->get();

        return view('adminEnd.studentLists', compact('students'));
    }
}
