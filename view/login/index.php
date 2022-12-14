<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Check-in Tour - Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
    <script src="utils/jquery/jquery-3.6.1.min.js"></script>
    <!-- Bootstrap core CSS -->
<link href="utils/bootstrap5/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form>
    <img class="mb-1" src="assets/images/check-in.png" alt="" width="100" height="57">
    <h1 class="h3 mb-4 fw-normal">Tour</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="login" autocomplete="off" placeholder="usuario">
      <label for="login">Login</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" autocomplete="off" placeholder="senha">
      <label for="password">Password</label>
    </div>

    <!-- <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div> -->
    <button class="w-100 btn btn-lg btn-primary">Login</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
  </form>
</main>
<script src="assets/js/validaAcesso.js"></script>
    
  </body>
</html>
