<?php
if(isset($_POST['submit'])){
    $username = $user_record['u_name'];
    $cynpass = 0;
    $sqlup = "UPDATE user_profile SET u_status = '".$cynpass."' WHERE u_name = '".$username."'";
    $query = mysqli_query($conn,$sqlup);
    session_destroy();
    $title = 'ออกจากระบบสำเร็จ'; $text = 'กำลังบันทึกข้อมูล...'; $delay = '3000'; $link = 'login.php';
    msg_error($title,$text,$delay,$link);
}
?>