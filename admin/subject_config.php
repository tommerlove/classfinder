<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">จัดการวิชา</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">จัดการวิชา</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">

        <div class="col-lg-12 col-12">
                <div class="card card-orange">
                <div class="card-header">
                    <h3 class="card-title">รายชื่อวิชาทั้งหมด</h3>
                </div>
                <div class="card-body">
                    <table class="table" id="example1">
                        <thead>
                            <tr>
                                <th><div align="center">กลุ่มสาระฯ</div></th>
                                <th><div align="center">รหัสวิชา</div></th>
                                <th><div align="center">ชื่อวิชา</div></th>
                                <th><div align="center">ระดับชั้น</div></th>
                                <th><div align="center"></div></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $s1 = "SELECT * FROM course";
                                $q1 = mysqli_query($conn,$s1);
                                while($r1 = mysqli_fetch_array($q1)){
                                    $s2 = "SELECT * FROM team WHERE id = '".$r1['section']."' ";
                                    $q2 = mysqli_query($conn, $s2);
                                    $r2 = mysqli_fetch_array($q2);
                            ?>
                            <tr>
                                <td><div align="center"><?php echo $r2['group_name']; ?></div></td>
                                <td><div align="center"><?php echo $r1['code']; ?></div></td>
                                <td><div align="left"><?php echo $r1['course'] ?></div></td>
                                <td><div align="center"><?php echo $r1['class'] ?></div></td>
                                <td>
                                    <div align="center">
                                        <a href="main.php?page=subject_config_edit&id=<?php echo $r1['id']; ?>" target="blank" class="btn btn-outline-info"><i class="fas fa-edit"></i> แก้ไข</a>
                                        <a  data-id="<?php echo $r1['id']; ?>" id="delete_id" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> ลบ</a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
                <div class="card-footer">
                    <a href="main.php?page=subject_config_create" target="blank" class="btn btn-outline-success"><i class="fas fa-user-plus"></i> เพิ่ม</a> 
                    <a href="main.php?page=subject_config_upload" target="blank" class="btn btn-outline-warning"><i class="fas fa-users"></i> เพิ่มหลายวิชา</a>           
                </div>
            </div>

        </div>
    </div>
</section>

<script src="../dist/js/jquery_1_8_3_DropDownList.min.js"></script>
<script>
       $(document).ready(function() {
            $(document).on('click', '#delete_id', function(e) {
                var id = $(this).data('id');
                SwalDelete(id);
                e.preventDefault();
            });
        });

        function SwalDelete(id) {
            $.ajax({
                url: 'subject_config_delete.php',
                type: 'POST',
                data: 'id=' + id,
                dataType: 'json',
                cache: false,
                processData:false,
                success:function(data){
                    console.log(data);
                    Swal.fire({
                        title: 'โปรดทราบ!!',
                        html: 'คุณแน่ใจหรือไม่ที่จะลบวิชานี้?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'ยืนยัน',
                        cancelButtonText: 'ยกเลิก'
                        }).then((result) => {
                        if (result.value) {
                            Swal.fire({
                            title: 'ลบสำเร็จ!!',
                            html: 'วิชาถูกลบแล้ว',
                            icon: 'success'
                            }).then(function(confirm) { //ถ้าใช้ตัวล่างคือรอ delay
                                window.location = "main.php?page=subject";
                            })
                        }
                        })
                    },
                    error:function(data){
                        //Error Message == 'Title', 'Message body', Last one leave as it is
                        Swal.fire("โอ๊ะโอ", "พบข้อผิดพลาดกรุณาตรวจสอบอีกครั้ง :(", "error");
                }
            });
        }
</script>