<?php

include_once("function/helper.php");
include_once("function/koneksi.php");

$username = strtoupper($_POST['username']);
$password = $_POST['password'];
$role = substr($username, 0, 2);
echo $role;

if ($role == "SP") {
    $query = mysqli_query($koneksi, "SELECT * from specialist where nip='$username' AND password='$password'");
} else if ($role == "CR") {
    $query = mysqli_query($koneksi, "SELECT * from corrector where nip='$username' AND password='$password'");
} else {
    $query = mysqli_query($koneksi, "SELECT * from drafter where nip='$username' AND password='$password'");
}

if (mysqli_num_rows($query) == 0) {
    echo "<script>
          window.location.href = 'index.php';
          alert('Email atau Password yang anda masukan salah');
    </script>";
} else {


    $row = mysqli_fetch_assoc($query);
    session_start();

    $id = $row['id'];
    $_SESSION['id'] =    $row['id'];
    $_SESSION['nik'] = $row['nik'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['fullname'] = $row['full_name'];
    $_SESSION['join_date'] = $row['join_date'];
    $_SESSION['password'] = $row['password'];
    if ($role == "SP") {
        $_SESSION['role'] = "Specialist";
        header("location: " . BASE_URL1 . "dashboard.php?id=$id");
    } else if ($role == "CR") {
        $_SESSION['role'] = "Corrector";
        header("location: " . BASE_URL3 . "dashboard.php?id=$id");
    } else {
        $_SESSION['role'] = "Drafter";
        header("location: " . BASE_URL2 . "dashboard.php?id=$id");
    }
}
