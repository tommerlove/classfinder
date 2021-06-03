<?php
include("../connect.php");

$token = ""; //token_id
define('LINE_API',"https://notify-api.line.me/api/notify");
define('LINE_TOKEN',"$token");
$ipadd = $_SERVER["REMOTE_ADDR"]; //ตรวจสอบ ip
$savedate = date("d/m/Y");
$savetime = date("H:i:s");
$regid = $_POST['regid'];
$fb = $_POST['homeroom_line_par'];
$line = $_POST['homeroom_line_stu'];
$gg = $_POST['homeroom_gg'];

$s1 = "SELECT * FROM homeroom WHERE regid = '$regid' ";
$q1 = mysqli_query($conn, $s1);
$r1 = mysqli_fetch_array($q1);
$empCid = $r1['regid'];

$s2 = "SELECT * FROM teacher WHERE regid = '$regid' ";
$q2 = mysqli_query($conn, $s2);
$r2 = mysqli_fetch_array($q2);

$t_class = $r2['class'];
$t_room = $r2['room'];

    if($regid != $empCid){
        $sql =  "INSERT INTO homeroom (regid,class,room,homeroom_line_par,homeroom_line_stu,homeroom_gg,savedate,savetime)
                VALUES ('$regid','$t_class','$t_room','$fb','$line','$gg','$savedate','$savetime')";
        $query = mysqli_query($conn, $sql) or die ("ข้อมูลผิดพลาด : $sql " . mysqli_error($conn));
    } else {
        $sql =  "UPDATE homeroom SET
                homeroom_line_par = '$fb',
                homeroom_line_stu = '$line',
                homeroom_gg = '$gg',
                savedate = '$savedate',
                savetime = '$savetime'
                WHERE regid = '$regid' ";
        $query = mysqli_query($conn, $sql) or die ("ข้อมูลผิดพลาด : $sql " . mysqli_error($conn));
    }

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