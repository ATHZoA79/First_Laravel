@extends('template.template')

@section('stylesheet')
<link rel="stylesheet" href=" {{ asset('css/datatable.css') }} ">
@endsection

@section('table')
<div class="list-detail">
  <div class="banner-title">
    <h3 class="col-10">Banner 編輯</h3>
  </div>
  <form class="form" action="/banner/update/{{$banner->id}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="label-input">
      <label for="" class="col-3">當前圖片</label>
      <img src="{{ $banner->img_path }}" alt="" class="current-img">
    </div>
    <div class="label-input">
      <label for="banner_img" class="col-3">上傳 Banner 圖片</label>
      <input type="file" name="banner_img" id="banner_img">
    </div>
    <div class="label-input">
      <label for="img_opacity" class="col-3">設定透明度</label>
      <input type="text" name="banner_opacity" id="banner_opacity" value="{{ $banner->img_opacity }}">
    </div>
    <div class="label-input">
      <label for="img_weight" class="col-3">圖片權重</label>
      <input type="number" name="img_weight" id="img_weight" value="{{ $banner->weight }}">
    </div>

    <div class="button-box col-6">
      <button class="submit btn btn-success" type="submit">確認修改</button>
      <button class="cancel btn btn-secondary" type="reset">取消</button>
    </div>
  </form>
</div>
@endsection