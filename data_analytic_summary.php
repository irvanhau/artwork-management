<?php

header('Content-Type: application/json; charset=utf8');

include_once("function/koneksi.php");

$sql = "SELECT COUNT(proses.process_id) as processID,
SUM(CASE WHEN proses.process_id = 1 THEN 1 ELSE 0 END) as Drafting,
SUM(CASE WHEN proses.process_id = 2 THEN 1 ELSE 0 END) as Checked,
SUM(CASE WHEN proses.process_id = 3 THEN 1 ELSE 0 END) as Done
from job_order
join proses on proses.job_id=job_order.jo_number

";

$query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));


$array = array();
while ($data = mysqli_fetch_assoc($query)) $array[] = $data;

echo json_encode($array);
