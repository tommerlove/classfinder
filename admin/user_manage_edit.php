<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $s1 = "SELECT * FROM rt_teacher WHERE id = '$id' ";
    $q1 = mysqli_query($conn, $s1);
    $r1 = mysqli_fetch_array($q1);
    $section = $r1['section'];
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">แก้ไขข้อมูลสมาชิก</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">แก้ไขข้อมูลสมาชิก</a></li>
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
                    <h3 class="card-title">แก้ไขข้อมูลสมาชิก</h3>
                </div>
                <div class="card-body">
                <form class="form-horizontal formular" name="form1" id="confirm-form" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>เลขประจำตัวประชาชน :</label>
                                <input type="text" class="form-control" data-inputmask='"mask": "9-9999-99999-99-9"' id="regid" name="regid" value="<?php echo $r1['regid']; ?>" placeholder="เลขประจำตัวประชาชน" data-mask required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label>กลุ่มสาระฯ</label>
                                <select class="form-control" id="section" name="section" required>
                                <option value="">เลือกกลุ่มสาระฯ</option>
                                <?php
                                    $sql = "SELECT * FROM rt_group";
                                    $query = mysqli_query($conn, $sql);
                                    while($result = mysqli_fetch_array($query)){
                                        if($section == $result["id"]) {
                                            $sel = "selected";
                                        } else {
                                            $sel = "";
                                        }
                                ?>
                                <option value="<?php echo $result["id"]; ?>" <?php echo $sel;?>><?php echo $result["group_name"];?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>ชื่อ-นามสกุล :</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $r1['name']; ?>" placeholder="เช่น นายสอนดี รักโรงเรียน" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label>ชั้นมัธยมศึกษาปีที่</label>
                                <select class="form-control" id="class" name="class">
                                <option value="">เลือกชั้นเรียน</option>
                                <?php
                                    $sql = "SELECT * FROM rt_class";
                                    $query = mysqli_query($conn, $sql);
                                    while($result = mysqli_fetch_array($query)){
                                        if($r1['class'] == $result["id"]) {
                                            $sel = "selected";
                                        } else {
                                            $sel = "";
                                        }
                                ?>
                                <option value="<?php echo $result["id"]; ?>" <?php echo $sel;?>><?php echo $result["class_name"];?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label>ห้อง</label>
                                <select class="form-control" id="room" name="room">
                                <option value="">เลือกห้องเรียน</option>
                                <?php
                                    $sql = "SELECT * FROM rt_room";
                                    $query = mysqli_query($conn, $sql);
                                    while($result = mysqli_fetch_array($query)){
                                        if($r1['room'] == $result["id"]) {
                                            $sel = "selected";
                                        } else {
                                            $sel = "";
                                        }
                                ?>
                                <option value="<?php echo $result["id"]; ?>" <?php echo $sel;?>><?php echo $result["room_name"];?></option>
                                <?php } ?>
                                </select>
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
</section>

<script src="../dist/js/jquery_1_8_3_DropDownList.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#confirm-form').on('submit',function(e) { 
    $.ajax({
        url:'user_manage_edit_save.php',
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
                html: '',
                icon: 'success'
                }).then(function(confirm) { //ถ้าใช้ตัวล่างคือรอ delay
                    window.location = "main.php?page=subject";
                })
            }
            })
        },
        error:function(data){
            //Error Message == 'Title', 'Message body', Last one leave as it is
            Swal.fire("โอ๊ะโอ", "พบข้อผิดพลาดกรุณาตรวจสอบ :(", "error");
        }
        });
        e.preventDefault(); //This is to Avoid Page Refresh and Fire the Event "Click"
    });
    });
</script>