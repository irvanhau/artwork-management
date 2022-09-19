<?php
include_once("../function/helper.php");
include_once("../function/koneksi.php");

$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : false;
$role = isset($_GET['role']) ? $_GET['role'] : "";

$nip = "";
$user_name = "";
$fullname = "";
$join_date = "";
$role_name = "Spesialis";
$password = "";
$button = "Save";

if ($role == "SP") {
    $queryUser = mysqli_query($koneksi, "SELECT * from specialist where id='$user_id'");
    $row = mysqli_fetch_assoc($queryUser);

    $kode_role = "SP";
    $nip = substr($row['nip'], 2, 20);
    $fullname = $row['full_name'];
    $join_date =  $row['join_date'];
    $user_name = $row['username'];
    $password = $row['password'];
    $button = "Update";
} else if ($role == "DR") {
    $queryUser = mysqli_query($koneksi, "SELECT * from drafter where id='$user_id'");
    $row = mysqli_fetch_assoc($queryUser);

    $kode_role = "DR";
    $nip = substr($row['nip'], 2, 20);
    $fullname = $row['full_name'];
    $join_date =  $row['join_date'];
    $user_name = $row['username'];
    $password = $row['password'];
    $button = "Update";
} else if ($role == "CR") {
    $queryUser = mysqli_query($koneksi, "SELECT * from corrector where id='$user_id'");
    $row = mysqli_fetch_assoc($queryUser);

    $kode_role = "CR";
    $nip = substr($row['nip'], 2, 20);
    $fullname = $row['full_name'];
    $join_date =  $row['join_date'];
    $user_name = $row['username'];
    $password = $row['password'];
    $button = "Update";
}
?>

<?php

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

    <title>User Management</title>
</head>

<body>

    <div class="main-container d-flex">
        <?php include("sidebar.php") ?>
        <div class="content">
            <div class="col-md-12 py-3 px-3">
                <form action="<?php echo BASE_URL1 . "user_form_action.php?user_id=$user_id"; ?>" method="POST">

                    <div class="row">
                        <div class="col-2">
                            <label for="kode_role" class="form-label">Kode Role</label>
                            <select name="role" class="form-control text-center">
                                <?php

                                if ($kode_role == "SP") {
                                    echo "
                                <option value='SP' selected>SP</option>
                                <option value='DR'>DR</option>
                                <option value='CR'>CR</option>";
                                } else if ($kode_role == "DR") {
                                    echo "
                                <option value='SP'>SP</option>
                                <option value='DR' selected>DR</option>
                                <option value='CR'>CR</option>";
                                } else if ($kode_role == "CR") {
                                    echo "
                                <option value='SP'>SP</option>
                                <option value='DR'>DR</option>
                                <option value='CR' selected>CR</option>";
                                } else {
                                    echo "
                                <option value='SP'>SP</option>
                                <option value='DR'>DR</option>
                                <option value='CR'>CR</option>";
                                }

                                ?>
                            </select>
                        </div>
                        <div class="col-5">
                            <label for="nik" class="form-label">NIP</label>
                            <input type="text" class="form-control" id="nik" name="nip" value="<?php echo $nip; ?>">
                        </div>
                        <div class=" col-5">
                            <label for="specialist_name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="fullname" value="<?php echo $fullname; ?>" id="specialist_name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2">
                            <label for="joinDate" class="form-label">Join Date</label>
                            <input type="date" class="form-control" name="join_date" value="<?php echo $join_date; ?>" id="joinDate">
                        </div>
                        <div class="col">
                            <label for="specialist_username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $user_name; ?>" id="specialist_name">
                        </div>
                        <div class="col">
                            <label for="specialist_password" class="form-label">Password</label>
                            <input type="text" class="form-control" name="password" value="<?php echo $password; ?>" id="specialist_password">
                        </div>
                    </div>

                    <div class="mb-3">
                        <input class="btn btn-danger" type="submit" name="button" value="<?php echo $button; ?>"></input>
                        <a href="<?php echo BASE_URL1 . "user_management.php?id=$id"; ?>"><button class="btn btn-warning" type="button">Cancel</button></a>
                    </div>
                </form>

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