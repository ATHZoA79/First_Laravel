<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;  // Required 
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function index() {
        return view('web.index');
    }

    public function test() {
        $data = DB::table('news')->get();
        dd($data);
    }
}
