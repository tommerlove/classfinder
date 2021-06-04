<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">ช่องทางติดต่อห้องประจำชั้น</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">ช่องทางติดต่อห้องประจำชั้น</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-6 col-12 offset-md-3">
                <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">ช่องทางติดต่อห้องประจำชั้น [ม.<?php echo $class.'/'.$room; ?>]</h3>
                </div>
                <div class="card-body">
                <form class="form-horizontal formular" name="form1" id="confirm-form" method="post" enctype="multipart/form-data">
                <input type="hidden" id="regid" name="regid" value="<?php echo $regid; ?>">
                <?php
                    $s1 = "SELECT * FROM homeroom WHERE regid = '$regid' " ;
                    $q1 = mysqli_query($conn, $s1);
                    $r1 = mysqli_fetch_array($q1);
                    $empCid = $r1['regid'];
                ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>กลุ่ม Line ผู้ปกครอง</label>
                                <input type="text" class="form-control" id="homeroom_line_par" name="homeroom_line_par" <?php if($regid == $empCid){ ?> value="<?php echo $r1['homeroom_line_par']; ?>" <?php } ?> placeholder="นำ link url มาวาง" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>กลุ่ม Line นักเรียน</label>
                                <input type="text" class="form-control" id="homeroom_line_stu" name="homeroom_line_stu" <?php if($regid == $empCid){ ?> value="<?php echo $r1['homeroom_line_stu']; ?>" <?php } ?> placeholder="นำ link url มาวาง" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Classroom</label>
                                <input type="text" class="form-control" id="homeroom_gg" name="homeroom_gg" <?php if($regid == $empCid){ ?> value="<?php echo $r1['homeroom_gg']; ?>" <?php } ?> placeholder="นำ link url มาวาง" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> บันทึก</button>
                    </form>
                </div>
            </div>

            </div>
        </div>

        <?php
            $s1 = "SELECT * FROM homeroom WHERE regid = '$regid' " ;
            $q1 = mysqli_query($conn, $s1);
            $r1 = mysqli_fetch_array($q1);
            $empCid = $r1['regid'];
            
            if($regid == $empCid){
        ?>
        <form class="form-horizontal formular" name="form1" id="confirm-form" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6 col-12 offset-md-3">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">ข้อมูล Link และ QR Code [ม.<?php echo $class.'/'.$room; ?>]</h3>
                    </div>
                    <div class="card-body">
                    <input type="hidden" id="regid" name="regid" value="<?php echo $regid; ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>QR Code Line ผู้ปกครอง</label>
                                    <input type="text" class="form-control" id="homeroom_line_par" name="homeroom_line_par" value="<?php echo $fb = $r1['homeroom_line_par']; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <?php if($fb != ''){ ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>QR Code Line ผู้ปกครอง</label>
                                    <center>
                                        <p><img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo $r1['homeroom_line_par']; ?>&choe=UTF-8" title="Link to Line Group Parrents <?php echo $class.'/'.$room; ?>" /></p>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>QR Code Line นักเรียน</label>
                                    <input type="text" class="form-control" id="homeroom_line_stu" name="homeroom_line_stu" value="<?php echo $line = $r1['homeroom_line_stu']; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <?php if($line != ''){ ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>QR Code Line</label>
                                    <center>
                                        <p><img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo $r1['homeroom_line_stu']; ?>&choe=UTF-8" title="Link to Line Group Student class <?php echo $class.'/'.$room; ?>" /></p>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>QR Code Classroom</label>
                                    <input type="text" class="form-control" id="homeroom_gg" name="homeroom_gg" value="<?php echo $gg = $r1['homeroom_gg']; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <?php if($gg != ''){ ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>QR Code Classroom</label>
                                    <center>
                                        <p><img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo $r1['homeroom_gg']; ?>&choe=UTF-8" title="Link to Google Classroom class <?php echo $class.'/'.$room; ?>" /></p>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                </div>

            </div>
        </div>
        <?php } ?>
    </div>
</section>

<script src="../dist/js/jquery_1_8_3_DropDownList.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#confirm-form').on('submit',function(e) {  //Don't foget to change the id form
    $.ajax({
        url:'homeroom_save.php', //===PHP file name====homeroom_save.php
        data:$(this).serialize(),
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        type:'post',
        success:function(data){
            console.log(data);
            Swal.fire({
            title: 'โปรดทราบ!!',
            html: 'กรุณาตรวจข้อมูลให้ถูกต้อง ก่อนทำการบันทึก',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก'
            }).then((result) => {
            if (result.value) {
                Swal.fire({
                title: 'บันทึกสำเร็จ!',
                html: 'ท่านสามารถแก้ไขข้อมูลติดต่อได้ตลอดเวลา',
                icon: 'success'
                }).then(function(confirm) { //ถ้าใช้ตัวล่างคือรอ delay
                    window.location = "main.php?page=homeroom";
                })
            }
            })
        },
        error:function(data){
            Swal.fire("โอ๊ะโอ", "พบข้อผิดพลาดกรุณาตรวจสอบ :(", "error");
        }
        });
        e.preventDefault(); //This is to Avoid Page Refresh and Fire the Event "Click"
    });
    });
</script>