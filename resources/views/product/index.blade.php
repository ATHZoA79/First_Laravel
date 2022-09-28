@extends('template.template')

@section('stylesheet')
<link rel="stylesheet" href=" {{ asset('css/datatable.css') }} ">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('table')
<div class="list-detail">
  <div class="banner-title">
    <h3 class="col-10">Banner </h3>
    <a href="/banner/create" class="btn btn-primary col-2">新增Banner </a>
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
    <tbody>
      <tr>
        <td>
          <div class="banner_img">
            <img src="" alt="">
          </div>
        </td>
        <td>{{$banner->weight}}</td>
        <td>
          <button class="btn btn-primary" onclick="location.href='/banner/edit/'">編輯</button>
          <button class="btn btn-danger" onclick="document.querySelector('#delete_form').submit();">刪除</button>
          <form id="delete_form" action="/banner/destroy/" method="POST">
            @csrf
            @method('DELETED')
          </form>
        </td>
      </tr>
    </tbody>
  </table>
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