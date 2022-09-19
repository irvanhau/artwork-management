<?php
// session_start();

include_once("../function/helper.php");
include_once("../function/koneksi.php");


$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * from specialist where id=$id");
$row = mysqli_fetch_assoc($query);

$nip = $row['nip'];
$fullname = $row['full_name'];
$join_date = $row['join_date'];
$username = $row['username'];
$password = $row['password'];
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
            <div class="col-md-12 py-3 px-3">
                <div class="row">
                    <div class="col">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" class="form-control" disabled name="nip" placeholder="12345" value="<?php echo $nip; ?>" id="nik">
                    </div>
                    <div class="col">
                        <label for="specialist_name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" disabled name="fullname" value="<?php echo $fullname; ?>" id="specialist_name">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="role" class="form-label">Role</label>
                        <input type="text" disabled class="form-control" value="<?php echo $role; ?>" id="role">
                    </div>
                    <div class="col">
                        <label for="joinDate" class="form-label">Join Date</label>
                        <input type="" class="form-control" name="join_date" disabled value="<?php echo $join_date; ?>" id="joinDate">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="specialist_username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" disabled value="<?php echo $username; ?>" id="specialist_name">
                    </div>
                    <div class="col">
                        <label for="specialist_password" class="form-label">Password</label>
                        <input type="text" class="form-control" name="password" disabled value="<?php echo $password; ?>" id="specialist_password">
                    </div>
                </div>

                <div class="mb-3">
                    <a href="<?php echo BASE_URL1 . "account_edit_pass.php?id=$id"; ?>"><input type="submit" class="btn btn-danger" value="Edit Password"></a>
                    <a href="<?php echo BASE_URL1 . "dashboard.php?id=$id"; ?>" class="text-white text-decoration-none">
                        <button class="btn btn-warning" type="button" onclick="">Back</button></a>
                </div>

            </div>
        </div>
    </div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../assets/jquery-3.6.0.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

</body>

</html>