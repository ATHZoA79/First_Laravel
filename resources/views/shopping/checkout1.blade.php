@extends('template.dashboard')

@section('stylesheet')
@endsection

@section('main')
<div class="w-2/3 p-3 text-slate-300 border border-slate-500 rounded">
  <form action="/shopping2" method="POST">
    @csrf
    <h2 class="mt-3 text-2xl font-bold">購物車</h2>
    <h3 class="text-slate-400">訂單明細</h3>
    @foreach ($shopping as $product)
    {{-- 逐一列出品項資訊 --}}
    <hr class="my-2 border-slate-500">
    <div class="flex">
      <div class="w-2/3 flex border-bottom-1">
        <img src="{{ $product->product->img_path }}" class="border-2 border-slate-500 rounded-full"
          style="max-width: 120px; max-height: 120px; object-fit: contain;">
        <div class="flex flex-column justify-center">
          <div class="product_name">
            {{ $product->product->product_name }}
          </div>
          <div class="product_detail">
            {{ $product->product->product_detail }}
          </div>
        </div>
      </div>
      <div class="flex justify-end items-center">
        <div class="qty" data-id="{{ $product->id }}">
          <i class="minus fa-solid fa-minus" id="minus"></i>
          {{-- 因為是多筆資料所以要用陣列qty[] --}}
          <input name="qty[]" type="numeric" value="{{ $product->qty }}" min="1" class="add-qty w-14 text-slate-800">
          <i class="plus fa-solid fa-plus" id="plus"></i>
        </div>
        <div class="product-price px-2" data-price="{{ $product->product->product_price }}"
          data-limit="{{ $product->product->product_qty }}">
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
    <hr class="my-3 border-slate-300">
    <div class="flex flex-col items-end">
      <div class="">
        品項數量：{{ count($shopping) }}
      </div>
      <div class="">
        小計：${{ $total }}
      </div>
      <div class="">
        運費：$100
      </div>
      <div class="">
        總計：${{ $total+100 }}
      </div>
      <button class="p-2 rounded-md bg-blue-700" type="submit">確認</button>
    </div>
  </form>
</div>
@endsection
@section('scripts')
<script>
  function countQty(element, cnt) {
    const qtyElement = element.parentElement.querySelector('.add-qty');
    const priceElement = element.parentElement.nextElementSibling;
    const productId = element.parentElement.dataset.id;
    let qty = parseInt(qtyElement.value) + cnt;
    console.log(qty, parseInt(priceElement.dataset.limit));
    // 防呆
    if (qty < 1 ) {
      qty = 1 ;
    }
    if (qty > parseInt(priceElement.dataset.limit)) {
      qty = parseInt(priceElement.dataset.limit) ;
    }
    qtyElement.value = qty;

    // 將數量傳至後端，達成及時運算
    let fd = new FormData();
      fd.append('_token','{{csrf_token()}}');
      fd.append('id',parseInt(productId));
      fd.append('qty',qtyElement.value);
      // 送出表單
      let url = '{{ route("cart.update") }}';
      fetch(url, {
        'method':'post',
        'body':fd,
      }).then(response=> {
        return response.json();
      }).then(data=> {
        // 確定接收資料不為空值
        if (data.qty) {
          console.log(data);
          qtyElement.value = data.qty;
          countTotal(element);
        }
      });
  }
  function countTotal(element) {
    // 計算單品項總價
    const qtyElement = element.parentElement.querySelector('.add-qty');
    const priceElement = element.parentElement.nextElementSibling;
    let price = Number(priceElement.dataset.price);
    let qty = Number(qtyElement.value);
    let total = price*qty;
    priceElement.textContent = `$ ${total}`;
  }
  const minusElements = document.querySelectorAll('.minus');
  const plusElements = document.querySelectorAll('.plus');
  minusElements.forEach( (m) => {
    m.addEventListener('click', function() {
      console.log("-1");
      countQty(this, -1);
    });
  });
  plusElements.forEach( (p) => {
    p.addEventListener('click', function() {
      console.log("+1");
      countQty(this, 1);
    });
  });
</script>
@endsection