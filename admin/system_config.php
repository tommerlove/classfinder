<?php
include("connect.php");

    $s1 = "SELECT * FROM data_system WHERE id = '1' ";
    $q1 = mysqli_query($conn, $s1);
    $r1 = mysqli_fetch_array($q1);

    $s2 = "SELECT * FROM data_logo WHERE id = '1' ";
    $q2 = mysqli_query($conn, $s2);
    $r2 = mysqli_fetch_array($q2);

    $s3 = "SELECT * FROM data_logo_login WHERE id = '1' ";
    $q3 = mysqli_query($conn, $s3);
    $r3 = mysqli_fetch_array($q3);
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">ตั้งค่ากระบบ</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">ตั้งค่ากระบบ</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card card-olive">
                    <div class="card-header">
                        <h3 class="card-title">ชื่อโรงเรียน</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal formular" name="form1" id="confirm-form" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="hidden" id="id" name="id" value="<?php echo $r1['id']; ?>">
                                        <input type="text" class="form-control" id="school_name" name="school_name" value="<?php echo $r1['school_name']; ?>" placeholder="เช่น มัธยมศึกษาปีที่ ?" required>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">ไอคอนโรงเรียน</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal formular" name="form2" id="confirm-form2" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>ไอคอนโรงเรียน :</label>
                                        <a href="../dist/img/<?php echo $r2['icon_school']; ?>" target="_blank" class="btn btn-warning"><i class="fas fa-search"></i> ดู</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="hidden" id="id" name="id" value="<?php echo $r2['id']; ?>">
                                        <div class="col-sm-12">
                                    <div class="form-group">
                                    <label>เพิ่ม/แก้ไข ไอคอนโรงเรียน<font color="red">**</font></label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="icon_school" name="icon_school">
                                            <label class="custom-file-label" for="icon_school">เพิ่ม/แก้ไข ไอคอนโรงเรียน</label>
                                        </div>
                                    </div>
                                </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                            <button type="submit" onclick="return (OnUploadlogo())" id="confirm-form2" class="btn btn-primary"><i class="fas fa-save"></i> บันทึก</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">โลโก้เข้าสู่ระบบ</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal formular" name="form3" id="confirm-form3" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>โลโก้เข้าสู่ระบบ :</label>
                                        <a href="../dist/img/<?php echo $r3['logo_school']; ?>" target="_blank" class="btn btn-info"><i class="fas fa-search"></i> ดู</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="hidden" id="id" name="id" value="<?php echo $r3['id']; ?>">
                                        <div class="col-sm-12">
                                    <div class="form-group">
                                    <label>เพิ่ม/แก้ไข โลโก้เข้าสู่ระบบ<font color="red">**</font></label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="logo_school" name="logo_school">
                                            <label class="custom-file-label" for="logo_school">เพิ่ม/แก้ไข โลโก้เข้าสู่ระบบ</label>
                                        </div>
                                    </div>
                                </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                            <button type="submit" onclick="return (OnUploadlogoSchool())" id="confirm-form3" class="btn btn-info"><i class="fas fa-save"></i> บันทึก</button>
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
        url:'name_school_save.php',
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
            Swal.fire("โอ๊ะโอ", "พบข้อผิดพลาดกรุณาตรวจสอบ :(", "error");
        }
        });
        e.preventDefault(); //This is to Avoid Page Refresh and Fire the Event "Click"
    });
    });
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#confirm-form2').on('submit',function(e) { 
    $.ajax({
        url:'icon_school_save.php',
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
            Swal.fire("โอ๊ะโอ", "พบข้อผิดพลาดกรุณาตรวจสอบ :(", "error");
        }
        });
        e.preventDefault(); //This is to Avoid Page Refresh and Fire the Event "Click"
    });
    });
</script>

<script>
	function OnUploadlogo()
	{
		var extall1=" jpg , jpeg , png , pdf ";

		file = document.form2.logo_school.value;
		ext = file.split('.').pop().toLowerCase();
		if(parseInt(extall1.indexOf(ext)) < 0)
		{
			Swal.fire('ผิดพลาด!!','รองรับไฟล์นามสกุล ' + extall1 + ' เท่านั้น','error');
			return false;
		}
		return true;
	}
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#confirm-form3').on('submit',function(e) { 
    $.ajax({
        url:'logo_school_save.php',
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

<script>
	function OnUploadlogoSchool()
	{
		var extall2=" jpg , jpeg , png , pdf ";

		file1 = document.form3.logo_school.value;
		ext1 = file1.split('.').pop().toLowerCase();
		if(parseInt(extall2.indexOf(ext1)) < 0)
		{
			Swal.fire('ผิดพลาด!!','รองรับไฟล์นามสกุล ' + extall2 + ' เท่านั้น','error');
			return false;
		}
		return true;
	}
</script>