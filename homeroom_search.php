<?php include("connect.php"); ?>
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
                        <h3 class="card-title"><i class="fas fa-bullhorn"></i> ค้นหา QR Code ห้องประจำชั้น</h3>
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
                $s1 = "SELECT * FROM homeroom WHERE class = '".$_POST['class']."' AND room = '".$_POST['room']."' ";
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
                                    <th><center>Line ผู้ปกครอง</center></th>
                                    <th><center>Line กลุ่มนักเรียน</center></th>
                                    <th><center>Classroom</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    while($r1 = mysqli_fetch_array($q1)){
                                ?>
                                <tr>
                                    <td>
                                        <?php if($r1['homeroom_line_par'] != ''){ ?>
                                            <center><p><img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?php echo $r1['homeroom_line_par']; ?>&choe=UTF-8" title="par_<?php echo $r1['id']; ?>" /></p></center>
                                        <?php } else { ?>
                                            
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($r1['homeroom_line_stu'] != ''){ ?>
                                            <center><p><img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?php echo $r1['homeroom_line_stu']; ?>&choe=UTF-8" title="stu_<?php echo $r1['id']; ?>" /></p></center>
                                        <?php } else { ?>
                                            
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($r1['homeroom_gg'] != ''){ ?>
                                            <center><p><img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?php echo $r1['homeroom_gg']; ?>&choe=UTF-8" title="stu_<?php echo $r1['id']; ?>" /></p></center>
                                        <?php } else { ?>
                                            
                                        <?php } ?>
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