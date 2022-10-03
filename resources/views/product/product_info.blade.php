@extends('template.template')

@section('stylesheet')
    <link rel="stylesheet" href=" {{ asset('css/datatable.css') }} ">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('table')
    <div class="list-detail bg-light p-3">
        <div class="product-title">
            <h2 class="col-10">商品名稱</h2>
            <h4>
                {{ $product_info->product_name }}
            </h4>
        </div>
        <div>{{ $product_info->product_detail }}</div>
        <div class="d-flex">
            <img
            src="{{ $product_info->img_path }}"
            alt=""
            class="me-1"
            style="max-height:150px; object-fit:contain;">
        </div>
        <div class="row pt-2" style="border-top: solid 1px #ccc;">
            <div class="qty col-3">{{ $product_info->product_qty }}</div>
            <div class="price d-flex justify-content-end col-6">NT${{ $product_info->product_price }}</div>
            <div class="count d-flex col-3 align-items-center">
                <i class="fa-solid fa-minus" id="minus"></i>
                <input id="add_number" type="numeric" name="" id="" value="1" min="1">
                <i class="fa-solid fa-plus" id="plus"></i>
            </div>
        </div>
        <div class="d-flex col-12 justify-content-end">
            <button class="btn btn-primary">加入購物車</button>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    const MINUS = document.querySelector('#minus');
    const PLUS = document.querySelector('#plus');
    const ADD_NUMBER = document.querySelector('#add_number');

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
</script>
@endsection