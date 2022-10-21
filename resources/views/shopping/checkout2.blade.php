@extends('dashboard')

@section('stylesheet')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
  integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
  crossorigin='anonymous' />
@endsection

@section('main')
<form action="/shopping3" method="POST">
  @csrf 
  <h2 class="mt-3">購物車</h2>
  <div class="container border-bottom border-gary-500">
    <h2>訂單明細</h2>
    <input type="radio">
  </div>
  <button class="btn btn-primary" type="submit">確認</button>
</form>
@endsection