<?php
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[3];

include_once("../function/helper.php");
include_once("../function/koneksi.php");

session_start();
$id = $_SESSION['id'];
$role = $_SESSION['role'];
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Dashboard Designer</title>
</head>

<body>

    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4">
                <h1 class="fs-4">
                    <span class="px-2 me-2">
                        <img src="../images/logo-kecil.jpg" class="logo-kecil">
                    </span>
                </h1>
            </div>
            <ul class="list-unstyled px-3 pt-5">
                <li class="<?php if ($first_part == "dashboard.php") {
                                echo "active";
                            } else {
                                echo "noactive";
                            } ?>">
                    <a href="<?php echo BASE_URL2 . "dashboard.php?id=$id"; ?>" class="text-decoration-none px-3 py-2 d-block">
                    <i class="fas fa-th-large"></i>&nbsp Job Order List</a>
                </li>
                <li class="<?php if ($first_part == "analytics.php") {
                                echo "active";
                            } else {
                                echo "noactive";
                            } ?>">
                    <a href="<?php echo BASE_URL2 . "analytics.php?id=$id"; ?>" class="text-decoration-none px-3 py-2 d-block">
                    <i class="fas fa-chart-bar"></i>&nbsp Analytics</a>
                </li>
                <li class="<?php if ($first_part == "account.php") {
                                echo "active";
                            } else {
                                echo "noactive";
                            } ?>">
                    <a href="<?php echo BASE_URL2 . "account.php?id=$id"; ?>" class="text-decoration-none px-3 py-2 d-block">
                    <i class="fas fa-user"></i>&nbsp Account</a>
                </li>
                <li class="">
                    <a href="<?php echo BASE_URL . "logout.php"; ?>" class="text-decoration-none px-3 py-2 d-block">
                    <i class="fas fa-sign-out-alt"></i>&nbsp Logout</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../assets/jquery-3.6.0.min.js"></script>
    <script src="../javascript/sidebar.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

</body>

</html>