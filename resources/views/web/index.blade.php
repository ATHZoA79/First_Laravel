@extends('web.template')

@section('stylesheet')
<link rel="stylesheet" href=" {{ asset('css/template.css') }} ">
@endsection

@section('card')
<div class="card-container justify-content-center">
  @foreach ($data as $dt)
  <div class="col-3">
    <div class="card">
      <div class="card-body">
        <img src=" {{ $dt->img }} " class="card-img-top" alt="...">
        <h3> {{ $dt->title }} </h3>
        <p class="card-text">
          {{ $dt->content }}
        </p>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection