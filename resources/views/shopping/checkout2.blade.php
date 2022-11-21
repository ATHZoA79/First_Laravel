@extends('template.dashboard')

@section('stylesheet')

@endsection

@section('main')
<div class="w-2/3 p-3 border border-slate-500 rounded-md text-slate-300">
  @include('template.shopping_head', array('step'=>2))
  <form action="{{ route('cart.step03') }}" method="POST" id="form">
    @csrf 
    <div class="px-2">
      <h2 class="mt-2 text-xl font-semibold">付款方式</h2>
      <div class="p-2">
        <input type="radio" name="payment" id="pay_1" value="1" checked>
        <label for="pay_1">貨到付款</label>
      </div>
      <div class="p-2">
        <input type="radio" name="payment" id="pay_2" value="2">
        <label for="pay_2">信用卡</label>
      </div>
      <div class="p-2">
        <input type="radio" name="payment" id="pay_3" value="3">
        <label for="pay_3">網路ATM</label>
      </div>
      <div class="p-2">
        <input type="radio" name="payment" id="pay_4" value="4">
        <label for="pay_4">超商代碼</label>
      </div>
      <h2 class="mt-2 text-xl font-semibold">運送方式</h2>
      <div class="p-2">
        <input type="radio" name="shipping_method" id="ship_1" value="1" checked>
        <label for="ship_1">超商取貨</label>
      </div>
      <div class="p-2">
        <input type="radio" name="shipping_method" id="ship_2" value="2">
        <label for="ship_2">宅配到府</label>
      </div>
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
      <a href="{{ route('cart') }}" class="p-2 border border-blue-700 rounded-md text-blue-700 font-semibold bg-slate-300">上一步</a>
      <button class="p-2 rounded-md bg-blue-700" type="submit">下一步</button>
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