<?php

include_once("../function/helper.php");
include_once("../function/koneksi.php");
session_start();
$id = $_SESSION['id'];
$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : "";

$product_name = isset($_POST['prod_name']) ? $_POST['prod_name'] : "";
$generic_name = isset($_POST['generic_name']) ? $_POST['generic_name'] : "";
$drug_id = isset($_POST['drug_id']) ? $_POST['drug_id'] : "";
$dossage_id = isset($_POST['dossage_id']) ? $_POST['dossage_id'] : "";
$roa_id = isset($_POST['roa_id']) ? $_POST['roa_id'] : "";
$storage = isset($_POST['storage']) ? $_POST['storage'] : "";
$manufactured_id = isset($_POST['manufactured_id']) ? $_POST['manufactured_id'] : "";
$for_id = isset($_POST['for_id']) ? $_POST['for_id'] : "";
$market_id = isset($_POST['market_id']) ? $_POST['market_id'] : "";
$import_id = isset($_POST['import_id']) ? $_POST['import_id'] : "";
$under_id = isset($_POST['under_id']) ? $_POST['under_id'] : "";
$distribute_id = isset($_POST['distribute_id']) ? $_POST['distribute_id'] : "";
$composition = isset($_POST['composition']) ? $_POST['composition'] : "";
$persentation = isset($_POST['persentation']) ? $_POST['persentation'] : "";
$nie = isset($_POST['nie']) ? $_POST['nie'] : "";

$button = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];

if ($button == "Submit") {
    $queryInsert = "INSERT into product(
        product_name,
        generic_name,
        drug_id,
        dossage_id,
        roa_id,
        storage,
        manufactured_id,
        for_id,
        market_id,
        import_id,
        under_id,
        distribute_id,
        composition,
        persentation,
        nie)values(
        '$product_name',
        '$generic_name',
        '$drug_id',
        '$dossage_id',
        '$roa_id',
        '$storage',
        '$manufactured_id',
        '$for_id',
        '$market_id',
        '$import_id',
        '$under_id',
        '$distribute_id',
        '$composition',
        '$persentation',
        '$nie')";
    if (mysqli_query($koneksi, $queryInsert)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $queryInsert . "<br>" . mysqli_error($koneksi);
    }
    echo "<script>
          window.location.href = 'product.php?id=$id';
          alert('Product Berhasil Ditambahkan');
    </script>";
} else if ($button == "Update") {
    $queryUpdate = "UPDATE product SET
    product_name='$product_name',
    generic_name='$generic_name',
    drug_id='$drug_id',
    dossage_id='$dossage_id',
    roa_id='$roa_id',
    storage='$storage',
    manufactured_id='$manufactured_id',
    for_id='$for_id',
    market_id='$market_id',
    import_id='$import_id',
    under_id='$under_id',
    distribute_id='$distribute_id',
    composition='$composition',
    persentation='$persentation',
    nie='$nie'
    where id='$product_id'";
    if (mysqli_query($koneksi, $queryUpdate)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $queryUpdate . "<br>" . mysqli_error($koneksi);
    }
    echo "<script>
          window.location.href = 'product.php?id=$id';
          alert('Product Berhasil Diupdate');
    </script>";
} else if ($button == "Delete") {
    $queryDelete = "DELETE from product where id='$product_id'";
    if (mysqli_query($koneksi, $queryDelete)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $queryDelete . "<br>" . mysqli_error($koneksi);
    }
    echo "<script>
          window.location.href = 'product.php?id=$id';
          alert('Product Berhasil Dihapus');
    </script>";
}
