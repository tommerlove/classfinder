<?php
    if (isset($_GET['id'])) {
        echo $ggid = $_GET['id'];
    }

    $s1 = "SELECT * FROM subject WHERE id = '$ggid' ";
    $q1 = mysqli_query($conn, $s1);
    $r1 = mysqli_fetch_array($q1);
    $subjectDbId = $r1['subject_id'];
    $sub_class = $r1['class'];
    $sub_room = $r1['room'];
    $empCid = $r1['regid'];
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">ช่องทางติดต่อนักเรียนรายวิชา</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">ช่องทางติดต่อนักเรียนรายวิชา</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-6 col-12 offset-md-3">
                <div class="card card-olive">
                <div class="card-header">
                    <h3 class="card-title">ช่องทางติดต่อนักเรียนรายวิชา</h3>
                </div>
                <div class="card-body">
                <form class="form-horizontal formular" name="form1" id="confirm-form" method="post" enctype="multipart/form-data">
                <input type="hidden" id="id" name="id" value="<?php echo $ggid; ?>">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>วิชา :</label>
                                <select class="form-control select2" style="width: 100%;" id="subject_id" name="subject_id">
                                <option selected="">คุณยังไม่เลือกวิชา</option>
                                <?php
                                    $strSQL = "SELECT * FROM course WHERE section = '$sec' OR section='10' ";
                                    $objQuery = mysqli_query($conn, $strSQL);
                                    while ($objResult = mysqli_fetch_array($objQuery)) {
                                        if($subjectDbId == $objResult["id"]) {
                                            $sel = "selected";
                                        } else {
                                            $sel = "";
                                        }
                                ?>
                                <option value="<?php echo $objResult['id']; ?>" <?php echo $sel; ?>><?php echo $objResult['code'].' '.$objResult['course']; ?></option>
                                <?php
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label>ชั้นมัธยมศึกษาปีที่</label>
                                <select class="form-control" id="class" name="class" required>
                                <option value="">เลือกชั้นเรียน</option>
                                <?php
                                    $sql = "SELECT * FROM class";
                                    $query = mysqli_query($conn, $sql);
                                    while($result = mysqli_fetch_array($query)){
                                        if($sub_class == $result["id"]) {
                                            $sel = "selected";
                                        } else {
                                            $sel = "";
                                        }
                                    ?>
                                <option value="<?php echo $result["id"]; ?>" <?php echo $sel; ?>><?php echo $result["class_name"];?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label>ห้อง</label>
                                <select class="form-control" id="room" name="room" required>
                                <?php
                                    $sql = "SELECT * FROM room";
                                    $query = mysqli_query($conn, $sql);
                                    while($result = mysqli_fetch_array($query)){
                                        if($sub_room == $result["id"]) {
                                            $sel = "selected";
                                        } else {
                                            $sel = "";
                                        }
                                    ?>
                                <option value="<?php echo $result["id"]; ?>" <?php echo $sel;?>><?php echo $result["room_name"]; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>กลุ่ม Facebook</label>
                                <input type="text" class="form-control" id="fb" name="fb" <?php if($regid == $empCid){ ?> value="<?php echo $r1['fb']; ?>" <?php } ?> placeholder="นำ link url มาวาง" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>กลุ่ม Line</label>
                                <input type="text" class="form-control" id="line" name="line" <?php if($regid == $empCid){ ?> value="<?php echo $r1['line']; ?>" <?php } ?> placeholder="นำ link url มาวาง" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Google Classroom</label>
                                <input type="text" class="form-control" id="gg" name="gg" <?php if($regid == $empCid){ ?> value="<?php echo $r1['gg']; ?>" <?php } ?> placeholder="นำ link url มาวาง" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-block"><i class="fas fa-save"></i> บันทึก</button>
                    </form>
                </div>
            </div>

            </div>
        </div>
      
        <div class="row">
            <div class="col-lg-6 col-12 offset-md-3">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">ข้อมูล Link และ QR Code</h3>
                    </div>
                    <div class="card-body">
                    <input type="hidden" id="regid" name="regid" value="<?php echo $regid; ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>กลุ่ม Facebook</label>
                                    <input type="text" class="form-control" id="fb" name="fb" value="<?php echo $fb = $r1['fb']; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <?php if($fb != ''){ ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>QR Code Facebook</label>
                                    <center>
                                        <p><img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo $r1['fb']; ?>&choe=UTF-8" title="Link to Facebook Group" /></p>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>กลุ่ม Line</label>
                                    <input type="text" class="form-control" id="line" name="line" value="<?php echo $line = $r1['line']; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <?php if($line != ''){ ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>QR Code Line</label>
                                    <center>
                                        <p><img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo $r1['line']; ?>&choe=UTF-8" title="Link to Line Group class" /></p>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Google Classroom</label>
                                    <input type="text" class="form-control" id="gg" name="gg" value="<?php echo $gg = $r1['gg']; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <?php if($gg != ''){ ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>QR Code Google Classroom</label>
                                    <center>
                                        <p><img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo $r1['gg']; ?>&choe=UTF-8" title="Link to Line Google Classroom" /></p>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    
                    </div>
                </div>

            </div>
        </div>

        </div>
    </div>
</section>

<script src="../dist/js/jquery_1_8_3_DropDownList.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#confirm-form').on('submit',function(e) {  //Don't foget to change the id form
    $.ajax({
        url:'subject_edit_save.php', //===PHP file name====register_save1.php
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
                    window.location = "main.php?page=subject";
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