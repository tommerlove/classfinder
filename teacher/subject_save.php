<?php
include("../connect.php");

$token = ""; //token_id
define('LINE_API',"https://notify-api.line.me/api/notify");
define('LINE_TOKEN',"$token");
$ipadd = $_SERVER["REMOTE_ADDR"]; //ตรวจสอบ ip
$savedate = date("d/m/Y");
$savetime = date("H:i:s");
$regid = $_POST['regid'];
$subjectid = $_POST['subject_id'];
$sub_class = $_POST['class'];
$sub_room = $_POST['room'];
$fb = $_POST['fb'];
$line = $_POST['line'];
$gg = $_POST['gg'];

$s1 = "SELECT * FROM subject WHERE regid = '$regid' ";
$q1 = mysqli_query($conn, $s1);
$r1 = mysqli_fetch_array($q1);
$empCid = $r1['regid'];

    
        $sql =  "INSERT INTO subject (regid,subject_id,class,room,fb,line,gg,savedate,savetime)
                VALUES ('$regid','$subjectid','$sub_class','$sub_room','$fb','$line','$gg','$savedate','$savetime')";
        $query = mysqli_query($conn, $sql) or die ("ข้อมูลผิดพลาด : $sql " . mysqli_error($conn));
    
if($q1) {
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