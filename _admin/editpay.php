<h3 class=" m-2 mt-4"><i class="fas fa-coins"></i> <b>จัดการการเติมเงิน</b></h3>
<hr class="border-dark">
<form method="POST">
<table class="table mt-2 text-center border-bottom border-dark">
            <thead class="thead-dark">
                <tr>
                <th scope="col">เติมเงินราคา</th>
                <th scope="col">จะได้รับ Points</th>
                <th scope="col">จะได้รับ BONUS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">ราคา 50 บาท</th>
                <td class="pr-5 pl-5"><input name="pay50" type="number" class="form-control text-center" value="<?= $pay_record['pay_50']; ?>"></td>
                <td class="text-danger">+ <?= $bonus_50; ?></td>
                </tr>
                <tr>
                <th scope="row">ราคา 90 บาท</th>
                <td class="pr-5 pl-5"><input name="pay90" type="number" class="form-control text-center" value="<?= $pay_record['pay_90']; ?>"></td>
                <td class="text-danger">+ <?= $bonus_90; ?></td>
                </tr>
                <tr>
                <th scope="row">ราคา 150 บาท</th>
                <td class="pr-5 pl-5"><input name="pay150" type="number" class="form-control text-center" value="<?= $pay_record['pay_150']; ?>"></td>
                <td class="text-danger">+ <?= $bonus_150; ?></td>
                </tr>
                <tr>
                <th scope="row">ราคา 300 บาท</th>
                <td class="pr-5 pl-5"><input name="pay300" type="number" class="form-control text-center" value="<?= $pay_record['pay_300']; ?>"></td>
                <td class="text-danger">+ <?= $bonus_300; ?></td>
                </tr>
                <tr>
                <th scope="row">ราคา 500 บาท</th>
                <td class="pr-5 pl-5"><input name="pay500" type="number" class="form-control text-center" value="<?= $pay_record['pay_500']; ?>"></td>
                <td class="text-danger">+ <?= $bonus_500; ?></td>
                </tr>
                <tr>
                <th scope="row">ราคา 1,000 บาท</th>
                <td class="pr-5 pl-5"><input name="pay1000" type="number" class="form-control text-center" value="<?= $pay_record['pay_1000']; ?>"></td>
                <td class="text-danger">+ <?= $bonus_1000; ?></td>
                </tr>
            </tbody>
            </table>
<div class="row no-gutters">
<div class="input-group mb-3 col-md-6 pr-md-3">
  <div class="input-group-prepend">
    <span class="input-group-text navy-bg-dark" id="basic-addon1"><i class="fas fa-coins"></i>&nbsp;Bonus การเติมเงิน</span>
  </div>
  <input type="number" name="bonus" class="form-control text-center" placeholder="Bonus การเติมเงิน" value="<?= $bonus; ?>">
</div>

<div class="input-group mb-3 col-md-6">
  <div class="input-group-prepend">
    <span class="input-group-text navy-bg-red" id="basic-addon1"><i class="fas fa-phone"></i>&nbsp;เบอร์Wallet</span>
  </div>
  <input type="text" name="phone" class="form-control text-center" placeholder="เบอร์ Wallet" value="<?= $wallet_phone; ?>" pattern="([0-9]){10,}" maxlength="10" autocomplete="off" required>
</div>
</div>

<button type="submit" name="edit" value="1" class="btn btn-success btn-block">อัพเดทการเติมเงิน</button>
</form>
<?php

if(isset($_POST['edit'])){

    if(empty($_POST['pay50']) OR $_POST['pay50'] < 0){
        $title = 'pay 50 empty!'; $text = 'pay 50 empty...'; $delay = '3000';
        msg_error($title,$text,$delay);
    }elseif(empty($_POST['pay90']) OR $_POST['pay90'] < 0){
        $title = 'pay 90 empty!'; $text = 'pay 90 empty...'; $delay = '3000';
        msg_error($title,$text,$delay);
    }elseif(empty($_POST['pay150']) OR $_POST['pay150'] < 0){
        $title = 'pay 150 empty!'; $text = 'pay 150 empty...'; $delay = '3000';
        msg_error($title,$text,$delay);
    }elseif(empty($_POST['pay300']) OR $_POST['pay300'] < 0){
        $title = 'pay 300 empty!'; $text = 'pay 300 empty...'; $delay = '3000';
        msg_error($title,$text,$delay);
    }elseif(empty($_POST['pay500']) OR $_POST['pay500'] < 0){
        $title = 'pay 500 empty!'; $text = 'pay 500 empty...'; $delay = '3000';
        msg_error($title,$text,$delay);
    }elseif(empty($_POST['pay1000']) OR $_POST['pay1000'] < 0){
        $title = 'pay 1000 empty!'; $text = 'pay 1000 empty...'; $delay = '3000';
        msg_error($title,$text,$delay);
    }elseif(empty($_POST['bonus']) OR $_POST['bonus'] < 1){
        $title = 'bonus empty!'; $text = 'bonus empty...'; $delay = '3000';
        msg_error($title,$text,$delay);
    }elseif(empty($_POST['phone'])){
        $title = 'wallet phone empty!'; $text = 'wallet phone empty...'; $delay = '3000';
        msg_error($title,$text,$delay);
    }elseif(strlen($_POST['phone']) > 10 OR strlen($_POST['phone']) < 10){
        $title = 'wallet phone error!'; $text = 'wallet phone error...'; $delay = '3000';
        msg_error($title,$text,$delay);
    }else{

        $pay50 = $_POST['pay50'];
        $pay90 = $_POST['pay90'];
        $pay150 = $_POST['pay150'];
        $pay300 = $_POST['pay300'];
        $pay500 = $_POST['pay500'];
        $pay1000 = $_POST['pay1000'];
        $bonus = $_POST['bonus'];
        $phone = $_POST['phone'];

        $sqlpay = "UPDATE pay_setting SET wallet_phone = '".$phone."' , bonus = '".$bonus."' , pay_50 = '".$pay50."' , pay_90 = '".$pay90."' , pay_150 = '".$pay150."' , pay_300 = '".$pay300."' , pay_500 = '".$pay500."' , pay_1000 = '".$pay1000."' WHERE id = 1";
        $query_item = mysqli_query($conn,$sqlpay);

        $title = 'อัพเดทการเติมเงินเสร็จสิ้น'; $text = 'กำลังอัพเดทการเติมเงิน...'; $delay = '3000'; $link = 'main.php?page=pay';
        msg_success($title,$text,$delay,$link);


    }
}

?>