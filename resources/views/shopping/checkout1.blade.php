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
  <h3 class="border-bottom-1">訂單明細</h3>
  @foreach ($shopping as $product)
  <div class="col-6 d-flex border-bottom-1">
    <img src="{{ $product->product->img_path }}" class="rounded-circle"
      style="max-width: 120px; max-height: 120px; object-fit: cover;">
    <div class="d-flex flex-column justify-content-center">
      <div class="product_name">
        {{ $product->product->product_name }}
      </div>
      <div class="product_detail">
        {{ $product->product->product_detail }}
      </div>
    </div>
  </div>
  <div class="col-6 d-flex justify-content-end align-items-center">
    <div class="qty">
      <i class="fa-solid fa-minus" id="minus"></i>
      {{-- 因為是多筆資料所以要用陣列qty[] --}}
      <input name="qty[]" id="add_number" type="numeric" value="{{ $product->qty }}" min="1" class="col-4">
      <i class="fa-solid fa-plus" id="plus"></i>
    </div>
    <div class="price-of-item">
      $ {{ $product->qty * $product->product->product_price }}
    </div>
  </div>
  <hr>
  @endforeach
  {{-- 計算總價，寫在Controller比較好 --}}
  <?php 
$total = 0;
foreach ($shopping as $value) {
  $totle += $value->qty * $value->product->product_price;
}
?>
  <div class="container-fluid d-flex justify-content-end">
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
  <button class="btn btn-primary" type="submit">確認</button>
</form>
@endsection