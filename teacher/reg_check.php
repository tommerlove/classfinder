<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบแจ้งช่องทางติดต่อครู นักเรียน</title>
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <script src="../plugins/sweetalert/sweetalert2@10.js"></script>
    <script src="../plugins/sweetalert/sweetalert2.min.js"></script>
    <link rel="../plugins/sweetalert/stylesheet" href="sweetalert2.min.css">
<body>
    <?php
    session_start();
    include '../connect.php';

    $regid_login = str_replace("-","",$_POST['regid']);

    $token = ""; //token ไว้แจ้งเตือนเวลาคนเข้าสู่ระบบ
    define('LINE_API',"https://notify-api.line.me/api/notify");
    define('LINE_TOKEN',"$token");

    $ldate = date("d/m/Y");
    $ltime = date("H:i:s");
    $ipadd = $_SERVER["REMOTE_ADDR"]; //ตรวจสอบ ip

    $sql = "SELECT * FROM teacher WHERE regid = '$regid_login' ";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
    $id = $result['id'];
    $regid = $result['regid'];
    $tname = $result['name'];
    $class = $result['class'];
    $room = $result['room'];

    if (!$result) {
        echo    "<script language=javascript>
                    Swal.fire({
                    title: 'ไม่ถูกต้อง!',
                    html: 'กรุณากรอกเลขบัตรประชาชนให้ถูกต้อง<br>หากไม่แน่ใจให้ติดต่อครูคอมพิวเตอร์ได้ทุกคน',
                    icon: 'error'
                    }).then(function(confirm) { //ถ้าใช้ตัวล่างคือรอ delay
                        window.location = 'index.php';
                    })
                </script>";
    }
    if ($regid_login == $regid) {
        $_SESSION['session_id'] = $result['id'];
        echo    "<script language=javascript>
                    Swal.fire({
                    title: 'ถูกต้อง',
                    html: 'กำลังพาไปยังหน้าต่างของโปรแกรม',
                    icon: 'success'
                    }).then(function(confirm) { //ถ้าใช้ตัวล่างคือรอ delay
                        window.location = 'main.php?userid=$id';
                    })
                </script>";
    } else {
        echo    "<script language=javascript>
                    Swal.fire({
                    title: 'ไม่ถูกต้อง!',
                    html: 'กรุณากรอกเลขบัตรประชาชนให้ถูกต้อง<br>หากไม่แน่ใจกรุณาแจ้งที่แฟนเพจ Facebook ของโรงเรียน',
                    icon: 'error'
                    }).then(function(confirm) { //ถ้าใช้ตัวล่างคือรอ delay
                        window.location = 'index.php';
                    })
                </script>";
    }

    $datasend = "รายงานการเข้าสู่ระบบ\nชื่อ $name เข้าสู่ระบบ \nจากหมายเลข IP : $ipadd";
    $res = notify_message($datasend,$token);

    function notify_message($message){

        $queryData = array('message' => $message);
        $queryData = http_build_query($queryData,'','&');
        $headerOptions = array(
            'http'=>array(
                'method'=>'POST',
                'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                        ."Authorization: Bearer ".LINE_TOKEN."\r\n"
                        ."Content-Length: ".strlen($queryData)."\r\n",
                'content' => $queryData
            )
        );
        $context = stream_context_create($headerOptions);
        $result = file_get_contents(LINE_API,FALSE,$context);
        $res = json_decode($result);
        return $res;
    }
?>
</body>
</html>