<?php
include_once("../function/koneksi.php");
$product = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * from product where id='$_GET[id]'"));
$data_product = array(
    'generic_name' => $product['generic_name'],
    'drug_id' => $product['drug_id'],
    'dossage_id' => $product['dossage_id'],
    'roa_id' => $product['roa_id'],
    'storage' => $product['storage'],
    'manufactured_id' => $product['manufactured_id'],
    'for_id' => $product['for_id'],
    'market_id' => $product['market_id'],
    'import_id' => $product['import_id'],
    'under_id' => $product['under_id'],
    'distribute_id' => $product['distribute_id'],
    'composition' => $product['composition'],
    'persentation' => $product['persentation'],
    'nie' => $product['nie'],
    'packaging_id' => $product['packaging_id'],
);
echo json_encode($data_product);
