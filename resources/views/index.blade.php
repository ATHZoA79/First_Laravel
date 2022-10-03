@extends('template.template')

@section('stylesheet')
<link rel="stylesheet" href=" {{ asset('css/datatable.css') }} ">
<link rel="stylesheet" href="{{ asset('css/index_main.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('index_main')
<div class="product_box d-flex flex-wrap">
  @foreach ($products as $product)
  <div class="card">
    <a href="/product/info/{{$product->id}}">
      <img src="{{ $product->img_path }}" alt="">
      <h3>{{ $product->product_name }}</h3>
      {{ $product->product_detail }}
    </a>
  </div>
  @endforeach
</div>

<form action=""></form>
@endsection