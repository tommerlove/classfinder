<?php
include("../connect.php");

$id = $_POST['id'];
$name = $_POST['group_name'];


    $sql =  "UPDATE team SET
            group_name = '$name'
            WHERE id = '$id' ";
    $query = mysqli_query($conn, $sql) or die ("ข้อมูลผิดพลาด : $sql " . mysqli_error($conn));
    
if($query) {
    echo "<script language=javascript>Swal.fire({
            title: 'บันทึกเสร็จสิ้น',
            html: '',
            icon: 'success',
            confirmButtonText: 'ตกลง'
        }).then(function() {
            window.location = 'main.php';
        })
        </script>";
}

mysqli_close($conn);