<?php

include_once("../function/koneksi.php");
include_once("../function/helper.php");

session_start();
$drafter_id = $_SESSION['id'];
$job_order_id = $_GET['job_id'];

$queryDraft = mysqli_query($koneksi, "SELECT artwork_draft.* from artwork_draft join job_order on artwork_draft.job_id=job_order.jo_number where artwork_draft.job_id=$job_order_id");
$rowDraft = mysqli_fetch_assoc($queryDraft);
$proses = 2;
$update_gambar = "";

if (isset($_POST['button'])) {
    // target directory
    $targetDir = "../images/artwork-draft/";
    $fileName = basename($_FILES['artwork_draft']['name']);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    //format pdf bisa di ganti ke format file lain seperti JPG, PNG, GIF
    $allowTypes = array('pdf');
    if (!in_array($fileType, $allowTypes)) {
        echo "<script>window.location.href = 'add_jo.php?job_id=$job_order_id';alert('You can only upload PDF')</script>";
    } else {
        move_uploaded_file($_FILES["artwork_draft"]["tmp_name"], $targetFilePath);
        if (mysqli_num_rows($queryDraft) != 0) {
            $draft =  "UPDATE artwork_draft SET artwork_draft = '$fileName' where job_id='$job_order_id'";
        } else {
            $draft =  "INSERT into artwork_draft(job_id,drafter_id,artwork_draft)values('$job_order_id','$drafter_id','$fileName')";
        }
        if (mysqli_query($koneksi, $draft)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $draft . "<br>" . mysqli_error($koneksi);
        }
        if ($draft) {
            $update_proses = "UPDATE proses set process_id = '$proses' where job_id='$job_order_id'";
        }

        if (mysqli_query($koneksi, $update_proses)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $update_proses . "<br>" . mysqli_error($koneksi);
        }
        echo "<script>
              window.location.href = 'dashboard.php?id=$drafter_id';
              alert('Artwork Draft Telah Di Submit');
        </script>";
    }
}
