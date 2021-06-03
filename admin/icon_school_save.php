<?php
include("../connect.php");
$file1 = $_REQUEST['icon_school'];
$id = $_POST['id'];

if($_FILES['icon_school']['name'] != '') {   //not select file
    //โฟลเดอร์ที่จะ upload file เข้าไป 
    $path="../dist/img/";  

    //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
    $type = strrchr($_FILES['icon_school']['name'],".");
        
    //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
    $icon_school = "icon_school".$type;
    $path_copy = $path.$icon_school;
    $path_link = "../dist/img/".$icon_school;

    //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
    move_uploaded_file($_FILES['icon_school']['tmp_name'],$path_copy);  
    @unlink("../dist/img/".$_POST["icon_school"]);	
} else {
    $icon_school = $resDB['icon_school'];
}

$icon_school = !empty($icon_school) ? "$icon_school" : NULL;

$sql =  "UPDATE data_logo SET
                icon_school = '$icon_school'
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