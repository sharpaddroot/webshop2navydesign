<?php include_once('system/checklogin.php');include("system/connect.php"); ?>

<?php include("system/head.php") ?>
<style>
    body{height: 100vh;}
    .img-bg{background:url(./assets/img/<?= $web_record['login_banner']; ?>) no-repeat center center;}
</style>

</head>
<body>
<div class="container h-100 d-flex justify-content-center">
    <div class="card mb-3 my-auto navy-zoomin" style="width:800px;max-width: 800px;">
        <div class="row no-gutters">
          <div class="col-md-5 border-right border-dark">
            <img src="./assets/img/none.png" class="card-img h-100 img-bg">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <h5 class="card-title text-center"><b>เข้าสู่ระบบ <?= $web_record['web_name']; ?></b></h5>
              <div class="card-text pt-3">

              <form ACTION="login.php" name="loginform" method="POST">
                <span>Username / ID</span>
                <div class="input-group input-group-md flex-nowrap mb-3">
                    <input type="text" name="user" class="form-control navy-input-text" placeholder="ชื่อผู้ใช้งาน" pattern="[a-zA-Z0-9].{5,16}" maxlength="16" required>
                </div>

                <span>Password</span>
                <div class="input-group input-group-md flex-nowrap mb-3">
                    <input type="password" name="pass" class="form-control navy-input-text" placeholder="รหัสผ่าน" pattern="[a-zA-Z0-9].{5,16}" maxlength="16" required>
                </div>

                <div class="w-100">
                    <button type="submit" name="submit" class="btn btn-success mb-3" style="width: 100%;">เข้าสู่ระบบ</button>
                    <a href="regis.php"><button type="button" class="btn btn-danger mb-3" style="width: 49%;">สมัครสมาชิก</button></a>
                    <button type="button" onclick="setpass()" class="btn btn-secondary mb-3" style="width: 49%; opacity: 60%;">ลืมรหัสผ่าน</button>
                </div>
             </form>

              <p class="card-text text-right mb-3"><small class="text-muted pr-3"><i class="fas fa-cogs"></i> System Last Update : 20/03/2020 21:11</small></p>
            </div>
          </div>
        </div>
      </div>
</div>
<script>
    function setpass(){
        swal("ขออภัยในความไม่สะดวก!", "ระบบนี้ยังไม่เปิดให้ใช้งานครับ", "warning");
    }
</script>
</body>
</html>