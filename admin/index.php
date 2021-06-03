<?php
include("../connect.php");
    $s2 = "SELECT * FROM data_logo_login WHERE id = '1' ";
    $q2 = mysqli_query($conn, $s2);
    $r2 = mysqli_fetch_array($q2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ค้นหาห้องเรียนออนไลน์ | ผู้ดูแลระบบ</title>
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="icon" href="../dist/img/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
    <style type="text/css">
        .thfont{
            font-family: 'Sarabun', serif;
            }
	</style>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="thfont">
        
                <div class="card card-outline card-primary">
                    <div class="card-header text-center">
                        <a href="../index.php" class="h1"><img src="../dist/img/<?php echo $r2['logo_school']; ?>" width="50%"></a>
                    </div>
                    <div class="card-body">
                        <p class="login-box-msg"><font color="blue">ระบบหลังบ้าน</font></p>

                        <form role="form" method="POST" action="reg_check.php">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="username" name="username" placeholder="ชื่อผู้ใช้">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="รหัสผ่าน">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <a href="../index.php" class="btn btn-warning btn-block"><i class="fas fa-undo-alt"></i> กลับหน้าเว็บ</a>
                    </div>
                </div>
                
        </div>
    </div>

<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/adminlte.js"></script>
<script src="../plugins/inputmask/jquery.inputmask.min.js"></script>
<script type="text/javascript">
$(function () {
    $('[data-mask]').inputmask()
});
</script> 
</body>
</html>
