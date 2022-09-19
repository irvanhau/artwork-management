<?php

include_once("../function/koneksi.php");

$cc_no = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * from change_control where id='$_GET[cc_id]'"));
$data_cc_no = array(
    'cc_detail' => $cc_no['cc_detail'],
    'no_item' => $cc_no['no_item'],
);

echo json_encode($data_cc_no);
