<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $s1 = "SELECT * FROM team WHERE id = '$id' ";
    $q1 = mysqli_query($conn, $s1);
    $r1 = mysqli_fetch_array($q1);
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">เพิ่มกลุ่มสาระฯ</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">เพิ่มกลุ่มสาระฯ</a></li>
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
                    <h3 class="card-title">เพิ่มกลุ่มสาระฯ</h3>
                </div>
                <div class="card-body">
                <form class="form-horizontal formular" name="form1" id="confirm-form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>กลุ่มสาระฯ :</label>
                                <input type="text" class="form-control" id="group_name" name="group_name" value="<?php echo $r1['group_name']; ?>" placeholder="เช่น กลุ่มสาระ ฯ ภาษาไทย" required>
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
        url:'section_config_edit_save.php',
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