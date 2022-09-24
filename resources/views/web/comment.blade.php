@extends('web.template')

@section('stylesheet')
<link rel="stylesheet" href=" {{ asset('css/template.css') }} ">
@endsection

@section('comment-board')
<div class="comment">
  <form 
	class=""
	action="/comment/save"
	method="GET"
>
<label for="">Title<input type="text" name="title"></label>
<label for="">User<input type="text" name="user"></label>
<label for="">Comment<input type="text" name="text"></label>
<button type="submit">Submit</button>
</form>
</div>
@endsection