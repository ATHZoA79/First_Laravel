@extends('template.dashboard')

@section('stylesheet')
{{--
<link rel="stylesheet" href=" {{ asset('css/datatable.css') }} "> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('main')
<div class="w-2/3 px-4 py-6 text-gray-400 border-2 border-slate-500 rounded-md">
  <div class="product-title pb-3">
    <h3 class="text-2xl font-bold pb-3">商品新增</h3>
    <hr class="border border-slate-200">
  </div>
  <form class="form" action="/product/store" method="post" enctype="multipart/form-data">
    @csrf

    <div class="label-input py-2">
      <label for="product_img" class="">上傳商品圖片：</label>
      <label class="p-2 text-xs border rounded-md bg-slate-700">
        上傳圖片
        <input hidden class="h-5 text-xs text-slate-300" type="file" name="product_img" id="product_img">
      </label>
    </div>
    <div class="label-input py-2">
      <label for="second_img" class="">上傳次要商品圖片：</label>
      <label class="p-2 text-xs border rounded-md bg-slate-700">
        上傳圖片
        <input hidden class="h-5 text-xs text-slate-300" type="file" name="second_img[]" id="second_img" multiple accept="image/*">
      </label>
    </div>
    <div class="label-input py-3">
      <label for="product_name" class="">商品名稱：</label>
      <input class="h-5 px-2 text-sm font-medium text-slate-900" type="text" name="product_name" id="product_name">
    </div>
    <div class="label-input py-3">
      <label for="product_price" class="">商品價格：</label>
      <input class="h-5 px-2 text-sm font-medium text-slate-900" type="number" name="product_price" id="product_price">
    </div>
    <div class="label-input py-3">
      <label for="product_detail" class="col-3">商品詳情：</label>
      <input class="h-5 px-2 text-sm font-medium text-slate-900" type="text" name="product_detail" id="product_detail">
    </div>
    <div class="label-input py-3">
      <label for="product_qty" class="col-3">商品數量：</label>
      <input class="h-5 px-2 text-sm font-medium text-slate-900" type="number" name="product_qty" id="product_qty">
    </div>

    <hr class="my-3 border border-slate-200">
    <div class="flex justify-end ">
      <button class="mr-3 p-2 border-none rounded-md bg-blue-700 hover:bg-blue-500 text-slate-300"
        type="submit">新增商品</button>
      <button class="p-2 border-none rounded-md bg-gray-900 hover:bg-gray-700" type="reset">取消</button>
    </div>
  </form>
</div>
@endsection