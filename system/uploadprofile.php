<?php 
    if(isset($_POST['pimg'])){
            $namea = 'id'.$user_record['id'].'_'.bin2hex(random_bytes(3)).'_img.jpg';
            function Upload($file,$path="./assets/img/user_img/"){
                global $namea;
                $newfilename= $namea.str_replace("", "", basename($_FILES["file"]["name"]));
                if(@copy($file['tmp_name'],$path.$newfilename)){
                    @chmod($path.$file,0777);
                    return $newfilename;
                }else{
                    return false;
                }
            }

            unlink('./assets/img/user_img/'.$_POST['imgname']);
            
            $id_data = $user_record['id'];
            $imagefile = Upload($_FILES['image_img']);
            $sql = "UPDATE user_profile SET  user_img = '$imagefile' WHERE id = $id_data";
            $query_img = mysqli_query($conn,$sql);
            if($query_img) {
                $title = 'เปลี่ยนรูปโปรไฟล์สำเร็จ'; $text = 'กำลังบันทึกข้อมูล...'; $delay = '3000'; $link = 'editprofile.php';
                msg_success($title,$text,$delay,$link);
            }
    }
?>