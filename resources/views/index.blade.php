@extends('template.dashboard')

@section('stylesheet')
{{--
<link rel="stylesheet" href=" {{ asset('css/datatable.css') }} "> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('main')
<div class="p-3 border-2 border-slate-600 rounded-md">
  <h2 class="text-slate-300 text-3xl font-bold">品項</h2>
  <hr class=" my-3 border border-slate-300">
  <div class="flex flex-wrap ">
    @foreach ($products as $product)
    <div class="card p-3 mx-1 bg-slate-500 rounded-sm">
      <a href="/product/info/{{$product->id}}" class="card-body">
        <img src="{{ $product->img_path }}" alt="" style="object-fit: contain; width:150px;">
        <h3 class="text-slate-900 text-xl font-bold">{{ $product->product_name }}</h3>
        {{ $product->product_detail }}
      </a>
    </div>
    @endforeach
  </div>
</div>

<form action=""></form>
@endsection