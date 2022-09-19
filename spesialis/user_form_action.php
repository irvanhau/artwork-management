<?php

include_once("../function/helper.php");
include_once("../function/koneksi.php");

session_start();
$id = $_SESSION['id'];

$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : "";
$role = isset($_POST["role"]) ? $_POST["role"] : $_GET['role'];
$nip = isset($_POST["nip"]) ? $_POST['role']  . $_POST['nip'] : "";
$fullname = isset($_POST['fullname']) ? $_POST['fullname'] : "";
$join_date = isset($_POST['join_date']) ? date('Y-m-d', strtotime($_POST['join_date'])) : "";
$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";

$button = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];

if ($role == "SP") {
  if ($button == "Save") {
    mysqli_query($koneksi, "INSERT into specialist (nip,full_name,join_date,username,password)values('$nip','$fullname','$join_date','$username','$password')");
    echo "<script>
        window.location.href = 'user_management.php?id=$id';
        alert('User Specialist Sudah Ditambahkan');
  </script>";
  } elseif ($button == "Update") {
    mysqli_query($koneksi, "UPDATE specialist set nip = '$nip',full_name='$fullname',join_date='$join_date',username='$username',password='$password' where id = '$user_id'");
    echo "<script>
        window.location.href = 'user_management.php?id=$id';
        alert('User Berhasil Diupdate');
  </script>";
  } elseif ($button == "Delete") {
    mysqli_query($koneksi, "DELETE from specialist where id='$user_id'");
    echo "<script>
        window.location.href = 'user_management.php?id=$id';
        alert('User Berhasil Dihapus');
  </script>";
  }
} else if ($role == "DR") {
  if ($button == "Save") {
    mysqli_query($koneksi, "INSERT into drafter (nip,full_name,join_date,username,password)values('$nip','$fullname','$join_date','$username','$password')");
    echo "<script>
        window.location.href = 'user_management.php?id=$id';
        alert('User Sudah Ditambahkan');
  </script>";
  } elseif ($button == "Update") {
    mysqli_query($koneksi, "UPDATE drafter set nip = '$nip',full_name='$fullname',join_date='$join_date',username='$username',password='$password' where id = '$user_id'");
    echo "<script>
        window.location.href = 'user_management.php?id=$id';
        alert('User Berhasil Diupdate');
  </script>";
  } elseif ($button == "Delete") {
    mysqli_query($koneksi, "DELETE from drafter where id='$user_id'");
    echo "<script>
        window.location.href = 'user_management.php?id=$id';
        alert('User Berhasil Dihapus');
  </script>";
  }
} else if ($role == "CR") {
  if ($button == "Save") {
    mysqli_query($koneksi, "INSERT into corrector (nip,full_name,join_date,username,password)values('$nip','$fullname','$join_date','$username','$password')");
    echo "<script>
        window.location.href = 'user_management.php?id=$id';
        alert('User Sudah Ditambahkan');
  </script>";
  } elseif ($button == "Update") {
    mysqli_query($koneksi, "UPDATE corrector set nip = '$nip',full_name='$fullname',join_date='$join_date',username='$username',password='$password' where id = '$user_id'");
    echo "<script>
        window.location.href = 'user_management.php?id=$id';
        alert('User Berhasil Diupdate');
  </script>";
  } elseif ($button == "Delete") {
    mysqli_query($koneksi, "DELETE from corrector where id='$user_id'");
    echo "<script>
        window.location.href = 'user_management.php?id=$id';
        alert('User Berhasil Dihapus');
  </script>";
  }
}
