<h3 class=" m-2 mt-4"><i class="fas fa-user-shield"></i> <b>จัดการการติดต่อ</b></h3>
<hr class="border-dark">

<div class="row no-gutters">
<form method="POST" class="w-100">
<div class="input-group input-group-lg mb-3 pr-lg-3">
<div class="input-group-prepend">
    <span class="input-group-text text-white" style="background: linear-gradient(to right, #005c97, #363795);"><i class="fab fa-facebook-square"></i>&nbsp;FACEBOOK</span>
</div>
    <input type="text" name="fanpage" class="form-control" placeholder="ชื่อแฟนเพจ" value="<?= $web_record['fanpagefb_name']; ?>" required>
</div>

<div class="input-group input-group-lg mb-3 pr-lg-3">
<div class="input-group-prepend">
    <span class="input-group-text text-white" style="background: linear-gradient(to left, #cb2d3e, #ef473a);"><i class="fab fa-youtube"></i>&nbsp;YOUTUBE</span>
</div>
    <input type="text" name="ybname" class="form-control" placeholder="ชื่อช่อง Youtube" value="<?= $web_record['youtube_name']; ?>" required>
</div>
<div class="input-group mb-3 pr-lg-3">
<div class="input-group-prepend">
    <span class="input-group-text text-white" style="background: linear-gradient(to left, #cb2d3e, #ef473a);"><i class="fas fa-link"></i>&nbsp;LINK YOUTUBE</span>
</div>
    <input type="text" name="ybch" class="form-control" placeholder="ลิ้งค์ช่อง Youtube" value="<?= $web_record['youtube_ch']; ?>" required>
</div>

<div class="input-group input-group-lg mb-3 pr-lg-3">
<div class="input-group-prepend">
    <span class="input-group-text text-white" style="background: linear-gradient(to right, #9d50bb, #6e48aa);"><i class="fab fa-discord"></i>&nbsp;DISCORD</span>
</div>
    <input type="text" name="dcname" class="form-control" placeholder="ชื่อ DISCORD" value="<?= $web_record['discord_name']; ?>" required>
</div>
<div class="input-group mb-3 pr-lg-3">
<div class="input-group-prepend">
    <span class="input-group-text text-white" style="background: linear-gradient(to right, #9d50bb, #6e48aa);"><i class="fas fa-link"></i>&nbsp;LINK DISCORD</span>
</div>
    <input type="text" name="dclink" class="form-control" placeholder="ลิ้งค์ DISCORD" value="<?= $web_record['discord_link']; ?>" required>
</div>

<button type="submit" name="save" class="btn btn-success w-100">อัพเดทการติดต่อ</button>
</form>
<?php
if(isset($_POST['save'])){

    if(empty($_POST['fanpage'])){
        $title = 'กรุณากรอกชื่อ FANPAGE'; $text = 'กรุณากรอกชื่อ FANPAGE...'; $delay = '3000'; $link = 'main.php?page=contact';
        msg_error($title,$text,$delay,$link);
    }elseif(empty($_POST['ybname'])){
        $title = 'กรุณากรอกชื่อช่อง Youtube'; $text = 'กรุณากรอกชื่อช่อง Youtube...'; $delay = '3000'; $link = 'main.php?page=contact';
        msg_error($title,$text,$delay,$link);
    }elseif(empty($_POST['ybch'])){
        $title = 'กรุณากรอกลิ้งค์ช่อง Youtube'; $text = 'กรุณากรอกลิ้งค์ช่อง Youtube...'; $delay = '3000'; $link = 'main.php?page=contact';
        msg_error($title,$text,$delay,$link);
    }elseif(empty($_POST['dcname'])){
        $title = 'กรุณากรอกชื่อ Discord'; $text = 'กรุณากรอกชื่อ Discord...'; $delay = '3000'; $link = 'main.php?page=contact';
        msg_error($title,$text,$delay,$link);
    }elseif(empty($_POST['dclink'])){
        $title = 'กรุณากรอกลิ้งค์ Discord'; $text = 'กรุณากรอกลิ้งค์ Discord...'; $delay = '3000'; $link = 'main.php?page=contact';
        msg_error($title,$text,$delay,$link);
    }else{

        $id_data = 1;
        $fanpage = $_POST['fanpage'];
        $youtube = $_POST['ybname'];
        $youtube_link = $_POST['ybch'];
        $discord = $_POST['dcname'];
        $discord_link = $_POST['dclink'];
        $sql = "UPDATE web_setting SET fanpagefb_name = '$fanpage' , youtube_name = '$youtube' , youtube_ch = '$youtube_link' , discord_name = '$discord' , discord_link = '$discord_link' WHERE id = $id_data";
        $query_img = mysqli_query($conn,$sql);

        $title = 'แก้ไขการติดต่อเสร็จสิ้น'; $text = 'กำลังอัพเดทการติดต่อ...'; $delay = '3000'; $link = 'main.php?page=contact';
        msg_success($title,$text,$delay,$link);

    }

}

?>
</div>