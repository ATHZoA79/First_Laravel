@extends('template.dashboard')

@section('stylesheet')
{{--
<link rel="stylesheet" href=" {{ asset('css/datatable.css') }} "> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('main')
<div class="w-1/2 p-3 border-2 border-slate-600 rounded-md">
    <h2 class="text-slate-300 text-3xl font-bold">商品名稱</h2>
    <div class="product-title">
        <h4 class="text-slate-300 text-xl fint-bold">
            {{ $product_info->product_name }}
        </h4>
        <img src="{{ $product_info->img_path }}" style="max-height:150px; object-fit:contain;">
        <div class="text-slate-500">{{ $product_info->product_detail }}</div>
    </div>
    <div class="flex">
        @foreach ($product_info->imgs as $product)
        <img src="{{ $product->img_path }}" alt="" class="" style="max-height:150px; object-fit:contain;">
        @endforeach
    </div>
    <hr class="my-3 border border-slate-300">
    <div class="flex py-2 text-slate-300">
        <div class="qty flex-1">剩餘數量：{{ $product_info->product_qty }}</div>
        <div class="price w-32 px-2 flex justify-end align-middle">NT${{ $product_info->product_price }}</div>
        <div class="count w-30 flex justify-end align-middle">
            <i class="fa-solid fa-minus" id="minus"></i>
            <input id="add_number" type="numeric" name="" value="1" min="1" class="w-20 mx-2 px-1 text-slate-700">
            <i class="fa-solid fa-plus" id="plus"></i>
        </div>
    </div>
    <div class="flex justify-end">
        <button id="add_product" class="p-2 rounded-md text-slate-300 bg-blue-700">
            加入購物車
        </button>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const MINUS = document.querySelector('#minus');
    const PLUS = document.querySelector('#plus');
    const ADD_NUMBER = document.querySelector('#add_number');
    const ADD_CART = document.querySelector('#add_product');

    MINUS.onclick = () => {
        if ( ADD_NUMBER.value > 1 ) {
            ADD_NUMBER.value = parseInt(ADD_NUMBER.value)-1;
        }
    };
    PLUS.onclick = () => {
        if ( ADD_NUMBER.value < {!! $product_info->product_qty !!} ) {
            ADD_NUMBER.value = parseInt(ADD_NUMBER.value)+1;
        }
    };
    ADD_CART.onclick = function() {
        console.log({!! $product_info->id !!});
        // 蒐集資料
        var fd = new FormData();
        fd.append('add_qty', parseInt(ADD_NUMBER.value));
        fd.append('product_id', {!! $product_info->id !!});
        fd.append('_token', '{!!csrf_token()!!}');

        // 傳送資料
        fetch('/add_to_cart', {
            // request data 
            method: 'POST',
            body: fd,
        })
        // .then(response => response.json())
        .then(response => {
            response.json();
            // console.log('response : '+response.text());
        })
        .catch(error => {
            // 只會抓網路錯誤，其餘的錯誤都在下方處理
            console.log(error);
            alert('Error');
            return 'error';
        })
        .then(response => {
            console.log('response : '+ response);
    
            if (response != 'error' || response.result == 'sucess') {
                alert('Sucess');
            }else {
                alert('Error : '+ response.message);
            }
        });
    }
</script>
@endsection