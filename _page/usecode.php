<h3 class=" m-2 mt-4"><i class="fas fa-qrcode"></i> <b>เติมโค๊ดสะสมแต้ม</b></h3>
<hr class="border-dark">
<a href=""><img src="assets/img/<?= $web_record['promote_banner']; ?>" class="card-img"></a>
<form class="w-100" method="POST">
            <div class="input-group flex-nowrap mt-3">
            <div class="input-group-prepend">
                <span class="input-group-text navy-bg-dark"><i class="fas fa-qrcode"></i>&nbsp;กรอกโค๊ดที่ได้รับ</span>
            </div>
                <input type="text" name="code" class="form-control" placeholder="กรุณากรอกโค๊ดที่ได้รับ" autocomplete="off" required>
            </div>
            <button type="submit" class="btn btn-outline-dark mt-3 w-100">ทำการเติมโค๊ดกิจกรรม</button>
</form>
            <div class="alert alert-success mt-1 w-100" role="alert">
                <i class="fas fa-info-circle"></i> <b>หมายเหตุ</b> : กรณีถ้าโค๊ดมีปัญหาหรือการเติมโค๊ดไม่สำเร็จ <b><u>ให้ติดต่อทีมงานทางเพจ !</u></b>
            </div>

            <h5 class="mt-3"><b>วิธีการเติมโค๊ดสะสมแต้ม</b></h5>
            <hr class="border-dark">
            1. สามารถรับโค๊ดได้จากกิจกรรมต่างๆที่จัดขึ้น</br>
            2. นำโค๊ดที่ได้มากรอกในช่องเติมโค๊ดด้านบน</br>
            3. กดทำการเติมโค๊ดเป็นอันเสร็จ <b class="text-danger"><u>หมายเหตุ : โค๊ดสามารถใช้ได้ 1 ครั้งเท่านั้น!</u></b></br>
<?php include_once('system/usecode.php') ?>