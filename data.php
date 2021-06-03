<?php
                    include("connect.php");

                    $sqlWeb = "SELECT * FROM dataweb WHERE id = '1' ";
                    $queWeb = mysqli_query($conn, $sqlWeb);
                    $resWeb = mysqli_fetch_array($queWeb);
                    $regDb = $resWeb['status'];
                ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">หน้าแรก</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">หน้าแรก</a></li>
                    <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
                </ol>
            </div>
        </div>
    </div>
</div>

<?php include("dataCount.php"); ?>

<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-3 col-12 offset-md-3">
                <div class="small-box bg-lightblue color-palette">
                <div class="inner">
                    <p><h3>ค้นหาห้องเรียน</h3></p>
                    <p><h4>รายวิชา</h4></p>
                </div>
                <div class="icon">
                    <i class="fas fa-warehouse"></i>
                </div>
                    <a href="index.php?page=subject_search" class="small-box-footer">คลิก <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-12">
                <div class="small-box bg-teal color-palette">
                <div class="inner">
                    <p><h3>ค้นหาห้องเรียน</h3></p>
                    <p><h4>ประจำชั้น</h4></p>
                </div>
                <div class="icon">
                    <i class="fas fa-school"></i>
                </div>
                    <a href="index.php?page=homeroom_search" class="small-box-footer">คลิก <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-12 offset-md-3">
                <div class="small-box bg-warning color-palette">
                <div class="inner">
                    <p><h3>สำหรับครู</h3></p>
                </div>
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                    <a href="teacher/" class="small-box-footer">คลิก <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

            <!-- <div class="col-md-6 offset-md-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-bullhorn"></i> ประกาศ</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        
                            
                            <div class="col-lg-6 col-6">
                            <a href="index.php?page=subject_search">
                                <div class="small-box bg-primary color-palette">
                                    <div class="inner">
                                        <p><h3>ค้นหาห้องเรียนรายวิชา</h3></p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-warehouse"></i>
                                    </div>
                                </div>
                            </a>
                            </div>
                            

                            <div class="col-lg-6 col-6">
                            <a href="index.php?page=homeroom_search">
                                <div class="small-box bg-warning color-palette">
                                    <div class="inner">
                                        <p><h3>ค้นหาห้องเรียนประจำชั้น</h3></p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-school"></i>
                                    </div>
                                </div>
                            </a>
                            </div>
                        
                        </div>

                    </div>
                </div>
            </div> -->
        </div>
        
    </div>
</section>