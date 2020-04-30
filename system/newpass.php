<?php 
if(isset($_POST['newpass'])){
    if(empty($_POST['pass'])){
        $title = 'เว้น รหัสผ่านเก่า ว่างไม่ได้!'; $text = 'กรุณาป้อนรหัสผ่านเก่า...'; $delay = '3000';
        msg_error($title,$text,$delay);
    }
    elseif(empty($_POST['npass'])){
        $title = 'เว้น รหัสผ่านใหม่ ว่างไม่ได้!'; $text = 'กรุณาป้อนรหัสผ่านใหม่...'; $delay = '3000';
        msg_error($title,$text,$delay);
    }
    elseif(empty($_POST['cpass'])){
        $title = 'กรุณายืนยันรหัสผ่านใหม่!'; $text = 'กรุณาป้อนรหัสผ่านใหม่...'; $delay = '3000';
        msg_error($title,$text,$delay);
    }
    else{

    $cypass = base64_encode($_POST['pass']);
    if($cypass == $user_record['p_word']){

        if($_POST['npass'] == $_POST['cpass']){
            $id_data = $user_record['id'];
            $cynpass = base64_encode($_POST['npass']);
            $sql = "UPDATE user_profile SET  p_word = '".$cynpass."' WHERE id = $id_data";
            $query = mysqli_query($conn,$sql);
            if($query) {
                session_destroy();
                $title = 'เปลี่ยรหัสผ่านสำเร็จ'; $text = 'กำลังบันทึกข้อมูล และ ออกจากระบบ'; $delay = '3000'; $link = 'login.php';
                msg_success($title,$text,$delay,$link);

            }

        }else{
            $title = 'รหัสผ่านใหม่ไม่ตรงกัน!'; $text = 'กรุณาป้อนรหัสผ่านให้ตรงกัน...'; $delay = '3000';
            msg_error($title,$text,$delay);
        }

    }else{
        $title = 'รหัสผ่านเก่าไม่ถูกต้อง!'; $text = 'กรุณาตรวจสอบรหัสผ่านอีกครั้ง...'; $delay = '3000';
        msg_error($title,$text,$delay);
    }
    }
}
?>