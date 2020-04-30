<?php
if(isset($_POST['u_sid'])){
    if(empty($_POST['u_sid'])){

        $title = 'กรุณากรอก SID ของเพื่อน!'; $text = 'กรอก SID เว้นว่างไม่ได้...'; $delay = '3000'; $link = 'main.php?page=trade';
        msg_error($title,$text,$delay,$link);
    
    }elseif(empty($_POST['trade_type'])){

        $title = 'กรุณาเลือกประเภทการโอน!'; $text = 'กรุณาเลือกประเภทการโอน...'; $delay = '3000'; $link = 'main.php?page=trade';
        msg_error($title,$text,$delay,$link);
    
    }elseif($_POST['trade_in'] <= 0 OR empty($_POST['trade_in'])){

        $title = 'จำนวนการโอนต้องมากกว่า 0 !'; $text = 'กรุณากรอกจำนวนการโอนมากกว่า 0 !...'; $delay = '3000'; $link = 'main.php?page=trade';
        msg_warning($title,$text,$delay,$link);
    
    }else{
        $my_trade = $_POST['trade_in'];

        $service_rate = 5;

        $trade_price = $my_trade + $service_rate;


        if($_POST['trade_type'] == 1){$type = 'point';}else{$type = 'reward';}


        if($trade_price > $user_record[$type]){

            $title = 'คุณมี '.$type.' ไม่พอทำรายการ!'; $text = 'การโอนไม่สำเร็จ...'; $delay = '3000'; $link = 'main.php?page=trade';
            msg_error($title,$text,$delay,$link);

        }else{

            $f_sid = $_POST['u_sid'];
            $sql="SELECT * FROM user_profile WHERE  U_SID = '".$f_sid."'";
            $result = mysqli_query($conn,$sql);
                        
            if(mysqli_num_rows($result)==1){

                $my_sid = $user_record['U_SID'];
                $my_cynpass = $user_record[$type] - $trade_price;
                $sqldel = "UPDATE user_profile SET $type = '".$my_cynpass."' WHERE U_SID = '".$my_sid."'";
                $query = mysqli_query($conn,$sqldel);
            
                $f_record = mysqli_fetch_array($result);
                
                $sid = $f_record['U_SID'];
                $cynpass = $f_record[$type] + $my_trade;
                $sqlup = "UPDATE user_profile SET $type = '".$cynpass."' WHERE U_SID = '".$sid."'";
                $query = mysqli_query($conn,$sqlup);

                $title = 'ทำรายการสำเร็จ!'; $text = 'คุณได้โอน '.$type.' จำนวน '.number_format($my_trade,0).' แล้ว'; $delay = '3000'; $link = 'main.php?page=trade';
                msg_success($title,$text,$delay,$link);

            }else{

                $title = 'ไม่ SID นี้ในระบบ!'; $text = 'กรุณาตรวจสอบ SID ของเพื่อนและทำรายการใหม่อีกครั้ง...'; $delay = '3000'; $link = 'main.php?page=trade';
                msg_error($title,$text,$delay,$link);   

            }

        }
    }
}
?>