<?php
include("../connect.php");

$id = $_POST['id'];
$user = $_POST['username'];
$pass = $_POST['passlogin'];
$name = $_POST['name'];

    $sql =  "UPDATE dataadmin SET
            username = '$user',
            passlogin = '$pass',
            name = '$name'
            WHERE id = '$id' ";
    $query = mysqli_query($conn, $sql) or die ("ข้อมูลผิดพลาด : $sql " . mysqli_error($conn));
    
mysqli_close($conn);