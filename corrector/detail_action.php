<?php

include_once("../function/koneksi.php");
include_once("../function/helper.php");
session_start();
$corrector_id = $_SESSION['id'];
$job_order_id = $_GET['job_id'];

$queryComment = mysqli_query($koneksi, "SELECT * from corrector_comment where jo_number='$job_order_id'");

$submit = isset($_POST['submit']) ? $_POST['submit'] : "";
$proses_done = 3;
$proses_update = 1;
$comment = isset($_POST['comment']) ? $_POST['comment'] : "";


if (isset($_POST['button'])) {
    if ($submit == 'Done') {

        $targetDir = "../images/artwork-final/";
        $fileName = basename($_FILES['artwork_final']['name']);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        //format pdf bisa di ganti ke format file lain seperti JPG, PNG, GIF
        $allowTypes = array('pdf');
        if (!in_array($fileType, $allowTypes)) {
            echo "<script>window.location.href = 'detail.php?job_id=$job_order_id';alert('You can only upload PDF')</script>";
        } else {
            move_uploaded_file($_FILES['artwork_final']['tmp_name'], $targetFilePath);
            $update_proses = "UPDATE proses set process_id = '$proses_done' where job_id='$job_order_id'";
            $comment = "INSERT into corrector_comment(jo_number,corrector_id,comment)values('$job_order_id','$corrector_id','$comment')";
            $draft =  "INSERT into artwork_final(job_id,corrector_id,artwork_final)values('$job_order_id','$corrector_id','$fileName')";
            if (mysqli_query($koneksi, $draft)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $draft . "<br>" . mysqli_error($koneksi);
            }
            if (mysqli_query($koneksi, $update_proses)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $update_proses . "<br>" . mysqli_error($koneksi);
            }
            if (mysqli_query($koneksi, $comment)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $comment . "<br>" . mysqli_error($koneksi);
            }
            echo "<script>
            window.location.href = 'dashboard.php?id=$corrector_id';
            alert('Job Order Sudah Selesai');
            </script>";
        }
    } else if ($submit == "Revisi") {
        $update_proses = "UPDATE proses set process_id = '$proses_update' where job_id='$job_order_id'";
        if ($update_proses) {
            if ($update_proses) {
                if (mysqli_num_rows($queryComment) != 0) {
                    $comment = "UPDATE corrector_comment 
                    SET comment = '$comment'
                    where jo_number = '$job_order_id')";
                } else {
                    $comment = "INSERT into corrector_comment(jo_number,corrector_id,comment)values('$job_order_id','$corrector_id','$comment')";
                }
            }
        }
        if (mysqli_query($koneksi, $update_proses)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $draft . "<br>" . mysqli_error($koneksi);
        }
        if (mysqli_query($koneksi, $comment)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $update_proses . "<br>" . mysqli_error($koneksi);
        }
        echo "<script>
          window.location.href = 'dashboard.php?id=$corrector_id';
          alert('Revisi Sudah Dikirim Ke Drafter');
    </script>";
    }
}
