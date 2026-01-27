<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class courseBundlingcontroller extends Controller
{
    // ===============================
    // SHOW PAGE (ADD + MANAGE)
    // ===============================
    public function index()
    {
        // Courses for dropdown
        $courses = DB::table('course')
            ->select('CourseId', 'CourseName')
            ->orderBy('CourseName')
            ->get();

        // Course bundling list
        $bundles = DB::table('courseboundling as cb')
            ->join('course as c1', 'c1.CourseId', '=', 'cb.BoundleCourse')
            ->join('course as c2', 'c2.CourseId', '=', 'cb.BoundleCourseWith')
            ->select(
                'cb.CourseBoundlingId',
                'c1.CourseName as MainCourse',
                'c2.CourseName as BundledWith'
            )
            ->orderBy('cb.CourseBoundlingId', 'desc')
            ->get();

        return view('adminEnd.courseBundling', compact('courses', 'bundles'));
    }

    // ===============================
    // STORE COURSE BUNDLING
    // ===============================
    public function store(Request $request)
    {
        $request->validate([
            'bundle_course'       => 'required|different:bundle_course_with',
            'bundle_course_with'  => 'required',
        ]);

        // Prevent duplicate entry
        $exists = DB::table('courseboundling')
            ->where('BoundleCourse', $request->bundle_course)
            ->where('BoundleCourseWith', $request->bundle_course_with)
            ->exists();

        if ($exists) {
            return back()->with('success', 'This course bundling already exists');
        }

        DB::table('courseboundling')->insert([
            'BoundleCourse'      => $request->bundle_course,
            'BoundleCourseWith'  => $request->bundle_course_with,
            'InsertBy'           => auth()->id(),
            'created_at'         => now(),
            'updated_at'         => now(),
        ]);

        return back()->with('success', 'Course bundling added successfully');
    }

    // ===============================
    // DELETE COURSE BUNDLING
    // ===============================
    public function delete($id)
    {
        DB::table('courseboundling')
            ->where('CourseBoundlingId', $id)
            ->delete();

        return back()->with('success', 'Course bundling deleted successfully');
    }


    // ===============================
// MANAGE COURSE BUNDLING
// ===============================
public function manage()
{
    $bundles = DB::table('courseboundling as cb')
        ->join('course as c1', 'c1.CourseId', '=', 'cb.BoundleCourse')
        ->join('course as c2', 'c2.CourseId', '=', 'cb.BoundleCourseWith')
        ->select(
            'cb.CourseBoundlingId',
            'c1.CourseName as MainCourse',
            'c2.CourseName as BundledWith'
        )
        ->orderBy('cb.CourseBoundlingId', 'DESC')
        ->get();

    return view('adminEnd.courseBundlingManage', compact('bundles'));
}


// ===============================
// EDIT COURSE BUNDLING
// ===============================
public function edit($id)
{
    // All courses (dropdown)
    $courses = DB::table('course')
        ->select('CourseId', 'CourseName')
        ->orderBy('CourseName')
        ->get();

    // Current bundling
    $bundle = DB::table('courseboundling')
        ->where('CourseBoundlingId', $id)
        ->first();

    return view('adminEnd.courseBundlingEdit', compact('courses', 'bundle'));
}


// ===============================
// UPDATE COURSE BUNDLING
// ===============================
public function update(Request $request, $id)
{
    $request->validate([
        'bundle_course'       => 'required|different:bundle_course_with',
        'bundle_course_with'  => 'required',
    ]);

    // Prevent duplicate (except current)
    $exists = DB::table('courseboundling')
        ->where('BoundleCourse', $request->bundle_course)
        ->where('BoundleCourseWith', $request->bundle_course_with)
        ->where('CourseBoundlingId', '!=', $id)
        ->exists();

    if ($exists) {
        return back()->with('success', 'This course bundling already exists');
    }

    DB::table('courseboundling')
        ->where('CourseBoundlingId', $id)
        ->update([
            'BoundleCourse'      => $request->bundle_course,
            'BoundleCourseWith'  => $request->bundle_course_with,
            'updated_at'         => now(),
        ]);

    return redirect()
        ->route('admin.courseBundling.manage')
        ->with('success', 'Course bundling updated successfully');
}

}
