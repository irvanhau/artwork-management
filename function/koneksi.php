<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "artwork";

$koneksi = mysqli_connect($server, $username, $password, $database) or die("Koneksi Gagal");
