<?php
include("../connect.php");

$id = $_POST['id'];
$name = $_POST['room_name'];


    $sql =  "UPDATE room SET
            room_name = '$name'
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