@extends('template.template')

@section('stylesheet')
    <link rel="stylesheet" href=" {{ asset('css/datatable.css') }} ">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('table')
    {{-- {{$product_info->id}} --}}
    <div class="list-detail bg-light p-3 card">
        <div class="product-title">
            <h2 class="col-10">商品名稱</h2>
            <h4>
                {{ $product_info->product_name }}
            </h4>
        </div>
        <div class="">{{ $product_info->product_detail }}</div>
        <div class="d-flex">
            @foreach ($product_info->imgs as $product)
            <img
            src="{{ $product->img_path }}"
            alt=""
            class="me-1"
            style="max-height:150px; object-fit:contain;">
            @endforeach
        </div>
        <div class="row py-2" style="border-top: solid 1px #ccc;">
            <div class="qty col-3">剩餘數量：{{ $product_info->product_qty }}</div>
            <div class="price d-flex justify-content-end col-6">NT${{ $product_info->product_price }}</div>
            <div class="count d-flex col-3 justify-content-end align-items-center">
                <i class="fa-solid fa-minus" id="minus"></i>
                <input id="add_number" type="numeric" name="" value="1" min="1" class="col-4">
                <i class="fa-solid fa-plus" id="plus"></i>
            </div>
        </div>
        <div class="d-flex col-12 justify-content-end">
            <button id="add_product" class="btn btn-primary">加入購物車</button>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    const MINUS = document.querySelector('#minus');
    const PLUS = document.querySelector('#plus');
    const ADD_NUMBER = document.querySelector('#add_number');
    const ADD_PRODUCT = document.querySelector('#add_product');

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
    ADD_PRODUCT.onclick = function() {
        var fd = new FormData();
        fd.append('add_qty', parseInt(ADD_NUMBER.value));
        fd.append('product_id', {!! $product_info->id !!});
        fd.append('_token', '{!!csrf_token()!!}');

        fetch('/add_to_cart', {
            // request data 
            method: 'POST',
            body: fd,
        })
        // .then(response => response.json())
        .then(response => {
            return response.json();
            // console.log('response : '+response.text());
        })
        .catch(error => {
            console.log(error);
            alert('Error');
            return 'error';
        })
        .then(response => {
            console.log(response);
    
            if (response != 'error' || response.result == 'sucess') {
                alert('Sucess');
            }else {
                alert('Error : '+ response.message);
            }
        });
    }
</script>
@endsection