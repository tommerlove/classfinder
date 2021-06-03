<?php

switch ($_GET['page']) {
    case 'data':	//เอาไว้เรียกโดยไม่เปลี่ยนหน้า
        include 'data.php'; //หน้าหลัก
        break;

        //หน้าที่จะถูกเรียกด้วย index.php?page=
        case 'system_config':
            include 'system_config.php';
            break;

        case 'section_config':
            include 'section_config.php';
            break;

        case 'section_config_edit':
            include 'section_config_edit.php';
            break;

        case 'section_config_create':
            include 'section_config_create.php';
            break;

        case 'user_manage':
            include 'user_manage.php';
            break;

        case 'user_manage_edit':
            include 'user_manage_edit.php';
            break;

        case 'user_manage_create':
            include 'user_manage_create.php';
            break;

        case 'user_manage_upload':
            include 'user_manage_upload.php';
            break;

        case 'class_manage':
            include 'class_manage.php';
            break;

        case 'class_manage_create':
            include 'class_manage_create.php';
            break;

        case 'class_manage_edit':
            include 'class_manage_edit.php';
            break;

        case 'room_manage':
            include 'room_manage.php';
            break;

        case 'room_manage_create':
            include 'room_manage_create.php';
            break;

        case 'room_manage_edit':
            include 'room_manage_edit.php';
            break;

        case 'subject_config':
            include 'subject_config.php';
            break;

        case 'subject_config_create':
            include 'subject_config_create.php';
            break;

        case 'subject_config_edit':
            include 'subject_config_edit.php';
            break;

        case 'subject_config_upload':
            include 'subject_config_upload.php';
            break;

        case 'profile':
            include 'profile.php';
            break;

        case 'profile_save':
            include 'profile_save.php';
            break;

    default:
        echo '';
        include 'data.php'; //หน้าที่ถูกเรียกใช้งานเป็นหน้าแรก
}