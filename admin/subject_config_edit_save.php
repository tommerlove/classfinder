<?php
include("../connect.php");

$id = $_POST['id'];
$code = $_POST['code'];
$course = $_POST['course'];
$section = $_POST['section'];
$class = $_POST['class'];

    $sql =  "UPDATE course SET
            code = '$code',
            course = '$course',
            section = '$section',
            class = '$class'
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