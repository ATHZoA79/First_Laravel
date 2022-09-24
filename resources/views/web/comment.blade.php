@extends('web.template')

@section('stylesheet')
<link rel="stylesheet" href=" {{ asset('css/template.css') }} ">
@endsection

@section('comment-showcase')
<div class="comment-showcase-container">
  @foreach ($comments as $cmt)
  <div class="showcase-wrap">
    <div class="cmt-text row">
      <div class="cmt-title col-3"> {{ $cmt->title }} </div>
      <div class="cmt-title col-3 text-sm"> {{ $cmt->name }} </div>
    </div>
    <p class="content"> {{ $cmt->content }} </p>
  </div>
  @endforeach
</div>
@endsection

@section('comment-board')
<div class="comment-box">
  <form class="" action="/comment/save" method="GET">
    <label for="">Title</label>
    <input type="text" name="title">
    <label for="">User</label>
    <input type="text" name="user">
    <label for="">Comment</label>
    <input type="text" name="text">
    <button type="submit">Submit</button>
  </form>
</div>
@endsection