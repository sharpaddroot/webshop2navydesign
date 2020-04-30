<?php
    session_start();
    include_once('system/connect.php');
    $name = "-1";
    if (isset($_SESSION['u_name'])) {
    $name = $_SESSION['u_name'];
    }else{
      $title = 'กรุณา เข้าสู่ระบบ ก่อนใช้งาน'; $text = 'กำลังพาท่านไป...'; $delay = '3000'; $link = 'login.php';
      msg_error($title,$text,$delay,$link);
    }
    $strSQL = "SELECT * FROM user_profile WHERE u_name =  '".$name."' ";
    $user_query = mysqli_query($conn,$strSQL);
    $user_record = mysqli_fetch_array($user_query);
    include_once('system/logout.php');
?>