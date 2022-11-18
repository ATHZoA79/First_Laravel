@extends('template.dashboard')

@section('stylesheet')
{{-- <link rel="stylesheet" href=" {{ asset('css/datatable.css') }} ">
<link rel="stylesheet" href=" {{ asset('css/index.css') }} "> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('main')
<div class="w-2/3 p-3 border rounded-md bg-slate-300">
  <div class="flex justify-between align-bottom mb-2">
    <h3 class="text-2xl font-bold">商品列 </h3>
    <a href="/product/create" class="p-2 border rounded-md bg-blue-700 text-slate-300">新增商品 </a>
  </div>
  <table id="product_table" class="display">
    <thead>
      <tr>
        <th>商品圖片</th>
        <th>商品名稱</th>
        <th>商品價格</th>
        <th>商品描述</th>
        <th>商品數量</th>
        <th>功能</th>
      </tr>
    </thead>
    @foreach ($products as $product)
    <tbody>
      <tr>
        <td>
          <div class="product_img">
            <img src="{{$product->img_path}}" alt="" style="object-fit: contain; width:150px;">
          </div>
        </td>
        <td>{{$product->product_name}}</td>
        <td>{{$product->product_price}}</td>
        <td>{{$product->product_detail}}</td>
        <td>{{$product->product_qty}}</td>
        <td>
          <button class="p-2 border rounded-md bg-emerald-700 text-slate-300" onclick="location.href='/product/edit/{{$product->id}}'">編輯</button>
          <button class="p-2 border rounded-md bg-red-700 text-slate-300" onclick="document.querySelector('#delete_form{{$product->id}}').submit();">刪除</button>
          <form id="delete_form{{$product->id}}" action="/product/destroy/{{$product->id}}" method="POST" hidden>
            @csrf
            @method('DELETE')
          </form>
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
  
  <hr class="my-3 border border-slate-900">
  <h3 class="mb-2 text-slate-900 text-xl font-semibold">品項</h3>
  <div class="flex flex-wrap">
    @foreach ($product_box_1 as $pb1)
    <div class="card mx-2 border-2 border-slate-500 rounded-sm">
      <img src="{{$pb1->img_path}}" alt="" style="object-fit: contain; width:150px;">
      <div class="card-body px-3 pb-4">
        <h3>CATEGORY</h3>
        <h2>{{$pb1->product_name}}</h2>
        <p>${{$pb1->product_price}}</p>
      </div>
    </div>
    @endforeach
  </div>
  <div class="list_box d-flex">
    @foreach ($product_box_2 as $pb2)
    <div class="card ">
      <img src="{{$pb2->img_path}}" alt="">
      <div class="card-body">
        <h3>CATEGORY</h3>
        <h2>{{$pb2->product_name}}</h2>
        <p>${{$pb2->product_price}}</p>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"
  integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready( function () {
    $('#product_table').DataTable();
} );
</script>
@endsection