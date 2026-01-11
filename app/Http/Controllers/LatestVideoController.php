<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LatestVideoController extends Controller
{
     // ADD FORM
    public function create()
    {
        return view('adminEnd.addLiveVideo');
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'VideoEmbedCodeEnglish' => 'nullable|string',
            'VideoEmbedCodeHindi'   => 'nullable|string',
        ]);

        DB::table('liveandlatestsessionvideo')->insert([
            'VideoEmbedCodeEnglish' => $request->VideoEmbedCodeEnglish,
            'VideoEmbedCodeHindi'   => $request->VideoEmbedCodeHindi,
            'InsertBy'              => auth()->id(),
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);

        return redirect()
            ->route('admin.addLiveVideo')
            ->with('success', 'Latest video saved successfully');
    }


     // =============================
    // MANAGE
    // =============================
    public function index()
    {
        $videos = DB::table('liveandlatestsessionvideo')
            ->orderBy('VideoId', 'desc')
            ->get();

        return view('adminEnd.manageLiveVideo', compact('videos'));
    }

    // =============================
    // DELETE
    // =============================
    public function destroy($id)
    {
        DB::table('liveandlatestsessionvideo')
            ->where('VideoId', $id)
            ->delete();

        return redirect()
            ->route('admin.manageLiveVideo')
            ->with('success', 'Video deleted successfully');
    }
}
