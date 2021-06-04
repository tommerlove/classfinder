<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "db_classfinder";

    $conn = mysqli_connect($host, $user, $pass, $db);
            mysqli_set_charset($conn, 'utf8');
			date_default_timezone_set('Asia/Bangkok');