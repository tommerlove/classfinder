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
                <input type="hidden" id="regid" name="regid" value="<?php echo $regid; ?>">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>วิชา :</label>
                                <select class="form-control select2" style="width: 100%;" id="subject_id" name="subject_id">
                                <option selected="">คุณยังไม่เลือกวิชา</option>
                                <?php
                                    $strSQL = "SELECT * FROM course WHERE section = '$sec'";
                                    $objQuery = mysqli_query($conn, $strSQL);
                                    while ($objResult = mysqli_fetch_array($objQuery)) {
                                ?>
                                <option value="<?php echo $objResult['id']; ?>"><?php echo $objResult['code'].' '.$objResult['course']; ?></option>
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
                                ?>
                                <option value="<?php echo $result["id"]; ?>" <?php echo $sel;?>><?php echo $result["class_name"];?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label>ห้อง</label>
                                <select class="form-control" id="room" name="room" required>
                                <option value="">เลือกห้องเรียน</option>
                                <?php
                                    $sql = "SELECT * FROM room";
                                    $query = mysqli_query($conn, $sql);
                                    while($result = mysqli_fetch_array($query)){
                                ?>
                                <option value="<?php echo $result["id"]; ?>" <?php echo $sel;?>><?php echo $result["room_name"];?></option>
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

        <?php
            $s1 = "SELECT * FROM subject WHERE regid = '$regid' " ;
            $q1 = mysqli_query($conn, $s1);
            $r1 = mysqli_fetch_array($q1);
            $empCid = $r1['regid'];
            
            if($regid == $empCid){
        ?>
        <div class="row">

        <div class="col-md-12">
                <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">ข้อมูลวิชาที่สอน</h3>
                </div>
                <div class="card-body">
                    <?php
                        $s2 = "SELECT * FROM subject WHERE regid = '$regid' ";
                        $q2 = mysqli_query($conn, $s2);
                    ?>
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><center>รหัสวิชา</center></th>
                                <th><center>ชื่อวิชา</center></th>
                                <th><center>ชั้น</center></th>
                                <th><center>Facebook</center></th>
                                <th><center>Line</center></th>
                                <th><center>Google Classroom</center></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                while($r2 = mysqli_fetch_array($q2)){
                            ?>
                            <tr>
                                <td>
                                <center>
                                    <?php 
                                        $s3 = "SELECT * FROM course WHERE id = '".$r2['subject_id']."' ";
                                        $q3 = mysqli_query($conn, $s3);
                                        $r3 = mysqli_fetch_array($q3);

                                        echo $r3['code'];
                                    ?>
                                </center>
                                </td>
                                <td><?php echo $r3['course']; ?></td>
                                <td><center><?php echo $r2['class'].'/'.$r2['room']; ?></center></td>
                                <td>
                                    <?php if($r2['fb'] != ''){ ?>
                                        <center><a href="<?php echo $r2['fb']; ?>" target="blank" class="btn btn-outline-primary"><i class="fas fa-eye"></i> คลิก</a></center>
                                    <?php } else { ?>
                                        <center><a class="btn btn-outline-secondary"><i class="fas fa-eye"></i> คลิก</a></center>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if($r2['line'] != ''){ ?>
                                        <center><a href="<?php echo $r2['line']; ?>" target="blank" class="btn btn-outline-success"><i class="fas fa-eye"></i> คลิก</a></center>
                                    <?php } else { ?>
                                        <center><a class="btn btn-outline-secondary"><i class="fas fa-eye"></i> คลิก</a></center>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if($r2['gg'] != ''){ ?>
                                        <center><a href="<?php echo $r2['gg']; ?>" target="blank" class="btn btn-outline-warning"><i class="fas fa-eye"></i> คลิก</a></center>
                                    <?php } else { ?>
                                        <center><a class="btn btn-outline-secondary"><i class="fas fa-eye"></i> คลิก</a></center>
                                    <?php } ?>
                                </td>
                                <td>
                                    <center>
                                        <a href="main.php?page=subject_edit&id=<?php echo $r2['id']; ?>" target="blank" class="btn btn-outline-info"><i class="fas fa-edit"></i> แก้ไข</a>
                                        <a  data-id="<?php echo $r2['id']; ?>" id="delete_id" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> ลบ</a>
                                    </center>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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
        url:'subject_save.php', //===PHP file name====register_save1.php
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
                url: 'subject_delete.php',
                type: 'POST',
                data: 'id=' + id,
                dataType: 'json',
                cache: false,
                processData:false,
                success:function(data){
                    console.log(data);
                    Swal.fire({
                        title: 'โปรดทราบ!!',
                        html: 'คุณแน่ใจหรือไม่ที่จะลบข้อมูลนี้?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'ยืนยัน',
                        cancelButtonText: 'ยกเลิก'
                        }).then((result) => {
                        if (result.value) {
                            Swal.fire({
                            title: 'ลบสำเร็จ!!',
                            html: 'ข้อมูลของคุณถูกลบแล้ว',
                            icon: 'success'
                            }).then(function(confirm) { //ถ้าใช้ตัวล่างคือรอ delay
                                window.location = "main.php?page=subject";
                            })
                        }
                        })
                    },
                    error:function(data){
                        Swal.fire("โอ๊ะโอ", "พบข้อผิดพลาดกรุณาตรวจสอบอีกครั้ง :(", "error");
                }
            });
        }
</script>