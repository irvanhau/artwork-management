<?php
include_once("function/helper.php");
include_once("function/koneksi.php");
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="<?php echo BASE_URL . "css/fontawesome-free-6.1.0-web/css/all.min.css" ?>" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <script src="<?php echo BASE_URL . "assets/jquery-3.6.0.min.js"; ?>"></script>
  <script src="<?php echo BASE_URL . "assets/script.js"; ?>"></script>
  <title>Login</title>
</head>

<body>
  <div class="home">
    <div class="d-flex">

      <!--Logo-->
      <div class="p-2 flex-fill">
        <img src="images/LOGO.png" class="logo">
      </div>

      <!--Form-->
      <span class="border border-success">
        <div class="p-2 flex-fill">
          <form method="POST" class="formulir" action="<?php echo BASE_URL . "proses_login.php"; ?>">
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" name="username" class="form-control" id="InputUsername" placeholder="username">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <i title="Show Password" class="btn-hide-show fa-regular fa-eye-slash"></i>
              <input type="password" name="password" class="form-control input-password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
        </div>
      </span>
    </div>
  </div>
  <!-- Optional JavaScript-->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


</body>

</html>