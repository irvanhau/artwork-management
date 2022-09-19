<?php

include_once("../function/koneksi.php");
include_once("../function/helper.php");
session_start();
$id = $_SESSION['id'];

$artwork_status = implode(",", $_POST['artwork']);
$input_date = date('Y-m-d', strtotime($_POST['input_date']));
$due_date = date('Y-m-d', strtotime($_POST['due_date']));
$product_id = $_POST['product_id'];
$cc_no_id = $_POST['cc_no'];
$packaging_id = $_POST['packaging_id'];
$dimension_id = $_POST['dimension_id'];
$material_id = $_POST['material_id'];
$specialist_id = $id;
$corrector_id = $_POST['corrector_id'];
$drafter_id = $_POST['drafter_id'];

$button = $_POST['button'];
$proses = 1;

if (isset($_POST['button'])) {
    // target penyimpanan
    $targetDirSFP = "../images/SFP/";
    $targetDirDraw = "../images/Drawing/";
    $targetDirNIE = "../images/NIE/";
    $targetDirSPM = "../images/SPM/";
    // Validasi Attachment
    $fileNameSFP = basename($_FILES['sfp']['name']);
    $fileNameDraw = basename($_FILES['drawing']['name']);
    $fileNameNIE = basename($_FILES['nie']['name']);
    $fileNameSPM = basename($_FILES['spm']['name']);
    $targetFilePathSFP = $targetDirSFP . $fileNameSFP;
    $targetFilePathDraw = $targetDirDraw . $fileNameDraw;
    $targetFilePathNIE = $targetDirNIE . $fileNameNIE;
    $targetFilePathSPM = $targetDirSPM . $fileNameSPM;

    $fileTypeSFP = pathinfo($targetFilePathSFP, PATHINFO_EXTENSION);
    $fileTypeSDraw = pathinfo($targetFilePathDraw, PATHINFO_EXTENSION);
    $fileTypeNIE = pathinfo($targetFilePathNIE, PATHINFO_EXTENSION);
    $fileTypeSPM = pathinfo($targetFilePathSPM, PATHINFO_EXTENSION);
    //validasi file drawing
    $allowTypesDraw = array('img', 'jpg', 'jpeg', 'png', 'ai');
    // Validasi file SFP,NIE,SPM
    $allowTypesFile = array('pdf', 'doc', 'docx');

    if (!in_array($fileTypeSFP, $allowTypesFile) && !in_array($fileNameNIE, $allowTypesFile) && !in_array($fileNameSPM, $allowTypesFile) && !in_array($fileNameDraw, $allowTypesDraw)) {
        echo "<script>window.location.href = 'add_jo.php?job_id=$job_order_id';alert('You can only upload PDF,Doc and Docx in SPM, SFP, NIE and IMG, JPG, JPEG, PNG, AI in Drawing')</script>";
    } else {
        move_uploaded_file($_FILES["sfp"]["tmp_name"], $targetFilePathSFP);
        move_uploaded_file($_FILES["drawing"]["tmp_name"], $targetFilePathDraw);
        move_uploaded_file($_FILES["nie"]["tmp_name"], $targetFilePathNIE);
        move_uploaded_file($_FILES["spm"]["tmp_name"], $targetFilePathSPM);

        $query = mysqli_query(
            $koneksi,
            "INSERT into job_order(
            artwork_status,
            input_date,
            due_date,
            product_id,
            cc_no_id,
            packaging_id,
            dimension_id,
            material_id,
            specialist_id,
            drafter_id,
            corrector_id)values(
                '$artwork_status',
                '$input_date',
                '$due_date',
                '$product_id',
                '$cc_no_id',
                '$packaging_id',
                '$dimension_id',
                '$material_id',
                '$specialist_id',
                '$drafter_id',
                '$corrector_id')"
        );
        if ($query) {
            $job_id = mysqli_insert_id($koneksi); //The mysqli_insert_id() function returns the id (generated with AUTO_INCREMENT) from the last query.
            $update_proses = "INSERT INTO proses(job_id,process_id)values('$job_id','$proses')";
            $insertSFP = "INSERT into sfp(job_id,specialist_id,sfp_attach) values ('$job_id','$specialist_id','$fileNameSFP')";
            $insertDraw = "INSERT into drawing(job_id,specialist_id,draw_attach) values ('$job_id','$specialist_id','$fileNameDraw')";
            $insertNIE = "INSERT into nie(job_id,specialist_id,nie_attach) values ('$job_id','$specialist_id','$fileNameNIE')";
            $insertSPM = "INSERT into spm(job_id,specialist_id,spm_attach) values ('$job_id','$specialist_id','$fileNameSPM')";
        }
        if (mysqli_query($koneksi, $update_proses)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $update_proses . "<br>" . mysqli_error($koneksi);
        }
        if (mysqli_query($koneksi, $insertSFP)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $insertSFP . "<br>" . mysqli_error($koneksi);
        }
        if (mysqli_query($koneksi, $insertDraw)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $insertDraw . "<br>" . mysqli_error($koneksi);
        }
        if (mysqli_query($koneksi, $insertNIE)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $insertNIE . "<br>" . mysqli_error($koneksi);
        }
        if (mysqli_query($koneksi, $insertSPM)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $insertSPM . "<br>" . mysqli_error($koneksi);
        }
    }

    echo "<script>
          window.location.href = 'dashboard.php?id=$id';
          alert('Job Order Berhasil Ditambahkan');
    </script>";
}
