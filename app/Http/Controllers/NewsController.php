<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;  // Required if using DB syntax
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function index() {
        $data = DB::table('news')->take(1)->get();
        return view('web.index', compact('data'));
        // return view('web.index', ['data' => $data]);
    }

    public function getData() {
        $data = DB::table('news')->get();
        dd($data);
    }
    
    
    public function comment() {
        $comments = DB::table('comment')->orderByDesc('id')->get();
        return view('web.comment', compact('comments'));
        // return view('web.comment', ['comments' => $comments]);
    }
    
    // Save
    public function save_comment(Request $request) {
        // dd(123, $request->all());
        DB::table('comment')->insert([
            'title' => $request->title,
            'name' => $request->user,
            'content' => $request->text,
            'email' => '',
        ]);

        return redirect('/comment');
    }

    // Edit
    public function edit_comment( $id ) {
        // $comment = DB::table('comment')->where('id', $id)->get();
        $comment = DB::table('comment')->find($id); // 直接以id找資料
        return view('web.edit', compact('comment'));
        // 跳轉到edit頁面
    }
    // Update
    public function update_comment( $id, Request $request ) {
        $comment = DB::table('comment')->where('id', $id);

        $comment->update([
            'title' => $request->title,
            'name' => $request->user,
            'content' => $request->text,
        ]);
        return redirect('/comment');
        // 跳轉到edit頁面
    }

    public function delete_comment( $target ) {
        // dd($target);
        DB::table('comment')->where('id', $target)->delete();

        return redirect('/comment');
    }
}
