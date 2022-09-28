@extends('template.template')

@section('stylesheet')
<link rel="stylesheet" href=" {{ asset('css/template.css') }} ">
@endsection

@section('comment-showcase')
<div class="comment-showcase-container">
  @foreach ($comments as $cmt)
  <div class="showcase-wrap">
    <div class="cmt-text">
      <div class="cmt-title col-3 fs-3"> {{ $cmt->title }} </div>
      <div class="cmt-name col-3 fs-5"> {{ $cmt->name }} </div>
    </div>
    <p class="content"> {{ $cmt->content }} </p>
    <div class="mods">
      <a href="/comment/edit/{{ $cmt->id }}" class="edit fs-8">EDIT</a>
      <a href="/comment/delete/{{ $cmt->id }}" class="delete fs-8">DEL</a>
    </div>
  </div>
  @endforeach
</div>
@endsection

@section('comment-board')
<div class="comment-box">
  <form class="" action="/comment/save" method="POST">
    @csrf
    <label for="">Title</label>
    <input type="text" name="title">
    <label for="">User</label>
    <input type="text" name="user">
    <label for="">Comment</label>
    <input type="text" name="text">
    <button type="submit">Submit</button>
    {{-- {{ csrf_field() }} --}}
  </form>
</div>
@endsection