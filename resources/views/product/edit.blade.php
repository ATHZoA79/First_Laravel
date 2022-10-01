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
    <label for="" class="col-3">當前次要圖片</label>
    <div class="label-input">
      @foreach ($product->imgs as $item)
      <div 
        class="d-flex flex-column me-2"
        style="max-width:150px;"
      >
        {{-- {{$product->imgs}} 使用Product關聯資料 --}}
          <img 
            src="{{ $item->img_path }}" 
            alt="" class="second-img" 
            style="max-width:150px; object-fit:contain;"
          >
          <button 
            class="btn btn-danger w-100"
            onclick="document.querySelector('#delete_img{{$item->id}}').submit();"
            >刪除此圖片</button>
        {{-- @foreach ($second_img as $item) 使用Product_img資料
          <img 
            src="{{ $item->img_path }}" 
            alt="" class="second-img" 
            style="max-width:120px; object-fit:contain;"
          >
        @endforeach --}}
      </div>
      @endforeach
      <form id="delete_img{{$item->id}}" action="product/delete_img/{{$item->id}}" method="POST" hidden>
        @method('DELETE')
        @csrf
        {{-- form to delete sub image --}}
      </form>
    </div>
    <div class="label-input">
      <label for="second_img" class="col-3">修改次要商品圖片</label>
      <input type="file" name="second_img[]" id="second_img" multiple accept="image/*">
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
