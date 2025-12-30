<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class configController extends Controller
{
    public function loadAddSubjectForm()
    {
        return view('adminEnd.addSubject');
    }

    public function storeSubject(Request $request)
    {
        $data =$request->validate([
            'subject_name' => 'required|string|max:255',
        ]);

        DB::table('subjects')->insert([
            'SubjectName' => $data['subject_name'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.addSubjectForm')->with('success', 'Subject added successfully.');
    }
}
