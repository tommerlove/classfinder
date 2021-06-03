<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">หน้าแรก</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">หน้าแรก</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-bullhorn"></i> ค้นหา QR Code ห้องเรียน</h3>
                    </div>
                    <div class="card-body">
                    <form class="form-horizontal" method="post" action="<?php $_SERVER['SCRIPT_NAME']; ?>">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>ระดับชั้น :</label>
                                    <select class="form-control" id="class" name="class" required>
                                    <option value="">เลือกชั้นเรียน</option>
                                    <option value="1">มัธยมศึกษาปีที่ 1</option>
                                    <option value="2">มัธยมศึกษาปีที่ 2</option>
                                    <option value="3">มัธยมศึกษาปีที่ 3</option>
                                    <option value="4">มัธยมศึกษาปีที่ 4</option>
                                    <option value="5">มัธยมศึกษาปีที่ 5</option>
                                    <option value="6">มัธยมศึกษาปีที่ 6</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>ห้อง :</label>
                                    <select class="form-control" id="room" name="room" required>
                                    <option value="">เลือกห้องเรียน</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-block bg-gradient-warning"><i class="nav-icon fas fa-search"></i> ค้นหากลุ่มห้องเรียน</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
            if($_POST["class"] != "" AND $_POST["room"] != "") {
                $s1 = "SELECT * FROM subject WHERE class = '".$_POST['class']."' AND room = '".$_POST['room']."' ORDER BY subject_id ASC";
                $q1 = mysqli_query($conn, $s1);
        ?>

        <div class="row">
        
            <div class="col-md-12">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">ข้อมูลชั้นเรียนของชั้น ม.<?php echo $_POST['class'].'/'.$_POST['room']; ?></h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th><center>รหัสวิชา</center></th>
                                    <th><center>ชื่อวิชา</center></th>
                                    <th><center>ผู้สอน</center></th>
                                    <th><center>Facebook</center></th>
                                    <th><center>Line</center></th>
                                    <th><center>Google Classroom</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    while($r1 = mysqli_fetch_array($q1)){
                                ?>
                                <tr>
                                    <td>
                                    <center>
                                        <?php 
                                            $s2 = "SELECT * FROM data WHERE id = '".$r1['subject_id']."' ";
                                            $q2 = mysqli_query($conn, $s2);
                                            $r2 = mysqli_fetch_array($q2);

                                            echo $r2['code'];

                                            $s3 = "SELECT * FROM teacher WHERE regid = '".$r1['regid']."' ";
                                            $q3 = mysqli_query($conn, $s3);
                                            $r3 = mysqli_fetch_array($q3);
                                        ?>
                                    </center>
                                    </td>
                                    <td><?php echo $r2['course']; ?></td>
                                    <td><center><?php echo $r3['name']; ?></center></td>
                                    <td>
                                        <?php if($r1['fb'] != ''){ ?>
                                            <center><p><img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?php echo $r1['fb']; ?>&choe=UTF-8" title="fb_<?php echo $r1['id']; ?>" alt="fb_<?php echo $r1['id']; ?>" /></p></center>
                                        <?php } else { ?>
                                            
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($r1['line'] != ''){ ?>
                                            <center><p><img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?php echo $r1['line']; ?>&choe=UTF-8" title="line_<?php echo $r1['id']; ?>" alt="line_<?php echo $r1['id']; ?>" /></p></center>
                                        <?php } else { ?>
                                            
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($r1['gg'] != ''){ ?>
                                            
                                            <center><p><img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?php echo $r1['gg']; ?>&choe=UTF-8" title="gg_<?php echo $r1['id']; ?>" /></p></center>
                                        <?php } else { } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        
        </div>
        <?php } ?>


    </div>
</section>