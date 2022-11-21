<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  {{-- Tools --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.tailwindcss.com"></script>
  {{-- Styles --}}
  @yield('stylesheet')
  <link rel="stylesheet" href="{{asset('css/mydashboard.css')}}">
</head>
<body>
  <header>
    <a href="{{ route('index') }}" id="logo" style="background-image: url({{asset('img/logo-laravel-icon-512.png')}});"></a>
    <nav>
      <a href="{{ route('banner') }}" class="link">Banner</a>
      <a href="{{ route('product') }}" class="link">Product</a>
      <a href="{{ route('comment_board') }}" class="link">Comments</a>
      <a href="{{ route('cart') }}" class="link">
        <i class="fa-solid fa-cart-shopping"></i>
        Cart
      </a>
      <div id="user">
        <input id="user_icon" type="checkbox" hidden />
        <label for="user_icon">
          <i class="fa-solid fa-circle-user"></i>
        </label>
        <div id="user_list">
          @auth    
          <label>
            <a href="#" id="logout">
              Logout
            </a>
          </label>
          @endauth
          @guest
          <label>
            <a href="#" id="login">
              Login
            </a>
          </label>
          @endguest
        </div>
      </div>
    </nav>
  </header>
  
  <main>
    <!--  Main  -->
    @yield('main')
  </main>
  
  <footer>
    Copyright &copy; 2022, ZoA Anthony
  </footer>

  <script>
    const main = document.querySelector('main');
    const footer = document.querySelector('footer');
    const main_style = getComputedStyle(main);
    console.log((main_style.paddingTop.slice(0,-2)), main.scrollHeight, window.innerHeight);
    if ((main.scrollHeight+parseInt(main_style.paddingTop.slice(0,-2))) < (window.innerHeight - 76)) {
      footer.style = "position: fixed; bottom: 0px;"
    }else {
      footer.style = "";
    }
  </script>
  @yield('scripts')
</body>
</html>