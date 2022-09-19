<?php

session_start();

unset($_SESSION['id']);
unset($_SESSION['nik']);
unset($_SESSION['username']);
unset($_SESSION['fullname']);
unset($_SESSION['role']);
unset($_SESSION['join_date']);
unset($_SESSION['password']);

header("location: index.php");
