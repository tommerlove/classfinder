<?php
include("connect.php");

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
    <img src="dist/img/<?php echo $r2['icon_school']; ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $r1['school_name']; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">เมนู</li>
                <li class="nav-item">
                    <a href="index.php" class="nav-link <?php if($_GET['page'] == '') { echo "active"; } ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>หน้าแรก</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=subject_search" class="nav-link <?php if($_GET['page'] == 'subject_search') { echo "active"; } ?>">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>ค้นหาห้องเรียน</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=homeroom_search" class="nav-link <?php if($_GET['page'] == 'homeroom_search') { echo "active"; } ?>">
                        <i class="nav-icon fas fa-school"></i>
                        <p>ค้นหาห้องประจำชั้น</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="teacher/" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>สำหรับครู</p>
                    </a>
                </li>
            
            </ul>
        </nav>
    </div>
</aside>