<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">ข้อมูลส่วนตัว</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">ข้อมูลส่วนตัว</a></li>
                    <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-3 col-12 offset-md-4">
                <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-user"></i> ข้อมูลส่วนตัว</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <img class='col-sm-12' src='../dist/img/user_boy.png'>
                            </div>
                        </div>
                    </div>
                    <form class="form-horizontal formular" name="form1" id="confirm-form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" id="id" name="id" value="<?php echo $result['id']; ?>">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>ชื่อ</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $result['name']; ?>"> 
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>ชื่อผู้ใช้</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $result['username']; ?>"> 
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>รหัสผ่าน</label>
                                <input type="text" class="form-control" id="passlogin" name="passlogin" value="<?php echo $result['passlogin']; ?>"> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-success btn-block"><i class="fas fa-save"></i> บันทึก</button>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="btn btn-warning btn-block"><i class="fas fa-exclamation"></i> หากข้อมูลไม่ถูกต้องโปรดแจ้งที่สุรเชษฐ์ได้เลย</div>
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
        url:'profile_save.php',
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
            html: 'กรุณาตรวจสอบข้อมูลให้ถูกต้องก่อนทำการบันทึก',
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
                }).then(function(confirm) {
                    window.location = "main.php?page=profile";
                })
            }
            })
        },
        error:function(data){
            Swal.fire("โอ๊ะโอ", "พบข้อผิดพลาดกรุณาตรวจสอบ :(", "error");
        }
        });
        e.preventDefault();
    });
    });
</script>