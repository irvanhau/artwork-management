<?php
include_once("../function/helper.php");
include_once("../function/koneksi.php");

$id = $_GET['id'];
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$confirm_new_password = $_POST['confirm_new_password'];

$queryUser = mysqli_query($koneksi, "SELECT * from drafter where id='$id' and password='$old_password'");

if (mysqli_num_rows($queryUser) == 0) {
    echo "<script>
      window.location.href = 'account_edit_pass.php?id=$id';
      alert('Password Yang Kamu Masukan Tidak Sesuai');
</script>";
} else {
    if ($new_password === $confirm_new_password) {
        $update_user = "UPDATE drafter set password = '$new_password' where id='$id'";

        if (mysqli_query($koneksi, $update_user)) {
            echo "<script>
              window.location.href = 'account.php?id=$id';
              alert('Password Berhasil Diganti');
        </script>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    } else {
        echo "<script>
              window.location.href = 'account_edit_pass.php?id=$id';
              alert('Password Baru Digunakan Tidak Sama');
        </script>";
    }
}
