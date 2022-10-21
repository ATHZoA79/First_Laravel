@extends('dashboard')

@section('stylesheet')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
  integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
  crossorigin='anonymous' />
@endsection

@section('main')
<form action="/shopping2" method="POST">
  @csrf 
  <h2 class="mt-3">購物車</h2>
  <h3 class="border-bottom border-gray-500">訂單明細</h3>

  @foreach ($shopping as $product)
  <div class="container-fluid d-flex pt-3 border-bottom border-gray-200">
    <div class="col-6 d-flex ">
      <img src="{{ $product->product->img_path }}" class="rounded-circle"
        style="max-width: 120px; max-height: 120px; object-fit: cover;">
      <div class="d-flex flex-column justify-content-center">
        <h1 class="product_name">
          {{ $product->product->product_name }}
        </h1>
        <h3 class="product_detail">
          {{ $product->product->product_detail }}
        </h3>
      </div>
    </div>
    <div class="col-6 d-flex justify-content-end align-items-center">
      <div class="qty col-3">
        <i class="fa-solid fa-minus" id="minus"></i>
        {{-- 因為是多筆資料所以要用陣列qty[] --}}
        <input name="qty[]" id="add_number" type="numeric" value="{{ $product->qty }}" min="1" class="col-2">
        <i class="fa-solid fa-plus" id="plus"></i>
      </div>
      <div class="price-of-item col-2">
        $ {{ $product->qty * $product->product->product_price }}
      </div>
    </div>
  </div>
  @endforeach
  {{-- 計算總價，寫在Controller比較好 --}}
  <?php 
    $total = 0;
    foreach ($shopping as $value) {
      $total += $value->qty * $value->product->product_price;
    }
  ?>
  <div class="container-fluid d-flex justify-content-end mt-5">
    品項數量：{{ count($shopping) }}
  </div>
  <div class="container-fluid d-flex justify-content-end">
    小計：${{ $total }}
  </div>
  <div class="container-fluid d-flex justify-content-end">
    運費：$100
  </div>
  <div class="container-fluid d-flex justify-content-end">
    總計：${{ $total+100 }}
  </div>
  <div class="col-12 d-flex justify-end py-3">
    <button class="btn btn-outline-success" type="submit" role="button">確認</button>
  </div>
</form>
@endsection