<?php

switch ($_GET['page']) {
    case 'data':	//เอาไว้เรียกโดยไม่เปลี่ยนหน้า
        include 'data.php'; //หน้าหลัก
        break;

        //หน้าที่จะถูกเรียกด้วย index.php?page=
        case 'homeroom':
            include 'homeroom.php';
            break;

        case 'subject':
            include 'subject.php';
            break;

        case 'subject_edit':
            include 'subject_edit.php';
            break;

        case 'class_check':
            include 'class_check.php';
            break;

    default:
        echo '';
        include 'data.php'; //หน้าที่ถูกเรียกใช้งานเป็นหน้าแรก
}