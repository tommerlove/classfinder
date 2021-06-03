<?php
include("../connect.php");

$code = $_POST['code'];
$course = $_POST['course'];
$section = $_POST['section'];
$class = $_POST['class'];

    $sql =  "INSERT INTO course (code,course,section,class)
            VALUES ('$code','$course','$section','$class')";
    $query = mysqli_query($conn, $sql) or die ("ข้อมูลผิดพลาด : $sql " . mysqli_error($conn));
    
if($query) {
    echo "<script language=javascript>Swal.fire({
            title: 'บันทึกข้อเสร็จสิ้น',
            html: '',
            icon: 'success',
            confirmButtonText: 'ตกลง'
        }).then(function() {
            window.location = 'main.php';
        })
        </script>";
}

mysqli_close($conn);