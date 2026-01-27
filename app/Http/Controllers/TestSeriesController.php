<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TestSeriesController extends Controller
{
    public function upsc()
    {
        return view('studentEnd.upscTestSeries');
    }

    public function uppcs()
    {
        return view('studentEnd.uppcsTestSeries');
    }

    public function openTest()
    {
        return view('studentEnd.openTestSeries');
    }
}
