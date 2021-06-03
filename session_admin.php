<?php
session_start();
$session_id = $_SESSION["session_id"];
	if ($session_id == "") {
		echo "<script language=javascript>alert('กรุณาเข้าสู่ระบบ');</script>";
		echo "<script> window.location = 'index.php' </script>";
		exit ();
}
?>