<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Links -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/css/bootstrap.min.css' integrity='sha512-siwe/oXMhSjGCwLn+scraPOWrJxHlUgMBMZXdPe2Tnk3I0x3ESCoLz7WZ5NTH6SZrywMY+PB1cjyqJ5jAluCOg==' crossorigin='anonymous' />
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC:100,300,regular,500,700,900" rel="stylesheet" />

  <!-- Styles -->
  <link rel="stylesheet" href=" {{ asset('css/template.css') }} ">
</head>

<body>

  <nav class="nav nav-pills flex-column flex-sm-row bg-dark">
    <div class="nav-img col-8">
      <a href="#">
        <img src=" {{ asset('img/logo-laravel-icon-512.png') }} " alt="">
      </a>
    </div>
    <a class="nav-btn" aria-current="page" href="#">Active</a>
    <a class="nav-btn" href="#">Longer nav link</a>
    <a class="nav-btn" href="#">Link</a>
  </nav>

  <div class="card-container justify-content-center">
    <div class="col-3">
      <div class="card">
        <div class="card-body">
          <img src="" class="card-img-top" alt="...">
          <p class="card-text">
            This is some text within a card body.
          </p>
        </div>
      </div>
    </div>
    <div class="col-3">
      <div class="card">
        <div class="card-body">
          <img src="..." class="card-img-top" alt="...">
          <p class="card-text">
            This is some text within a card body.
          </p>
        </div>
      </div>
    </div>
    <div class="col-3">
      <div class="card">
        <div class="card-body">
          <img src="..." class="card-img-top" alt="...">
          <p class="card-text">
            This is some text within a card body.
          </p>
        </div>
      </div>
    </div>
  </div>


</body>

</html>