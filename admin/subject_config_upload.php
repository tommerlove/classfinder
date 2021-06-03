<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">นำเข้าวิชา</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">นำเข้าวิชา</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">

        <div class="col-lg-6 col-12 offset-md-3">
                <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">นำเข้าวิชา</h3>
                </div>
                <div class="card-body">
                
                    <form class="form-horizontal formular" name="form1" id="confirm-form" method="post" enctype="multipart/form-data">
                        <div class="form-group">

                            <div class="col-sm-12">
                                <div class="form-group">
                                <label>นำเข้าวิชา <font color="red">**</font></label>
                                    <div class="custom-file">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                                        <input type="file" class="custom-file-input" id="filesubject" name="filesubject" />
                                        <label class="custom-file-label" for="filesubject">นำเข้าผู้ใช้</label>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>

                            <div class="col-sm-10">
                                <button type="submit" onclick="return (OnUploadXMLFile())" class="btn btn-success"><i class="fas fa-upload"></i> อัพโหลดข้อมูล</button>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>

                            <div class="col-sm-10">
                                <a href="data_import.xml" download="data_import" class="btn btn-primary"><i class="fas fa-download"></i> ตัวอย่างไฟล์</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

<script src="../dist/js/jquery_1_8_3_DropDownList.min.js"></script>
<script>
	function OnUploadXMLFile()
	{
		var extall1=" xml ";

		file = document.form1.file.value;
		ext = file.split('.').pop().toLowerCase();
		if(parseInt(extall1.indexOf(ext)) < 0)
		{
			Swal.fire('ผิดพลาด!!','นำเข้าผู้ใช้รองรับไฟล์นามสกุล ' + extall1 + ' เท่านั้น','error');
			return false;
		}
		return true;
	}
</script>


<script type="text/javascript">
$(document).ready(function(){
    $('#confirm-form').on('submit',function(e) { 
    $.ajax({
        url:'subject_config_upload_save.php',
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
            html: 'กรุณาตรวจข้อมูลให้ถูกต้อง ก่อนทำการอัพโหลด',
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