<?php
include("../connect.php");

$id = $_POST['id'];
$regid = str_replace("-","",$_POST['regid']);
$name = $_POST['name'];
$section = $_POST['section'];
$class = $_POST['class'];
$room = $_POST['room'];

$class = !empty($class) ? "$class" : NULL;
$room = !empty($room) ? "$room" : NULL;

    $sql =  "UPDATE rt_teacher SET
            regid = '$regid',
            name = '$name',
            section = '$section',
            class = '$class',
            room = '$room'
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