@extends('layouts.app')

@section('stylesheet')
<link rel="stylesheet" href=" {{ asset('css/datatable.css') }} ">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('main')
<div class="list-detail">
  <div class="banner-title">
    <h3 class="col-10">Banner </h3>
    <a href="/banner/create" class="btn btn-primary col-2">新增Banner </a>
  </div>
  <table id="table_1" class="display">
    <thead>
      <tr>
        <th>圖片預覽</th>
        <th>圖片權重</th>
        <th>功能</th>
      </tr>
    </thead>
    @foreach ($banners as $banner)
    <tbody>
      <tr>
        <td>
          <img src="{{$banner->img_path}}" alt="" style="opacity: {{$banner->img_opacity}}">
        </td>
        <td>{{$banner->weight}}</td>
        <td>
          <button class="btn btn-primary" onclick="location.href='/banner/edit/{{$banner->id}}'">編輯</button>
          <button class="btn btn-danger" onclick="document.querySelector('#delete_form{{$banner->id}}').submit();">刪除</button>
          <form id="delete_form{{$banner->id}}" action="/banner/destroy/{{$banner->id}}" method="POST">
            @csrf
            @method('DELETE')
          </form>
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"
  integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready( function () {
    $('#table_1').DataTable();
} );
</script>
@endsection