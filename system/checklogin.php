<?php 
  session_start();
  if(isset($_POST['user'])){
    include("system/connect.php");
    $username = $_POST['user'];
    $password = base64_encode($_POST['pass']);

    $sql="SELECT * FROM user_profile WHERE  u_name='".$username."' AND  p_word='".$password."' ";
    $result = mysqli_query($conn,$sql);
				
      if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        if($row["u_status"] == 9){
          $title = 'ผู้ใช้นี้ถูกแบน!'; $text = 'กรุณาติดต่อแอดมิน...'; $delay = '3000'; $link = 'login.php';
          msg_error($title,$text,$delay,$link);
        }elseif($row["level"] == 7){

          $cynpass = 1;
          $sql2 = "UPDATE user_profile SET u_status = '".$cynpass."' WHERE u_name = '".$username."'";
          $query = mysqli_query($conn,$sql2);

          $_SESSION["id"] = $row["id"];
          $_SESSION["u_name"] = $row["u_name"];
          $_SESSION["U_SID"] = $row["U_SID"];

          $title = 'เข้าสู่ระบบสำเร็จ'; $text = 'กำลังเชื่อมต่อข้อมูล...'.$username; $delay = '3000'; $link = 'main.php';
          msg_success($title,$text,$delay,$link);
          
        }else{

          if($web_record['web_status'] == 1){

            $cynpass = 1;
            $sql2 = "UPDATE user_profile SET u_status = '".$cynpass."' WHERE u_name = '".$username."'";
            $query = mysqli_query($conn,$sql2);
  
            $_SESSION["id"] = $row["id"];
            $_SESSION["u_name"] = $row["u_name"];
            $_SESSION["U_SID"] = $row["U_SID"];
  
            $title = 'เข้าสู่ระบบสำเร็จ'; $text = 'กำลังเชื่อมต่อข้อมูล...'.$username; $delay = '3000'; $link = 'main.php';
            msg_success($title,$text,$delay,$link);

          }else{

            $title = 'เว็บไซต์ยังไม่เปิดให้บริการ'; $text = 'กรุณาติดต่อแอดมิน...'; $delay = '3000'; $link = 'index.php';
            msg_error($title,$text,$delay,$link);
            
          }

        }
      }else{

        $title = 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง'; $text = 'กรุณาลองใหม่อีกครั้ง...'; $delay = '3000'; $link = 'login.php';
        msg_error($title,$text,$delay,$link);
 
      }
  }
?>