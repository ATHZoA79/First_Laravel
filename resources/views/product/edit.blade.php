@extends('template.template')

@section('stylesheet')
<link rel="stylesheet" href=" {{ asset('css/datatable.css') }} ">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('table')
<div class="list-detail">
  <div class="product-title">
    <h3 class="col-10">商品修改</h3>
  </div>
  <form class="form" action="/product/update/{{$product->id}}" method="post" enctype="multipart/form-data">
    @csrf 
    <div class="label-input">
      <label for="" class="col-3">當前圖片</label>
      <img src="{{ $product->img_path }}" alt="" class="current-img">
    </div>
    <div class="label-input">
      <label for="product_img" class="col-3">修改商品圖片</label>
      <input type="file" name="product_img" id="product_img">
    </div>
    <div class="label-input">
      <label for="product_name" class="col-3">商品名稱</label>
      <input type="text" name="product_name" id="product_name" value="{{$product->product_name}}">
    </div>
    <div class="label-input">
      <label for="product_price" class="col-3">商品價格</label>
      <input type="number" name="product_price" id="product_price" value="{{$product->product_price}}">
    </div>
    <div class="label-input">
      <label for="product_detail" class="col-3">商品詳情</label>
      <input type="text" name="product_detail" id="product_detail" value="{{$product->product_detail}}">
    </div>
    <div class="label-input">
      <label for="product_detail" class="col-3">商品數量</label>
      <input type="number" name="product_detail" id="product_detail" value="{{$product->product_qty}}">
    </div>

    <div class="button-box col-5">
      <button class="submit btn btn-success" type="submit">完成修改</button>
      <button class="cancel btn btn-secondary" type="reset">取消</button>
    </div> 
  </form>
</div>
@endsection
