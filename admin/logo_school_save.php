<?php
include("../connect.php");
$file1 = $_REQUEST['logo_school'];
$id = $_POST['id'];

if($_FILES['logo_school']['name'] != '') {   //not select file
    //โฟลเดอร์ที่จะ upload file เข้าไป 
    $path="../dist/img/";  

    //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
    $type = strrchr($_FILES['logo_school']['name'],".");
        
    //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
    $logo_school = "logo_school".$type;
    $path_copy = $path.$logo_school;
    $path_link = "../dist/img/".$logo_school;

    //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
    move_uploaded_file($_FILES['logo_school']['tmp_name'],$path_copy);  
    @unlink("../dist/img/".$_POST["logo_school"]);	
} else {
    $logo_school = $resDB['logo_school'];
}

$logo_school = !empty($logo_school) ? "$logo_school" : NULL;

$sql =  "UPDATE data_logo_login SET
                logo_school = '$logo_school'
                WHERE id = '$id' ";
        $query = mysqli_query($conn, $sql) or die ("ข้อมูลผิดพลาด : $sql " . mysqli_error($conn));