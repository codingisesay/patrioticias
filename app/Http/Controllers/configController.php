<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfigController extends Controller
{
    public function loadAddSubjectForm()
    {
        return view('adminEnd.addSubject');
    }

    public function storeSubject(Request $request)
    {
        $data = $request->validate([
            'subject_name' => 'required|string|max:255',
        ]);

        DB::table('subjects')->insert([
            'SubjectName' => $data['subject_name'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('admin.addSubjectForm')
            ->with('success', 'Subject added successfully.');
    }

    public function manageSubject()
    {
        $subjects = DB::table('subjects')
            ->orderBy('SubjectId', 'desc')
            ->get();

        return view('adminEnd.manageSubject', compact('subjects'));
    }
    public function editSubject($id)
{
    $subject = DB::table('subjects')
        ->where('SubjectId', $id)
        ->first();

    return view('adminEnd.editSubject', compact('subject'));
}

public function updateSubject(Request $request, $id)
{
    $data = $request->validate([
        'subject_name' => 'required|string|max:255',
    ]);

    DB::table('subjects')
        ->where('SubjectId', $id)
        ->update([
            'SubjectName' => $data['subject_name'],
            'updated_at' => now(),
        ]);

    return redirect()
        ->route('admin.manageSubject')
        ->with('success', 'Subject updated successfully');
}


    public function deleteSubject($id)
    {
        DB::table('subjects')->where('SubjectId', $id)->delete();

        return redirect()
            ->route('admin.manageSubject')
            ->with('success', 'Subject deleted successfully');
    }



    // show form
    public function loadAddExamTypeForm()
    {
        return view('adminEnd.addExamType');
    }

   public function storeExamType(Request $request)
{
    $data = $request->validate([
        // ✅ REQUIRED (DB required)
        'exam_name' => 'required|string|max:191',
        

        // 🔄 OPTIONAL
        'exam_code' => 'nullable|string|max:50',
        'stages'    => 'nullable|array',
        'medium'    => 'nullable|string|max:50',
        'description' => 'nullable|string',
        'status'    => 'nullable|string',
    ]);

    DB::table('examtype')->insert([
        'ExamTypeName' => $data['exam_name'],
        // 'exam_code'    => $data['exam_code'] ?? null,
        // 'stages'       => isset($data['stages']) ? json_encode($data['stages']) : null,
        // 'medium'       => $data['medium'] ?? null,
        // 'description'  => $data['description'] ?? null,
        // 'status'       => $data['status'],
        'created_at'   => now(),
        'updated_at'   => now(),
    ]);

    return redirect()
        ->route('admin.addExamType')
        ->with('success', 'Exam Type saved successfully');
}

public function manageExamType()
{
    $examTypes = DB::table('examtype')
        ->orderBy('ExamTypeId', 'desc')
        ->get();

    return view('adminEnd.manageExamType', compact('examTypes'));
}

public function deleteExamType($id)
{
    DB::table('examtype')
        ->where('ExamTypeId', $id)
        ->delete();

    return redirect()
        ->route('admin.manageExamType')
        ->with('success', 'Exam Type deleted successfully');
}


// Show Edit Form
public function editExamType($id)
{
    $exam = DB::table('examtype')
        ->where('ExamTypeId', $id)
        ->first();

    return view('adminEnd.editExamType', compact('exam'));
}


// Update Exam Type
public function updateExamType(Request $request, $id)
{
    $data = $request->validate([
        'exam_name'   => 'required|string|max:191',
        'status'      => 'required|in:0,1',

        // optional
        'exam_code'   => 'nullable|string|max:50',
        'stages'      => 'nullable|array',
        'medium'      => 'nullable|string|max:50',
        'description'=> 'nullable|string',
    ]);

    DB::table('examtype')
        ->where('ExamTypeId', $id)
        ->update([
            'ExamTypeName' => $data['exam_name'],
            'updated_at'   => now(),
        ]);

    return redirect()
        ->route('admin.manageExamType')
        ->with('success', 'Exam type updated successfully');
}

 /* =======================
       ADD COURSE TYPE FORM
    ======================= */
    public function loadAddCourseTypeForm()
    {
        return view('adminEnd.addcoursetype');
    }

    /* =======================
       STORE COURSE TYPE
    ======================= */
    public function storeCourseType(Request $request)
    {
        $data = $request->validate([
            'course_type_name' => 'required|string|max:191',
        ]);

        DB::table('coursetype')->insert([
            'CourseTypeName' => $data['course_type_name'],
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);

        return redirect()
            ->route('admin.manageCourseType')
            ->with('success', 'Course Type added successfully');
    }

    /* =======================
       MANAGE COURSE TYPE
    ======================= */
    public function manageCourseType()
    {
        $courseTypes = DB::table('coursetype')
            ->orderBy('CourseTypeId', 'desc')
            ->get();

        return view('adminEnd.managecoursetype', compact('courseTypes'));
    }

    /* =======================
       DELETE COURSE TYPE
    ======================= */
    public function deleteCourseType($id)
    {
        DB::table('coursetype')
            ->where('CourseTypeId', $id)
            ->delete();

        return redirect()
            ->route('admin.manageCourseType')
            ->with('success', 'Course Type deleted successfully');
    }



    public function addCourseSubType()
{
    $courseTypes = DB::table('coursetype')
        ->orderBy('CourseTypeName')
        ->get();

    return view('adminEnd.addCourseSubType', compact('courseTypes'));
}

public function storeCourseSubType(Request $request)
{
    $data = $request->validate([
        'course_type_id'       => 'required|exists:coursetype,CourseTypeId',
        'course_sub_type_name' => 'required|string|max:191',
    ]);

    DB::table('coursesubtype')->insert([
        'CourseTypeId'      => $data['course_type_id'],
        'CourseSubTypeName' => $data['course_sub_type_name'],
        'created_at'        => now(),
        'updated_at'        => now(),
    ]);

    return redirect()
        ->route('admin.addCourseSubType')
        ->with('success', 'Course Sub Type added successfully');
}


public function manageCourseSubType()
{
    $subTypes = DB::table('coursesubtype as cst')
        ->join('coursetype as ct', 'ct.CourseTypeId', '=', 'cst.CourseTypeId')
        ->select(
            'cst.CourseSubTypeId',
            'cst.CourseSubTypeName',
            'ct.CourseTypeName'
        )
        ->orderBy('cst.CourseSubTypeId', 'desc')
        ->get();

    return view('adminEnd.manageCourseSubType', compact('subTypes'));
}

public function deleteCourseSubType($id)
{
    DB::table('coursesubtype')
        ->where('CourseSubTypeId', $id)
        ->delete();

    return redirect()
        ->route('admin.manageCourseSubType')
        ->with('success', 'Course Sub Type deleted successfully');
}


public function editCourseSubType($id)
{
    $courseSubType = DB::table('coursesubtype')
        ->where('CourseSubTypeId', $id)
        ->first();

    $courseTypes = DB::table('coursetype')
        ->orderBy('CourseTypeName')
        ->get();

    return view(
        'adminEnd.editCourseSubType',
        compact('courseSubType', 'courseTypes')
    );
}


public function updateCourseSubType(Request $request, $id)
{
    $request->validate([
        'course_sub_type_name' => 'required|string|max:191',
        'course_type_id'       => 'required|integer',
    ]);

    DB::table('coursesubtype')
        ->where('CourseSubTypeId', $id)
        ->update([
            'CourseSubTypeName' => $request->course_sub_type_name,
            'CourseTypeId'      => $request->course_type_id,
            'updated_at'        => now(),
        ]);

    return redirect()
        ->route('admin.manageCourseSubType')
        ->with('success', 'Course Sub Type updated successfully');
}

/* ===============================
        ADD COUNSELLING FORM
    ================================ */
    public function addCounsellingForm()
    {
        $courses = DB::table('course')->get();

        return view('adminEnd.addCounsellingStudent', compact('courses'));
    }

    /* ===============================
        STORE COUNSELLING
    ================================ */
    public function storeCounselling(Request $request)
    {
        $request->validate([
            'course_id'           => 'required',
            'enq_per_name'        => 'required|string|max:191',
            'enq_per_email'       => 'required|email|max:191',
            'enq_per_phone'       => 'required|max:50',
            'enq_per_msg'         => 'required',
            'counselling_status'  => 'required|in:0,1',
        ]);

        DB::table('counselling_student')->insert([
            'course_id'            => $request->course_id,
            'enq_per_name'         => $request->enq_per_name,
            'enq_per_email'        => $request->enq_per_email,
            'enq_per_phone'        => $request->enq_per_phone,
            'enq_per_msg'          => $request->enq_per_msg,
            'counselling_status'   => $request->counselling_status,
            'counselling_comment'  => $request->counselling_comment,
            'counsellingDateTime'  => $request->counsellingDateTime,
            'created_at'           => now(),
            'updated_at'           => now(),
        ]);

        return redirect()
            ->route('admin.addCounselling')
            ->with('success', 'Counselling saved successfully');
    }

    /* ===============================
        MANAGE COUNSELLING
    ================================ */
 public function manageCounselling()
{
    $counsellings = DB::table('counselling_student')
        ->leftJoin(
            'course',
            'course.CourseId',
            '=',
            'counselling_student.course_id'
        )
        ->select(
            'counselling_student.*',
            'course.CourseName as course_name'
        )
        ->orderBy('counselling_student.id', 'desc')
        ->get();

    return view('adminEnd.manageCounsellingStudent', compact('counsellings'));
}

public function deleteCounselling($id)
{
    DB::table('counselling_student')
        ->where('id', $id)
        ->delete();

    return redirect()
        ->route('admin.manageCounselling')
        ->with('success', 'Counselling deleted successfully');
}        

public function editCounselling($id)
{
    $counselling = DB::table('counselling_student')
        ->where('id', $id)
        ->first();

    $courses = DB::table('course')->get();

    return view(
        'adminEnd.editCounsellingStudent',
        compact('counselling', 'courses')
    );
}

public function updateCounselling(Request $request, $id)
{
    $request->validate([
        'course_id'          => 'required',
        'enq_per_name'       => 'required|string|max:191',
        'enq_per_email'      => 'required|email',
        'enq_per_phone'      => 'required|string|max:50',
        'enq_per_msg'        => 'required|string',
        'counselling_status' => 'required|in:0,1',
    ]);

    DB::table('counselling_student')
        ->where('id', $id)
        ->update([
            'course_id'           => $request->course_id,
            'enq_per_name'        => $request->enq_per_name,
            'enq_per_email'       => $request->enq_per_email,
            'enq_per_phone'       => $request->enq_per_phone,
            'enq_per_msg'         => $request->enq_per_msg,
            'counselling_status'  => $request->counselling_status,
            'counselling_comment' => $request->counselling_comment,
            'counsellingDateTime' => $request->counsellingDateTime,
            'updated_at'          => now(),
        ]);

    return redirect()
        ->route('admin.manageCounselling')
        ->with('success', 'Counselling updated successfully');
}


}
