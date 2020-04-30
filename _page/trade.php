<h3 class=" m-2 mt-4"><i class="fas fa-gift"></i> <b>โอนเงินให้เพื่อน</b></h3>
<hr class="border-dark">
<a href=""><img src="assets/img/<?= $web_record['promote_banner']; ?>" class="card-img"></a>
<form class="w-100" method="POST">

            <div class="input-group flex-nowrap mt-3">
            <div class="input-group-prepend">
                <span class="input-group-text navy-bg-red"><i class="fas fa-user"></i>&nbsp;กรอก SID ของเพื่อน</span>
            </div>
                <input type="text" name="u_sid" class="form-control" placeholder="กรุณากรอก SID ของเพื่อน" required>
            </div>

            <div class="input-group flex-nowrap mt-3">
            <div class="input-group-prepend">
                <span class="input-group-text navy-bg-dark"><i class="fas fa-star"></i>&nbsp;จำนวนที่ต้องการโอน</span>
            </div>
                <input type="number" name="trade_in" class="form-control" placeholder="กรุณากรอกจำนวนแต้มที่ต้องการโอน" pattern="[0-9]+" title="ต้องเป็นตัวเลข 0 - 9 เท่านั้น !" required>
            </div>
            <div class="input-group flex-nowrap mt-3">
            <div class="input-group-prepend">
                <span class="input-group-text navy-bg-dark"><i class="fas fa-bars"></i>&nbsp;ประเภทการโอน</span>
            </div>
                <select name="trade_type" class="custom-select" required>
                    <option value="1" selected>โอน POINTS</option>
                    <option value="2">โอน แต้มสะสม</option>
                </select>
            </div>
            <button type="submit" class="btn btn-outline-dark mt-3 w-100">ทำการโอนให้เพื่อน</button>
</form>
            <div class="alert alert-danger mt-1 w-100" role="alert">
                <i class="fas fa-info-circle"></i> <b>ข้อควรระวัง</b> : ต่อ 1 การโอนบวกเพิ่ม 5 จากจำนวนที่โอน</b>
            </div>
            <div class="alert alert-warning mt-1 w-100" role="alert">
                <i class="fas fa-info-circle"></i> <b>หมายเหตุ</b> : ถ้าการโอนมีปัญหาหรือการโอนไม่สำเร็จ <b><u>ให้ติดต่อทีมงานทางเพจ !</u></b>
            </div>

            <h5 class="mt-3"><b>วิธีการโอนแต้มสะสมให้เพื่อน</b></h5>
            <hr class="border-dark">
            1. กรอก SID ของเพื่อนที่ด้านบน</br>
            2. กรอกจำนวนแต้มที่ต้องการโอน <b class="text-danger"><u>บวกเพิ่ม 5 จากจำนวนที่โอน</u></b> </br>
            3. กดทำการโอนเป็นอันเสร็จ</br>
<?php include_once('system/trade.php'); ?>