<?php
include_once('system/connect.php');
    $strSQL = "SELECT * FROM pay_setting";
    $pay_query = mysqli_query($conn,$strSQL);
    $pay_record = mysqli_fetch_array($pay_query);

    $wallet_phone = $pay_record['wallet_phone'];
    $bonus = $pay_record['bonus'];
    $pay_bonus = $bonus - 1;
    $pay_50 = number_format($pay_record['pay_50'],0);
    $pay_90 = number_format($pay_record['pay_90'],0);
    $pay_150 = number_format($pay_record['pay_150'],0);
    $pay_300 = number_format($pay_record['pay_300'],0);
    $pay_500 = number_format($pay_record['pay_500'],0);
    $pay_1000 = number_format($pay_record['pay_1000'],0);
    $bonus_50 = $pay_bonus * $pay_record['pay_50'];
    $bonus_90 = $pay_bonus * $pay_record['pay_90'];
    $bonus_150 = $pay_bonus * $pay_record['pay_150'];
    $bonus_300 = $pay_bonus * $pay_record['pay_300'];
    $bonus_500 = $pay_bonus * $pay_record['pay_500'];
    $bonus_1000 = $pay_bonus * $pay_record['pay_1000'];
?>
