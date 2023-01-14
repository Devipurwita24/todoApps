<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\sistem;
use DB;

class SistemController extends Controller
{
    public function index()
    {
        $sistem = sistem::with(['task'])->get();
        return view('tasks.sistem')->with('sistem', $sistem);
        
    }
}
