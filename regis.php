<?php 
    $code = rand(10000,99999);
    include_once('system/register.php');
?>
<?php include("system/head.php") ?>
<style>
    html{height: 100%;}
    body{height: 100%;}
    .img-bg{background:url(./assets/img/<?= $web_record['regis_banner']; ?>) no-repeat center center;width:100%;}
</style>

</head>
<body>
<div class="container h-100 d-flex justify-content-center">
    <div class="card mb-3 my-auto navy-zoomin" style="width:1000px;max-width: 1000px;">
        <div class="row no-gutters">
          <div class="col-md-5 border-right border-dark">
            <img src="./assets/img/none.png" class="card-img h-100 img-bg">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <h5 class="card-title text-center"><b>สมัครสมาชิก <?= $web_record['web_name']; ?></b></h5>
              <div class="card-text pt-3">

                <form ACTION="regis.php" name="regisform" method="POST">
                  <span>Username / ID <font class="nav-navy-eng">ตัวอักษร A-Z,0-9 (6-16 ตัวขึ้นไป)</font></span>
                  <div class="input-group input-group-md flex-nowrap mb-3">
                      <input type="text" name="username" class="form-control navy-input-text" placeholder="ชื่อผู้ใช้งาน" pattern="[a-zA-Z0-9].{5,16}" maxlength="16" autocomplete="off" required title="ต้องเป็นตัวอักษร Aa-Za หรือ 0-9 และมีความยาว 6-16 ตัวอักษร"/>
                  </div>

                  <span>Password <font class="nav-navy-eng">ตัวอักษร A-Z,0-9 (6-16 ตัวขึ้นไป)</font></span>
                  <div class="input-group input-group-md flex-nowrap mb-3">
                      <input type="password" name="pass" class="form-control navy-input-text" placeholder="รหัสผ่าน" pattern="[a-zA-Z0-9].{5,16}" maxlength="16" autocomplete="off" required title="ต้องเป็นตัวอักษร Aa-Za หรือ 0-9 และมีความยาว 6-16 ตัวอักษร"/>
                  </div>
                  
                  <span>Confirm-Password <font class="nav-navy-eng">กรอกให้ตรงกับรหัสผ่านด้านบน</font></span>
                  <div class="input-group input-group-md flex-nowrap mb-3">
                      <input type="password" name="cpass" class="form-control navy-input-text" placeholder="ยืนยัน-รหัสผ่าน" maxlength="16" required />
                  </div>

                  <span>E-mail <font class="nav-navy-eng">ตัวอย่าง : example@example.com</font></span>
                  <div class="input-group input-group-md flex-nowrap mb-1">
                      <input type="email" name="mail" class="form-control navy-input-text" placeholder="อีเมล" required />
                  </div>
                  <span class="nav-navy-eng navy-text-red"><i class="fas fa-info-circle"></i> หมายเหตุ : E-mail ใช้ในการเปลี่ยนรหัสผ่านกรุณาใช้ E-mail จริง !<br></span>
                  <div class="mt-2"></div>

                  <span>ANTI BOT <font class="nav-navy-eng">กรอกตัวเลขด้านซ้ายเพื่อยืนยันว่าไม่ใช่ AI</font></span>
                  <div class="input-group input-group-md flex-nowrap mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><?= $code; ?></span>
                  </div>
                  <input type="hidden" name="answer" value="<?= $code; ?>" />
                  <input type="text" name="antibot" class="form-control navy-input-text" placeholder="กรอกตัวเลขด้านซ้าย" pattern="([0-9]){5,}" maxlength="5" autocomplete="off" required />
                  </div>

                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck" required />
                      <label class="form-check-label" for="gridCheck">
                          ยอมรับข้อตกลงในการสมัครสมาชิก?
                      </label>
                      <span class="navy-text-blue" data-toggle="modal" data-target="#exampleModalCenter" style="cursor: pointer;"><u>คลิ๊กเพื่อดูข้อตกลง</u></span>
                  </div>

                  <div class="mt-4 mb-3">
                      <button type="submit" name="submit" value="click" class="btn btn-success" style="width:48%;margin-right:8px;">สมัครสมาชิก</button>
                      <a href="index.php"><button type="button" class="btn btn-danger" style="width:48%;">ยกเลิก</button></a>
                  </div>
          </form>

              <p class="card-text text-right mb-0 "><small class="text-muted pr-3"><i class="fas fa-cogs"></i> NAVy ANTICODE System : Enable</small></p>
            </div>
          </div>
        </div>
      </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content navy-shadow-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">ข้อตกลงในการสมัครสมาชิก</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0">
        <img src="assets/img/<?= $web_record['promote_banner']; ?>" class="card-img">
        <div class="p-3">
            1.ทีมงานมีสิทธิทุกอย่างในการ ปรับปรุง แก้ไข รีเซ็ทต่างๆ โดยไม่ต้องบอกล่วงหน้า</p>
            2.ห้ามใช้บอท,โปรแกรม ในการช่วยเล่นต่างๆหากพบเจอแบนทันที</p>
            4.หากพบความผิดปกติของเซิฟกรุณาแจ้งทีมงานทันที</p>
            5.ห้ามใช้บัคในการแสวงหาผลประโยชน์ หากพบเจอ แบนทันที</p>
            6.ทางทีมงานจะไม่รับผิดชอบในกรณีไอเท็มหาย ไม่ว่าจะเกิดจากระบบ หรือ เกิดจาก ผู้เล่นเอง</p>
            7.ทางทีมงานจะไม่รับแจ้งปัญหา ถูกแฮค หรือ ถูกโกงเพราะถือว่าเป็นความผิดพลาดจากตัวผู้เล่นเอง</p>
            8.ห้ามกระทำการแอบอ้างว่าเป็นทีมงาน</p>
        <span class="navy-card-date text-right float-right"><i class="fas fa-history"></i> อัพเดทข้อตกลงเมื่อ : 02/02/2020 01:59</span>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function(){
          $("#myModal").modal('show');
      });
      $(document).ready(function regispass(){$("#regis").modal('show');});
</script>
<script src="assets/js/anticode.js"></script>
</body>
</html>