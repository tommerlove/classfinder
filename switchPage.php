<?php

switch ($_GET['page']) {
    case 'data':	//เอาไว้เรียกโดยไม่เปลี่ยนหน้า
        include 'data.php'; //หน้าหลัก
        break;

        //หน้าที่จะถูกเรียกด้วย index.php?page=
        case 'subject_search':
            include 'subject_search.php';
            break;

            case 'homeroom_search':
                include 'homeroom_search.php';
                break;

    default:
        echo '';
        include 'data.php'; //หน้าที่ถูกเรียกใช้งานเป็นหน้าแรก
}