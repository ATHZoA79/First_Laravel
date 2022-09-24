@extends('web.template')

@section('stylesheet')
<link rel="stylesheet" href=" {{ asset('css/template.css') }} ">
@endsection

@section('comment-board')
<div class="comment-box">
  <form class="" action="/comment/update/{{$comment->id}}" method="GET">
    <h2>Edit Page</h2>
    <label for="">Title</label>
    <input type="text" name="title" value="{{ $comment->title }}">
    <label for="">User</label>
    <input type="text" name="user" value="{{ $comment->name }}">
    <label for="">Comment</label>
    <input type="text" name="text" value="{{ $comment->content }}">
    <button type="submit">Submit</button>
  </form>
</div>
@endsection