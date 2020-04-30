<?php
if(isset($_POST['code'])){
    if(empty($_POST['code'])){
        $title = 'กรุณากรอกโค๊ด!'; $text = 'กรอกโค๊ดเว้นว่างไม่ได้...'; $delay = '3000'; $link = 'main.php?page=usecode';
        msg_error($title,$text,$delay,$link);
    }elseif(strlen($_POST['code']) > 32 OR strlen($_POST['code']) < 32){
        $title = 'โค๊ดต้องมี 32 ตัวอักษรเท่านั้น'; $text = 'กรุณาตรวจสอบความถูกต้อง...'; $delay = '3000'; $link = 'main.php?page=usecode';
        msg_error($title,$text,$delay,$link);
    }else{

        $my_code = $_POST['code'];
    
        $sql="SELECT * FROM gift_code WHERE  reward_code = '".$my_code."'";
        $result = mysqli_query($conn,$sql);
                    
        if(mysqli_num_rows($result)==1){

        $code_record = mysqli_fetch_array($result);

        $sid = $user_record['U_SID'];
        $cynpass = $user_record['reward'] + $code_record['reward_point'];
        $sqlup = "UPDATE user_profile SET reward = '".$cynpass."' WHERE U_SID = '".$sid."'";
        $query = mysqli_query($conn,$sqlup);

        $title = 'เติมโค๊ดสำเร็จ!'; $text = 'คุณได้รับแต้มจำนวน '.number_format($code_record['reward_point'],0).' แต้มแล้ว'; $delay = '3000'; $link = 'main.php?page=usecode';
        msg_success($title,$text,$delay,$link);

        $del = "DELETE FROM gift_code WHERE reward_code = '".$my_code."'";
        $my_del = mysqli_query($conn,$del);

        }elseif(mysqli_num_rows($result) < 1){
            $title = 'ไม่มีโค๊ดนี้ในระบบ!'; $text = 'โค๊ดนี้อาจถูกใช้ไปแล้วหรือไม่มีในระบบ...'; $delay = '2000'; $link = 'main.php?page=usecode';
            msg_error($title,$text,$delay,$link);
        }else{
            $title = 'โค๊ดมีปัญหา กรุณาติดต่อแอดมิน'; $text = 'ขออภัยในความไม่สะดวก...';
            msg_warning($title,$text);
        }
    }
}
?>