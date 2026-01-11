<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ExamSection;
use App\Models\Video;

class HomeController extends Controller
{
//     public function index()
//     {
//         $upscInfo  = ExamSection::where('type', 'upsc')->get();
//         $uppcsInfo = ExamSection::where('type', 'uppcs')->get();

//         $openVideo    = Video::where('type', 'open')->first();
//         $latestVideos = Video::where('type', 'latest')->get();

//         return view('home', compact(
//             'upscInfo',
//             'uppcsInfo',
//             'openVideo',
//             'latestVideos'
//         ));
//     }

 public function index()
    {
        // Latest video (same logic jo LatestVideoController me hai)
        $video = DB::table('liveandlatestsessionvideo')
            ->orderBy('VideoId', 'desc')
            ->first();

        return view('home', compact('video'));
    }


}
