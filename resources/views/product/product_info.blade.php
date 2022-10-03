@extends('template.template')

@section('stylesheet')
<link rel="stylesheet" href=" {{ asset('css/datatable.css') }} ">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('table')
<div class="list-detail">
  <div class="product-title">
    <h3 class="col-10">商品名稱</h3>
    {{ $product_info->product_name}}
    {{ $product_info->product_detail}}
  </div>
  <div class="d-flex">
    @foreach ($product_info->imgs as $item)
      <img 
        src="{{ $item }}" 
        alt="" 
        class="me-1"
        style="max-height:150px; object-fit:contain;" 
      >
    @endforeach
  </div>
  <div class="row">
    <div class="qty col-2">{{ $product_info->product_qty }}</div>
    <div class="price col-auto">NT${{ $product_info->product_price }}</div>
    <div class="count d-flex col-4">
      <i class="fa-solid fa-minus"></i>
      <input type="numeric" name="" id="" value="1" min="1">
      <i class="fa-solid fa-plus"></i>
    </div>
  </div>
</div>
@endsection