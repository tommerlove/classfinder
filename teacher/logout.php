<?php
	session_start();
	unset ( $_SESSION ['session_id']);
	session_destroy();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
	//echo "<script language=javascript>alert('ออกจากระบบเรียบร้อยแล้ว');</script>";
	echo "<script>window.location=\"../index.php\"</script>";
?>
