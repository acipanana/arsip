<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Login E-Arsip</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/floating-labels/">

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/floating-labels.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    
  </head>
  <body style="background-image:url(images/slide/pic.jpg)">
    <div class="card mx-auto mt-5" style="max-width: 400px;">
    <div class="card-body" style="background-image:url(images/slide/pic.jpg)">
        <form class="form-signin" method="post" action="login.php">
            <div class="text-center mb-4 text-white">
                <img class="mb-4" src="images/slide/୨୧.jpg" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Login E-Arsip</h1>
                <p>Sebelum Masuk<br>silahkan Masukkan Kata Sandi dan Username Anda
            </div>

            <div class="form-label-group">
                <input type="text" id="username" name="username" class="form-control" placeholder="text" required autofocus>
                <label for="text">Email address</label>
            </div>

            <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="password" required>
                <label for="password">Password</label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2020</p>
        </form>
    </div>
</div>

</body>
</html>
