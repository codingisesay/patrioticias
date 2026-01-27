<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StudentAssignCourseController extends Controller
{
   public function create()
{
    $students = DB::table('users')
        ->select('id', 'name', 'email')
        ->get();

    $courses = DB::table('course')
        ->where('CourseStatus', '1')
        ->select('CourseId', 'CourseName')
        ->get();

    return view('adminEnd.studentAssignCourse', compact('students', 'courses'));
}

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'StudentId' => 'required',
            'CourseId'  => 'required',
        ]);

        DB::table('studentassigncourse')->insert([
            'StudentId' => $request->StudentId,
            'CourseId'  => $request->CourseId,
            'status'    => '1',
            'mode'      => '1',
            'InsertBy'  => Auth::id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('admin.studentAssignCourse')
            ->with('success', 'Course assigned to student successfully');
    }


      /* =========================
        MANAGE
    ==========================*/
    public function index()
    {
        $assignments = DB::table('studentassigncourse as sac')
            ->join('users', 'sac.StudentId', '=', 'users.id')
            ->join('course', 'sac.CourseId', '=', 'course.CourseId')
            ->select(
                'sac.StudentAssignCourseId',
                'users.name as student_name',
                'users.email',
                'course.CourseName',
                'sac.status',
                'sac.created_at'
            )
            ->orderBy('sac.StudentAssignCourseId', 'desc')
            ->get();

        return view('adminEnd.manageStudentAssignCourse', compact('assignments'));
    }

    /* =========================
        DELETE (optional)
    ==========================*/
    public function destroy($id)
    {
        DB::table('studentassigncourse')
            ->where('StudentAssignCourseId', $id)
            ->delete();

        return back()->with('success', 'Assignment removed');
    }
}
