@extends('web.template')

@section('stylesheet')
<link rel="stylesheet" href=" {{ asset('css/template.css') }} ">
@endsection

@section('card')
<div class="col-3">
  <div class="card">
    <div class="card-body">
      <img src="" class="card-img-top" alt="...">
      <p class="card-text">
        This is some text within a card body.
      </p>
    </div>
  </div>
</div>
@endsection