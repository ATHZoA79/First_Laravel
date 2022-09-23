<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;  // Required 
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function index() {
        $data = DB::table('news')->take(1)->get();
        return view('web.index', ['data' => $data]);
    }

    public function getData() {
        $data = DB::table('news')->get();
        dd($data);
    }
}
