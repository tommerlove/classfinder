<?php
    include("../connect.php");
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <?php
                $s0 =   "SELECT id,
                        COUNT(*) AS numall
                        , SUM( CASE WHEN confirm LIKE '1' THEN 1 ELSE 0 END ) AS cloud
                        , SUM( CASE WHEN confirm LIKE '2' THEN 1 ELSE 0 END ) AS area
                        FROM stdconfirm";
                $que0 = mysqli_query($conn, $s0);
                while($res0 = mysqli_fetch_array($que0)){
                    $a = $res0['cloud'];
                    $b = $res0['area'];

                    $total = ((($a+$b)*100)/490);
            ?>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-lightblue color-palette">
                <div class="inner">
                    <h3><?php if($total == ""){ echo "0"; } else { echo number_format($total,2)." %"; } ?></h3>
                    <p>สมัครแล้ว</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">ดูเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a> -->
                <div class="small-box-footer">
                    <!-- &nbsp; -->
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                <div class="inner">
                    <h3><?php if($a == ""){ echo "0"; } else { echo $a; } ?></h3>
                    <p>รายงานตัวออนไลน์</p>
                </div>
                <div class="icon">
                    <i class="fas fa-globe-americas"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">ดูเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a> -->
                <div class="small-box-footer">
                    <!-- &nbsp; -->
                </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?php if($b == ""){ echo "0"; } else { echo $b; } ?></h3>
                    <p>รายงานตัวที่โรงเรียน</p>
                </div>
                <div class="icon">
                    <i class="fas fa-university"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">ดูเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a> -->
                <div class="small-box-footer">
                <!-- &nbsp; -->
                </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>