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
    
    
    public function comment() {
        return view('web.comment');
    }

    public function save_comment(Request $request) {
        dd(123, $request->all());
        DB::table('comment')->insert([
            'title' => $request->title,
            'name' => $request->user,
            'content' => $request->text,
            'email' => '',
        ]);

        return redirect('/comment');
    }
    public function edit_comment(Request $request) {
        dd(123, $request->all());
        DB::table('comment')->insert([
            'title' => $request->title,
            'name' => $request->user,
            'content' => $request->text,
            'email' => '',
        ]);

        return redirect('/comment');
    }
    public function delete_comment( $target ) {
        dd($target);
        DB::table('comment')->where('id', $target)->delete();

        return redirect('/comment');
    }
}
