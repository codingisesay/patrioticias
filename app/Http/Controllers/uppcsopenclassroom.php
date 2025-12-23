<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class uppcsopenclassroom extends Controller
{
      public function index(){
         return view('studentEnd.uppcsClassroom');
    }
}
