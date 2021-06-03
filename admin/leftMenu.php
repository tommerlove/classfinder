<?php
include("../connect.php");

    $s1 = "SELECT * FROM data_system WHERE id = '1' ";
    $q1 = mysqli_query($conn, $s1);
    $r1 = mysqli_fetch_array($q1);

    $s2 = "SELECT * FROM data_logo WHERE id = '1' ";
    $q2 = mysqli_query($conn, $s2);
    $r2 = mysqli_fetch_array($q2);
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Logo -->
    <a href="index.php" class="brand-link">
      <img src="../dist/img/<?php echo $r2['icon_school']; ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $r1['school_name']; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Logo User -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img class='img-circle elevation-2' src='../dist/img/user_boy.png'>
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $result['name']; ?></a>
            </div>
        </div>


      <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">เมนู</li>
                <li class="nav-item">
                    <a href="main.php" class="nav-link <?php if($_GET['page'] == '' || $_GET['page'] == 'main') { echo "active"; } ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>หน้าแรก</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="main.php?page=system_config" class="nav-link <?php if($_GET['page'] == 'system_config') { echo "active"; } ?>">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>ตั้งค่าระบบ</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="main.php?page=section_config" class="nav-link <?php if($_GET['page'] == 'section_config') { echo "active"; } ?>">
                        <i class="nav-icon fas fa-object-ungroup"></i>
                        <p>ตั้งค่ากลุ่มสาระฯ</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="main.php?page=subject_config" class="nav-link <?php if($_GET['page'] == 'subject_config') { echo "active"; } ?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>ตั้งค่าวิชา</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="main.php?page=user_manage" class="nav-link <?php if($_GET['page'] == 'user_manage') { echo "active"; } ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>จัดการสมาชิก</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="main.php?page=class_manage" class="nav-link <?php if($_GET['page'] == 'class_manage') { echo "active"; } ?>">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>จัดการชั้นเรียน</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="main.php?page=room_manage" class="nav-link <?php if($_GET['page'] == 'room_manage') { echo "active"; } ?>">
                        <i class="nav-icon fab fa-chromecast"></i>
                        <p>จัดการห้องเรียน</p>
                    </a>
                </li>
              
                <li class="nav-item">
                    <a href="main.php?page=profile" class="nav-link <?php if($_GET['page'] == 'profile') { echo "active"; } ?>">
                        <i class="nav-icon fas fa-user"></i>
                            <p>ข้อมูลส่วนตัว</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a onclick="LogOutClick()" class="nav-link"> <i class="nav-icon fas fa-sign-out-alt"></i> ออกจากระบบ</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>