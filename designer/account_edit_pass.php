<?php
// session_start();

include_once("../function/helper.php");
include_once("../function/koneksi.php");


$id = $_GET['id'];
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

    <title>Account</title>
</head>

<body>

    <div class="main-container d-flex">
        <?php include("sidebar.php") ?>
        <div class="content">
            <div class="text-center col-md-12 py-3 px-3 float-center" style="margin-top: 200px;">
                <form action="<?php echo BASE_URL2 . "account_action.php?id=$id"; ?>" method="POST">
                    <div class="row mb-3 justify-content-center">
                        <div class="col-6">
                            <label for="specialist_username" class="form-label">Password Lama</label>
                            <input type="password" class="form-control" name="old_password">
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-center">
                        <div class="col-6">
                            <label for="specialist_password" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" name="new_password">
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-center">
                        <div class="col-6">
                            <label for="specialist_password" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" name="confirm_new_password">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <input type="submit" class="btn btn-primary" value="Save">
                            <a href="<?php echo BASE_URL2 . "account.php?id=$id"; ?>" class="text-white text-decoration-none">
                                <button class="btn btn-danger" type="button" onclick="">Cancel</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../assets/jquery-3.6.0.min.js"></script>

</body>

</html>