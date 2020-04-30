<?php 
require_once('system/connect.php');
if(isset($_POST['submit']))
{
  if(empty($_POST['username'])){
    $title = 'เว้น Username ว่างไม่ได้!'; $text = 'กรุณากรอก Username!'; $delay = '3000';
    msg_waring($title,$text,$delay);
  }
  if(empty($_POST['pass'])){
    $title = 'เว้น Password ว่างไม่ได้!'; $text = 'กรุณากรอก Password!'; $delay = '3000';
    msg_waring($title,$text,$delay);
  }
  if(empty($_POST['mail'])){
    $title = 'เว้น E-mail ว่างไม่ได้!'; $text = 'กรุณากรอก E-mail!'; $delay = '3000';
    msg_waring($title,$text,$delay);
  }

  $name = $_POST['username'];
  $pass = $_POST['pass'];
  $cpass = $_POST['cpass'];
  $e_mail = $_POST['mail'];

  if($_POST['antibot'] == $_POST['answer']){
      
    if($pass != $cpass){
        $title = 'ยืนยันรหัสผ่าน ไม่ตรงกัน!'; $text = 'กรุณากรอก Password และ Confirm-Password ให้ตรงกัน!'; $delay = '3000';
        msg_error($title,$text,$delay);
    }else{

        $check = "SELECT * FROM user_profile WHERE u_name = '$name'";
        $result = mysqli_query($conn,$check);
        $num = mysqli_num_rows($result); 
        if($num > 0){
            $title = 'Username นี้มีผู้ใช้แล้ว!'; $text = 'กรุณาใช้ Username อื่น!'; $delay = '3000';
            msg_error($title,$text,$delay);
        }else{

            $check = "SELECT * FROM user_profile WHERE e_mail = '$e_mail'";
            $result = mysqli_query($conn,$check);
            $num = mysqli_num_rows($result);
            if($num > 0){
                $title = 'E-mail นี้มีผู้ใช้แล้ว!'; $text = 'กรุณาใช้ E-mail อื่น!'; $delay = '3000';
                msg_error($title,$text,$delay);
            }else{

                $U_SID = base64_encode(md5(base64_encode(md5($name,rand()))));
                $cypass= base64_encode($pass);
                $sql = "INSERT INTO user_profile ( u_name, p_word, e_mail, U_SID) VALUES ('$name','$cypass','$e_mail','$U_SID')";
                $query = mysqli_query($conn,$sql); 
                if($query) {
                    $title = 'ลงทะเบียนเสร็จสิ้น!'; $text = 'ระบบกำลังพาท่านไป'; $link = './login.php';
                    msg_success($title,$text,$link);
                }
            }
        }
    }
  }else{
    $title = 'ANTI BOT ไม่ถูกต้อง'; $text = 'กรุณากรอก ANTI BOT ให้ถูกต้อง!'; $delay = '3000';
    msg_error($title,$text,$delay);
  }
} 
?>