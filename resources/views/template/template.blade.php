<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Links -->
  {{-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/css/bootstrap.min.css' integrity='sha512-siwe/oXMhSjGCwLn+scraPOWrJxHlUgMBMZXdPe2Tnk3I0x3ESCoLz7WZ5NTH6SZrywMY+PB1cjyqJ5jAluCOg==' crossorigin='anonymous' /> --}}
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css' integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==' crossorigin='anonymous' />
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC:100,300,regular,500,700,900" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Styles -->
  @yield('stylesheet')
  <link rel="stylesheet" href="{{ asset('css/template.css') }}">

</head>

<body>

  <nav class="nav nav-pills bg-dark px-3">
    <div class="nav-img col-2">
      <a href="{{route('dashboard')}}">
        <img src=" {{ asset('img/logo-laravel-icon-512.png') }} " alt="">
      </a>
    </div>
    <div id="nav-list" class="d-flex col-10 justify-content-end">
      <a id="banner" class="btn btn-dark d-flex align-items-center " aria-current="page" href="/banner">橫幅管理</a>
      <a id="product" class="btn btn-dark d-flex align-items-center " href="/product">商品管理</a>
      <a id="cart" class="btn btn-dark d-flex align-items-center " href="{{Route::is('/')}}">
        <i class="fa-solid fa-cart-shopping"></i>
        購物車
      </a>
      <button id="user" class="btn btn-dark d-flex align-items-center " >
        <i class="fa-solid fa-circle-user"></i>
        <div id="drop-down">
          @auth
          <a href="{{route('logout')}}">
            登出
          </a>
          @else
          <a href="/login">
            登入
          </a>
          @endauth
        </div>
      </button>
    </div>
  </nav>

  <main>
    {{-- {{Auth::user()->id}} --}}
    @yield('card')

    @yield('comment-showcase')
    @yield('comment-board')

    @yield('table')
    @yield('index_main')
  </main>

  @yield('scripts')

  <footer class="">
    <span>Copyright by ZoA &copy; 2022</span>
  </footer>
</body>

</html>