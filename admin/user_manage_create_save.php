<?php
include("../connect.php");

$regid = str_replace("-","",$_POST['regid']);
$name = $_POST['name'];
$section = $_POST['section'];
$class = $_POST['class'];
$room = $_POST['room'];

$class = !empty($class) ? "$class" : NULL;
$room = !empty($room) ? "$room" : NULL;

    $sql =  "INSERT INTO teacher (regid,name,section,class,room)
            VALUES ('$regid','$name','$section','$class','$room')";
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