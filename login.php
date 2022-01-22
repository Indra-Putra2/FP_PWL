<?php
include "includes/login-act.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Login Page</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <!-- Bootstrap core CSS -->
		<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
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
  </head>
	
  <body>
		<?php include "includes/nav_login.php"; ?>
  <div class="container w-50 p-1 text-center">
    <form class="mt-5" method="POST">
      <img class="mb-4" src="assets/brand/logo_amikom_full_color.png" alt="" width="70" height="70">
      <h1 class="h3 mb-3 fw-normal">Silakan Login</h1>
      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username-nim" required>
        <label for="floatingInput">Masukkan username/NIM Anda</label>		
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
        <label for="floatingPassword">Masukkan password Anda</label>
      </div>
      <br>
      <p>
        <i>Masukkan username jika Anda admin<br>
           Masukkan NIM jika Anda mahasiswa</i>
      </p>
      
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me" name="remember-me" > Remember me
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Login</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2021 Universitas Amikom Yogyakarta</p>
    </form>
	</div>
  </body>
</html>

