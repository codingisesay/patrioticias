<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class prelimsController extends Controller
{
    // Create Test Paper Form
    public function createTestPaper()
    {
        $courses = DB::table('course')
        ->where('CourseStatus', '1') 
        ->get();

        $subjects = DB::table('subjects')->get();

        return view('adminEnd.createTestPaper', compact('courses', 'subjects'));
    }

    // Store Test Paper
    public function storeTestPaper(Request $request)
    {
        $request->validate([
            'course_id'        => 'required|integer',
            'subject_id'       => 'required|integer',
            'test_paper_name'  => 'required|string|max:191',
        ]);

        DB::table('prelimstestpaper')->insert([
            'CourseId'              => $request->course_id,
            'TestPaperSubjectId'    => $request->subject_id,
            'TestPaperLocalName'    => $request->test_paper_name,
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);

        return back()->with('success', 'Prelims Test Paper Created Successfully');
    }


      /* ==========================
       MANAGE TEST PAPER
    ==========================*/
    public function manageTestPaper()
    {
       $testPapers = DB::table('prelimstestpaper as ptp')
            ->join('course as c', 'c.CourseId', '=', 'ptp.CourseId')
            ->join('subjects as s', 's.SubjectId', '=', 'ptp.TestPaperSubjectId')
            ->select(
                'ptp.PrelimsTestPaperId',
                'ptp.TestPaperLocalName',
                'c.CourseName',
                's.SubjectName',
                'ptp.created_at'
            )
            ->orderBy('ptp.PrelimsTestPaperId', 'DESC')
            ->get();

        return view('adminEnd.manageTestPaper', compact('testPapers'));
    
    }

    /* ==========================
       DELETE TEST PAPER
    ==========================*/
    public function deleteTestPaper($id)
    {
        DB::table('prelimstestpaper')
            ->where('PrelimsTestPaperId', $id)
            ->delete();

        return back()->with('success', 'Test paper deleted successfully');
    }
}
