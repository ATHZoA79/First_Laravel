@extends('template.dashboard')

@section('stylesheet')

@endsection

@section('main')
<div class="w-2/3 p-3 border border-slate-500 rounded-md text-slate-300">
  @include('template.shopping_head', array('step'=>3))
  <form action="{{ route('cart.step04') }}" method="POST" id="form">
    @csrf 
    <h2 class="text-xl font-semibold">寄送資料</h2>
    <div class="px-3">
      <label for="user_name">姓名：</label>
      <input class="w-full" type="text" id="user_name" name="user_name">
      <label for="phone">電話：</label>
      <input class="w-full" type="text" id="phone" name="phone">
      <label for="email">電子郵件：</label>
      <input class="w-full" type="text" id="email" name="email">
      <label for="address">地址：</label>
      <input class="w-full" type="text" id="address" name="address">
    </div>
    <hr class="my-3 border-slate-300">
    <?php 
      $total = 0;
      foreach ($cart as $item) {
        $total += $item->qty * $item->product->product_price;
      }
    ?>
    <div class="flex flex-col items-end">
      <div id="item-qty">
        品項數量：{{ count($cart) }}
      </div>
      <div id="subtotal">
        小計：${{ $total }}
      </div>
      <div id="charge">
        運費：-
      </div>
      <div id="total">
        總計：${{ $total }}
      </div>
    </div>
    <div class="flex justify-between mt-3">
      <a href="{{ route('cart.step02') }}" class="p-2 border border-blue-700 rounded-md text-blue-700 font-semibold bg-slate-300">上一步</a>
      <button class="p-2 rounded-md bg-blue-700" type="submit" onclick="Submit()">下一步</button>
    </div>
  </form>
</div>
@endsection

@section('scripts')
<script>
  function Submit() {
    document.querySelector('#form').submit();
  }
</script>
@endsection