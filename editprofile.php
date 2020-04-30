<?php 
  include("system/head.php");
  include("system/user_record.php");
 ?>
<style>
    html{height: 100%;}
    body{ font-family: Kanit;margin: 0;padding:0;cursor: default;background-color:#333;height: 90%;}
</style>

</head>
<body>
<?php 
if($user_record['level'] == 7){
    include('system/nav_admin.php'); 
}else{
    include('system/nav.php'); 
}
?>
<div class="container h-100 d-flex justify-content-center mt-5">
    <div class="card my-auto navy-shadow-dark"style="width:800px;max-width: 800px;border:0;animation: zoomIn 0.75s;">
    <div class="row no-gutters">
      <div class="col-md-6 card-body text-center">
          <img src="assets/img/none.png" class="card-img-top navy-img-profile" style="background:url(assets/img/user_img/<?php if(empty($user_record['user_img'])){echo 'none.jpg';}else{echo $user_record['user_img'];}?>) no-repeat center center;background-size: cover;">
          <h5 class="card-title mt-4"><b>ยินดีต้อนรับคุณ <?php if(empty($user_record['u_name'])){echo '';}else{echo $user_record['u_name'];} ?></b></h5>
          <div class="card-text">
          
          <form method="POST" enctype="multipart/form-data">
            <div class="col-12 input-group input-group-sm pl-3 pr-3 pb-2">
                <div class="custom-file">
                        <input type="file" id="image_img" name="image_img" accept=".jpg,.png" required/>
                        <label class="custom-file-label" for="image_img">เลือกรูปที่ต้องการ</label>
                </div>
            </div>
            <div class="pl-3 pr-3 pb-2"><button type="submit" name="pimg" value="pimg" class="btn btn-sm btn-outline-success w-100">เปลี่ยนรูปโปรไฟล์</button></div>
            <input type="hidden" name="imgname" value="<?= $user_record['user_img']; ?>">
          </form>

          <form action="editprofile.php" method="POST">
            <div class="pl-3 pr-3"><button type="submit" name="submit" value="logout" class="btn btn-sm btn-outline-danger w-100">ออกจากระบบ</button></div>
          </form>
          </div>
      </div>

      <div class="col-md-6  p-0 card-body text-white">
          <div class="card-text text-dark">
          <div class="row no-gutters">
            <div class="col-md-12 pl-3 pr-3 pb-3 pt-3">
                <table class="w-100 border border-dark">
                    <tr><td>&nbsp</td><td></td></tr>
                    <tr>
                        <td class="text-right">ชื่อผู้ใช้งาน :</td>
                        <td class="pl-1"><?php if(empty($user_record['u_name'])){echo '';}else{echo $user_record['u_name'];} ?></td>
                    </tr>
                    <tr>
                        <td class="text-right">POINT :</td>
                        <td class="pl-1"><?php echo number_format($user_record['point'],2); ?> POINTS</td>
                    </tr>
                    <tr>
                        <td class="text-right">แต้มสะสม :</td>
                        <td class="pl-1"><?php echo number_format($user_record['reward']); ?> แต้ม</td>
                    </tr>
                    <tr>
                        <td class="text-right">อีเมล :</td>
                        <td class="pl-1"><?php echo $user_record['e_mail']; ?></td>
                    </tr>
                    <tr><td>&nbsp</td><td></td></tr>
                </table>
            </div>
            <div class="col-md-12 ">

                <span class="text-dark pt-3 pl-3 pr-3 text-left">เปลี่ยนรหัสผ่าน</span>
                <form action="editprofile.php" method="POST">
                    <div class="input-group input-group-sm pt-1 pl-3 pr-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text navy-bg-dark">รหัสผ่านเก่า</span>
                    </div>
                        <input type="password" name="pass" class="form-control" placeholder="กรุณาป้อนรหัสผ่านเก่า" pattern="[a-zA-Z0-9].{5,16}" maxlength="16" autocomplete="off" required>
                    </div>

                    <div class="input-group input-group-sm pl-3 pr-3 pt-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text navy-bg-red">รหัสผ่านใหม่</span>
                    </div>
                        <input type="password" name="npass" class="form-control" placeholder="กรุณาป้อนรหัสผ่านใหม่" pattern="[a-zA-Z0-9].{5,16}" maxlength="16" autocomplete="off" required>
                    </div>

                    <div class="input-group input-group-sm pl-3 pr-3 pt-2 pb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text navy-bg-red">ยืนยัน-รหัสผ่านใหม่</span>
                    </div>
                        <input type="password" name="cpass" class="form-control" placeholder="กรุณาป้อนรหัสผ่านใหม่ อีกครั้ง" pattern="[a-zA-Z0-9].{5,16}" maxlength="16" autocomplete="off" required>
                    </div>
                    <div class="pl-3 pr-3 pb-3"><button type="submit" name="newpass" value="newpass" class="btn btn-sm btn-outline-success w-100">บันทึกรหัสผ่านใหม่</button></div>
                </form>

            </div>
          </div>
          </div>

      </div>

    </div>
    <div class="alert alert-danger m-3" role="alert">
        <i class="fas fa-info-circle"></i> หมายเหตุ : ถ้ามีปัญหาในการตั้งค่าบัญชีโปรด <a href="https://www.facebook.com/<?= $web_record['fp_facebook']; ?>/" class="alert-link" target="_blank">ติดต่อแอดมิน</a>
    </div>
    </div>
</div>
<script type="text/javascript">
$(function(){
 
    $("#image_img").on("change",function(){
        var _fileName = $(this).val();
        $(this).next("label").text(_fileName);
    });
 
});
</script>
<?php 
include("system/newpass.php");
include("system/uploadprofile.php"); 
?>

</body>
</html>