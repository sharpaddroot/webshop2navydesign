<h5 class=" m-2 mt-4"><i class="fas fa-cogs"></i> <b>ตั้งค่าทั่วไป</b></h5>
<hr class="border-dark">
<form method="POST">
<div class="row no-gutters">
    <div class="input-group input-group-sm mb-3 pr-lg-3 col-lg-6">
    <div class="input-group-prepend">
        <span class="input-group-text navy-bg-dark">ชื่อเว็บไซต์</span>
    </div>
    <input type="text" name="webname" class="form-control" placeholder="ชื่อเว็บไซต์" value="<?= $web_record['web_name']; ?>" required>
    </div>

    <div class="input-group input-group-sm mb-3 col-lg-6">
    <div class="input-group-prepend">
        <span class="input-group-text navy-bg-dark">สถานะเว็บไซต์</span>
    </div>
        <select name="status" class="custom-select">
            <option value="1" <?php if($web_record['web_status'] == 1) {echo 'selected';} ?>>เปิดให้บริการ</option>
            <option value="2" <?php if($web_record['web_status'] == 2) {echo 'selected';} ?>>ปิดให้บริการ</option>
            <option value="3" <?php if($web_record['web_status'] == 3) {echo 'selected';} ?>>กำลังปรับปรุงเว็บไซต์</option>
    </select>
    </div>

    <div class="input-group input-group-sm mb-3 pr-lg-3 col-lg-6">
    <div class="input-group-prepend">
        <span class="input-group-text navy-bg-dark">Domain</span>
    </div>
    <input type="text" name="domain" class="form-control" placeholder="Domain" value="<?= $web_record['web_domain']; ?>" required>
    </div>

    <div class="input-group input-group-sm mb-3 col-lg-6">
    <div class="input-group-prepend">
        <span class="input-group-text navy-bg-dark">Version</span>
    </div>
    <input type="text" name="version" class="form-control" placeholder="Version" value="<?= $web_record['web_version']; ?>" required>
    </div>

    <div class="input-group input-group-sm mb-3 pr-lg-3 col-lg-6">
    <div class="input-group-prepend">
        <span class="input-group-text navy-bg-blue"><i class="fab fa-facebook-square"></i>&nbsp;Facebook</span>
    </div>
        <input type="text" name="fanpage" class="form-control" placeholder="nanydesignpage" value="<?= $web_record['fp_facebook']; ?>" required>
    </div>

    <div class="input-group input-group-sm mb-3 col-lg-6">
    <div class="input-group-prepend">
        <span class="input-group-text navy-bg-red"><i class="fab fa-youtube"></i>&nbsp;Youtube Clip Promote</span>
    </div>
    <input type="text" name="clip" class="form-control" placeholder="Video ID" value="<?= $web_record['youtube_clip']; ?>" required>
    </div>
    <button type="submit" name="websave" class="btn btn-success btn-sm mb-4 col-12">อัพเดทข้อมูลเว็บไซต์</button>
</form>
<?php

if(isset($_POST['websave'])){

    if(empty($_POST['webname'])){
        $title = 'กรุณากรอกชื่อเว็บไซต์'; $text = 'กรุณากรอกชื่อเว็บไซต์...'; $delay = '3000';
        msg_error($title,$text,$delay);
    }elseif(empty($_POST['status'])){
        $title = 'กรุณาเลือกสถานะของเว็บ'; $text = 'กรุณาเลือกสถานะของเว็บ...'; $delay = '3000';
        msg_error($title,$text,$delay);
    }elseif(empty($_POST['domain'])){
        $title = 'กรุณากรอก DOMAIN'; $text = 'กรุณากรอก DOMAIN...'; $delay = '3000';
        msg_error($title,$text,$delay);
    }elseif(empty($_POST['version'])){
        $title = 'กรุณากรอก VERSION'; $text = 'กรุณากรอก VERSION...'; $delay = '3000';
        msg_error($title,$text,$delay);
    }elseif(empty($_POST['fanpage'])){
        $title = 'กรุณากรอก FANPAGE FACEBOOK'; $text = 'กรุณากรอก FANPAGE FACEBOOK...'; $delay = '3000';
        msg_error($title,$text,$delay);
    }elseif(empty($_POST['clip'])){
        $title = 'กรุณากรอกคลิปโปรโมท'; $text = 'กรุณากรอกคลิปโปรโมท...'; $delay = '3000';
        msg_error($title,$text,$delay);
    }else{

            $id_data = 1;
            $title = $_POST['webname'];
            $type = $_POST['status'];
            $domain = $_POST['domain'];
            $version = $_POST['version'];
            $fanpage = $_POST['fanpage'];
            $clip = $_POST['clip'];

            $sqlitem = "UPDATE web_setting SET web_name = '".$title."' , web_status = '".$type."' , web_domain = '".$domain."' , web_version = '".$version."' , fp_facebook = '".$fanpage."' , youtube_clip = '".$clip."' WHERE id = $id_data";
            $query_item = mysqli_query($conn,$sqlitem);

            $title = 'แก้ไขหน้าเว็บเสร็จสิ้น'; $text = 'กำลังอัพเดทหน้าเว็บ...'; $delay = '3000'; $link = 'main.php?page=general';
            msg_success($title,$text,$delay,$link);
    }
}

?>

<h5 class=" m-2 mt-4"><i class="fas fa-cogs"></i> <b>ตั้งค่ารูปภาพ</b></h5>
<hr class="border-dark col-12">
<form method="POST" class="w-100" enctype="multipart/form-data">
    <div class="input-group mb-1 col-lg-12">
        <div class="input-group-prepend">
            <span class="input-group-text navy-bg-dark">Logo Website</span>
        </div>
        <div class="custom-file">
            <input type="file" name="logo" class="custom-file-input" id="logo" aria-describedby="inputGroupFileAddon04"  accept=".png">
            <label class="custom-file-label" for="inputGroupFile04">ใช้ภาพขนาด 900 x 500 pixel</label>
        </div>
        <div class="input-group-append">
            <button class="btn btn-outline-dark" type="submit" name="savelogo" id="inputGroupFileAddon04">อัพโหลด</button>
        </div>
    </div>
</form>
<?php
if(isset($_POST['savelogo'])){

    $namea = bin2hex(random_bytes(4)).'_logo.png';
    function Upload($file,$path="./assets/img/"){
        global $namea;
        $newfilename= $namea.str_replace("", "", basename($_FILES["file"]["name"]));
        if(@copy($file['tmp_name'],$path.$newfilename)){
            @chmod($path.$file,0777);
            return $newfilename;
        }else{
            return false;
        }
    }

    if($_FILES["logo"]["error"] != 0){

        $title = 'กรุณาเพิ่มรูปภาพ'; $text = 'กรุณาเพิ่มรูปภาพ...'; $delay = '3000'; $link = 'main.php?page=general';
        msg_error($title,$text,$delay,$link);

    }else{

        $id_data = 1;
        $imgfile = Upload($_FILES['logo']);
        $sql = "UPDATE web_setting SET web_logo = '$imgfile' WHERE id = $id_data";
        $query_img = mysqli_query($conn,$sql);

        $title = 'แก้ไข Logo Website เสร็จสิ้น'; $text = 'กำลังอัพเดทหน้าเว็บ...'; $delay = '3000'; $link = 'main.php?page=general';
        msg_success($title,$text,$delay,$link);

        unlink('./assets/img/'.$web_record['web_logo']);
        
    }
}
?>

<form method="POST" class="w-100" enctype="multipart/form-data">
    <div class="input-group mb-1 col-lg-12">
        <div class="input-group-prepend">
            <span class="input-group-text navy-bg-dark">Login Banner</span>
        </div>
        <div class="custom-file">
            <input type="file" name="login" class="custom-file-input" id="login" aria-describedby="inputGroupFileAddon04"  accept=".jpg,.png">
            <label class="custom-file-label" for="inputGroupFile04">ใช้ภาพขนาด 507 x 424 pixel</label>
        </div>
        <div class="input-group-append">
            <button class="btn btn-outline-dark" name="savelogin" type="submit" id="inputGroupFileAddon04">อัพโหลด</button>
        </div>
    </div>
</form>
<?php
if(isset($_POST['savelogin'])){

    $namea = bin2hex(random_bytes(4)).'_login.jpg';
    function Upload($file,$path="./assets/img/"){
        global $namea;
        $newfilename= $namea.str_replace("", "", basename($_FILES["file"]["name"]));
        if(@copy($file['tmp_name'],$path.$newfilename)){
            @chmod($path.$file,0777);
            return $newfilename;
        }else{
            return false;
        }
    }

    if($_FILES["login"]["error"] != 0){

        $title = 'กรุณาเพิ่มรูปภาพ'; $text = 'กรุณาเพิ่มรูปภาพ...'; $delay = '3000'; $link = 'main.php?page=general';
        msg_error($title,$text,$delay,$link);

    }else{

        $id_data = 1;
        $imgfile = Upload($_FILES['login']);
        $sql = "UPDATE web_setting SET login_banner = '$imgfile' WHERE id = $id_data";
        $query_img = mysqli_query($conn,$sql);

        $title = 'แก้ไข Login Banner เสร็จสิ้น'; $text = 'กำลังอัพเดทหน้าเว็บ...'; $delay = '3000'; $link = 'main.php?page=general';
        msg_success($title,$text,$delay,$link);

        unlink('./assets/img/'.$web_record['login_banner']);
        
    }
}
?>

<form method="POST" class="w-100" enctype="multipart/form-data">
    <div class="input-group mb-1 col-lg-12">
        <div class="input-group-prepend">
            <span class="input-group-text navy-bg-dark">Register Banner</span>
        </div>
        <div class="custom-file">
            <input type="file" name="regis" class="custom-file-input" id="regis" aria-describedby="inputGroupFileAddon04"  accept=".jpg,.png">
            <label class="custom-file-label" for="inputGroupFile04">ใช้ภาพขนาด 507 x 628 pixel</label>
        </div>
        <div class="input-group-append">
            <button class="btn btn-outline-dark" type="submit" name="saveregis" id="inputGroupFileAddon04">อัพโหลด</button>
        </div>
    </div>
    </form>
    <?php
if(isset($_POST['saveregis'])){

    $namea = bin2hex(random_bytes(4)).'_regis.jpg';
    function Upload($file,$path="./assets/img/"){
        global $namea;
        $newfilename= $namea.str_replace("", "", basename($_FILES["file"]["name"]));
        if(@copy($file['tmp_name'],$path.$newfilename)){
            @chmod($path.$file,0777);
            return $newfilename;
        }else{
            return false;
        }
    }

    if($_FILES["regis"]["error"] != 0){

        $title = 'กรุณาเพิ่มรูปภาพ'; $text = 'กรุณาเพิ่มรูปภาพ...'; $delay = '3000'; $link = 'main.php?page=general';
        msg_error($title,$text,$delay,$link);

    }else{

        $id_data = 1;
        $imgfile = Upload($_FILES['regis']);
        $sql = "UPDATE web_setting SET regis_banner = '$imgfile' WHERE id = $id_data";
        $query_img = mysqli_query($conn,$sql);

        $title = 'แก้ไข Login Banner เสร็จสิ้น'; $text = 'กำลังอัพเดทหน้าเว็บ...'; $delay = '3000'; $link = 'main.php?page=general';
        msg_success($title,$text,$delay,$link);

        unlink('./assets/img/'.$web_record['regis_banner']);
        
    }
}
?>

<form method="POST" class="w-100" enctype="multipart/form-data">
    <div class="input-group mb-1 col-lg-12">
        <div class="input-group-prepend">
            <span class="input-group-text navy-bg-dark">Promote Banner</span>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="promote" id="promote" aria-describedby="inputGroupFileAddon04"  accept=".jpg,.png">
            <label class="custom-file-label" for="inputGroupFile04">ใช้ภาพขนาด 798 x 300 pixel</label>
        </div>
        <div class="input-group-append">
            <button class="btn btn-outline-dark" type="submit" name="savepromote" id="inputGroupFileAddon04">อัพโหลด</button>
        </div>
    </div>
    </form>
<?php
if(isset($_POST['savepromote'])){

    $namea = bin2hex(random_bytes(4)).'_promote.jpg';
    function Upload($file,$path="./assets/img/"){
        global $namea;
        $newfilename= $namea.str_replace("", "", basename($_FILES["file"]["name"]));
        if(@copy($file['tmp_name'],$path.$newfilename)){
            @chmod($path.$file,0777);
            return $newfilename;
        }else{
            return false;
        }
    }

    if($_FILES["promote"]["error"] != 0){

        $title = 'กรุณาเพิ่มรูปภาพ'; $text = 'กรุณาเพิ่มรูปภาพ...'; $delay = '3000'; $link = 'main.php?page=general';
        msg_error($title,$text,$delay,$link);

    }else{

        $id_data = 1;
        $imgfile = Upload($_FILES['promote']);
        $sql = "UPDATE web_setting SET promote_banner = '$imgfile' WHERE id = $id_data";
        $query_img = mysqli_query($conn,$sql);

        $title = 'แก้ไข Promote Banner เสร็จสิ้น'; $text = 'กำลังอัพเดทหน้าเว็บ...'; $delay = '3000'; $link = 'main.php?page=general';
        msg_success($title,$text,$delay,$link);

        unlink('./assets/img/'.$web_record['promote_banner']);
        
    }
}
?>

<form method="POST" class="w-100" enctype="multipart/form-data">
    <div class="input-group mb-1 col-lg-12">
        <div class="input-group-prepend">
            <span class="input-group-text navy-bg-dark">Background Website</span>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="background" id="background" aria-describedby="inputGroupFileAddon04"  accept=".jpg,.png">
            <label class="custom-file-label" for="inputGroupFile04">ใช้ภาพขนาด 1920 x 1080 pixel</label>
        </div>
        <div class="input-group-append">
            <button class="btn btn-outline-dark" type="submit" name="savebackground" id="inputGroupFileAddon04">อัพโหลด</button>
        </div>
    </div>
    </form>
    <?php
if(isset($_POST['savebackground'])){

    $namea = 'background.jpg';
    function Upload($file,$path="./assets/img/"){
        global $namea;
        $newfilename= $namea.str_replace("", "", basename($_FILES["file"]["name"]));
        if(@copy($file['tmp_name'],$path.$newfilename)){
            @chmod($path.$file,0777);
            return $newfilename;
        }else{
            return false;
        }
    }

    if($_FILES["background"]["error"] != 0){

        $title = 'กรุณาเพิ่มรูปภาพ'; $text = 'กรุณาเพิ่มรูปภาพ...'; $delay = '3000'; $link = 'main.php?page=general';
        msg_error($title,$text,$delay,$link);

    }else{

        $id_data = 1;
        $imgfile = Upload($_FILES['background']);
        $sql = "UPDATE web_setting SET web_bg = '$imgfile' WHERE id = $id_data";
        $query_img = mysqli_query($conn,$sql);

        $title = 'แก้ไข Background Website เสร็จสิ้น'; $text = 'กำลังอัพเดทหน้าเว็บ...'; $delay = '3000'; $link = 'main.php?page=general';
        msg_success($title,$text,$delay,$link);
        
    }
}
?>

<form method="POST" class="w-100" enctype="multipart/form-data">
    <div class="input-group mb-1 col-lg-12">
        <div class="input-group-prepend">
            <span class="input-group-text navy-bg-red">รูปโปรโมทที่ 1</span>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="slide1" id="pro1" aria-describedby="inputGroupFileAddon04"  accept=".jpg,.png">
            <label class="custom-file-label" for="inputGroupFile04">ใช้ภาพขนาด 1920 x 1080 pixel หรือ 1280 x 720 pixel</label>
        </div>
        <div class="input-group-append">
            <button class="btn btn-outline-dark" type="submit" name="saveslide1" id="inputGroupFileAddon04">อัพโหลด</button>
        </div>
    </div>
    </form>
<?php
if(isset($_POST['saveslide1'])){

    $namea = bin2hex(random_bytes(4)).'_slide1.jpg';
    function Upload($file,$path="./assets/img/slide/"){
        global $namea;
        $newfilename= $namea.str_replace("", "", basename($_FILES["file"]["name"]));
        if(@copy($file['tmp_name'],$path.$newfilename)){
            @chmod($path.$file,0777);
            return $newfilename;
        }else{
            return false;
        }
    }

    if($_FILES["slide1"]["error"] != 0){

        $title = 'กรุณาเพิ่มรูปภาพ'; $text = 'กรุณาเพิ่มรูปภาพ...'; $delay = '3000'; $link = 'main.php?page=general';
        msg_error($title,$text,$delay,$link);

    }else{

        $id_data = 1;
        $imgfile = Upload($_FILES['slide1']);
        $sql = "UPDATE web_setting SET slide_1 = '$imgfile' WHERE id = $id_data";
        $query_img = mysqli_query($conn,$sql);

        $title = 'แก้ไข รูป Slide ที่ 1 เสร็จสิ้น'; $text = 'กำลังอัพเดทหน้าเว็บ...'; $delay = '3000'; $link = 'main.php?page=general';
        msg_success($title,$text,$delay,$link);

        unlink('./assets/img/slide/'.$web_record['slide_1']);
        
    }
}
?>
    
<form method="POST" class="w-100" enctype="multipart/form-data">
    <div class="input-group mb-1 col-lg-12">
        <div class="input-group-prepend">
            <span class="input-group-text navy-bg-red">รูปโปรโมทที่ 2</span>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="slide2" id="pro2" aria-describedby="inputGroupFileAddon04"  accept=".jpg,.png">
            <label class="custom-file-label" for="inputGroupFile04">ใช้ภาพขนาด 1920 x 1080 pixel หรือ 1280 x 720 pixel</label>
        </div>
        <div class="input-group-append">
            <button class="btn btn-outline-dark" type="submit" name="saveslide2" id="inputGroupFileAddon04">อัพโหลด</button>
        </div>
    </div>
    </form>
<?php
if(isset($_POST['saveslide2'])){

    $namea = bin2hex(random_bytes(4)).'_slide2.jpg';
    function Upload($file,$path="./assets/img/slide/"){
        global $namea;
        $newfilename= $namea.str_replace("", "", basename($_FILES["file"]["name"]));
        if(@copy($file['tmp_name'],$path.$newfilename)){
            @chmod($path.$file,0777);
            return $newfilename;
        }else{
            return false;
        }
    }

    if($_FILES["slide2"]["error"] != 0){

        $title = 'กรุณาเพิ่มรูปภาพ'; $text = 'กรุณาเพิ่มรูปภาพ...'; $delay = '3000'; $link = 'main.php?page=general';
        msg_error($title,$text,$delay,$link);

    }else{

        $id_data = 1;
        $imgfile = Upload($_FILES['slide2']);
        $sql = "UPDATE web_setting SET slide_2 = '$imgfile' WHERE id = $id_data";
        $query_img = mysqli_query($conn,$sql);

        $title = 'แก้ไข รูป Slide ที่ 2 เสร็จสิ้น'; $text = 'กำลังอัพเดทหน้าเว็บ...'; $delay = '3000'; $link = 'main.php?page=general';
        msg_success($title,$text,$delay,$link);

        unlink('./assets/img/slide/'.$web_record['slide_2']);
        
    }
}
?>

<form method="POST" class="w-100" enctype="multipart/form-data">
    <div class="input-group mb-1 col-lg-12">
        <div class="input-group-prepend">
            <span class="input-group-text navy-bg-red">รูปโปรโมทที่ 3</span>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="slide3" id="pro3" aria-describedby="inputGroupFileAddon04"  accept=".jpg,.png">
            <label class="custom-file-label" for="inputGroupFile04">ใช้ภาพขนาด 1920 x 1080 pixel หรือ 1280 x 720 pixel</label>
        </div>
        <div class="input-group-append">
            <button class="btn btn-outline-dark" type="submit" name="saveslide3" id="inputGroupFileAddon04">อัพโหลด</button>
        </div>
    </div>
    </form>
<?php
if(isset($_POST['saveslide3'])){

    $namea = bin2hex(random_bytes(4)).'_slide3.jpg';
    function Upload($file,$path="./assets/img/slide/"){
        global $namea;
        $newfilename= $namea.str_replace("", "", basename($_FILES["file"]["name"]));
        if(@copy($file['tmp_name'],$path.$newfilename)){
            @chmod($path.$file,0777);
            return $newfilename;
        }else{
            return false;
        }
    }

    if($_FILES["slide3"]["error"] != 0){

        $title = 'กรุณาเพิ่มรูปภาพ'; $text = 'กรุณาเพิ่มรูปภาพ...'; $delay = '3000'; $link = 'main.php?page=general';
        msg_error($title,$text,$delay,$link);

    }else{

        $id_data = 1;
        $imgfile = Upload($_FILES['slide3']);
        $sql = "UPDATE web_setting SET slide_3 = '$imgfile' WHERE id = $id_data";
        $query_img = mysqli_query($conn,$sql);

        $title = 'แก้ไข รูป Slide ที่ 3 เสร็จสิ้น'; $text = 'กำลังอัพเดทหน้าเว็บ...'; $delay = '3000'; $link = 'main.php?page=general';
        msg_success($title,$text,$delay,$link);

        unlink('./assets/img/slide/'.$web_record['slide_3']);
        
    }
}
?>

<form method="POST" class="w-100" enctype="multipart/form-data">
    <div class="input-group mb-1 col-lg-12">
        <div class="input-group-prepend">
            <span class="input-group-text navy-bg-red">รูปโปรโมทที่ 4</span>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="slide4" id="pro4" aria-describedby="inputGroupFileAddon04"  accept=".jpg,.png">
            <label class="custom-file-label" for="inputGroupFile04">ใช้ภาพขนาด 1920 x 1080 pixel หรือ 1280 x 720 pixel</label>
        </div>
        <div class="input-group-append">
            <button class="btn btn-outline-dark" type="submit" name="saveslide4" id="inputGroupFileAddon04">อัพโหลด</button>
        </div>
    </div>
    </form>
<?php
if(isset($_POST['saveslide4'])){

    $namea = bin2hex(random_bytes(4)).'_slide4.jpg';
    function Upload($file,$path="./assets/img/slide/"){
        global $namea;
        $newfilename= $namea.str_replace("", "", basename($_FILES["file"]["name"]));
        if(@copy($file['tmp_name'],$path.$newfilename)){
            @chmod($path.$file,0777);
            return $newfilename;
        }else{
            return false;
        }
    }

    if($_FILES["slide4"]["error"] != 0){

        $title = 'กรุณาเพิ่มรูปภาพ'; $text = 'กรุณาเพิ่มรูปภาพ...'; $delay = '3000'; $link = 'main.php?page=general';
        msg_error($title,$text,$delay,$link);

    }else{

        $id_data = 1;
        $imgfile = Upload($_FILES['slide4']);
        $sql = "UPDATE web_setting SET slide_4 = '$imgfile' WHERE id = $id_data";
        $query_img = mysqli_query($conn,$sql);

        $title = 'แก้ไข รูป Slide ที่ 4 เสร็จสิ้น'; $text = 'กำลังอัพเดทหน้าเว็บ...'; $delay = '3000'; $link = 'main.php?page=general';
        msg_success($title,$text,$delay,$link);

        unlink('./assets/img/slide/'.$web_record['slide_4']);
        
    }
}
?>
    
<form method="POST" class="w-100" enctype="multipart/form-data">
    <div class="input-group mb-1 col-lg-12">
        <div class="input-group-prepend">
            <span class="input-group-text navy-bg-red">รูปโปรโมทที่ 5</span>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="slide5" id="pro5" aria-describedby="inputGroupFileAddon04"  accept=".jpg,.png">
            <label class="custom-file-label" for="inputGroupFile04">ใช้ภาพขนาด 1920 x 1080 pixel หรือ 1280 x 720 pixel</label>
        </div>
        <div class="input-group-append">
            <button class="btn btn-outline-dark" type="submit" name="saveslide5" id="inputGroupFileAddon04">อัพโหลด</button>
        </div>
    </div>
    </form>
    <?php
if(isset($_POST['saveslide5'])){

    $namea = bin2hex(random_bytes(4)).'_slide5.jpg';
    function Upload($file,$path="./assets/img/slide/"){
        global $namea;
        $newfilename= $namea.str_replace("", "", basename($_FILES["file"]["name"]));
        if(@copy($file['tmp_name'],$path.$newfilename)){
            @chmod($path.$file,0777);
            return $newfilename;
        }else{
            return false;
        }
    }

    if($_FILES["slide5"]["error"] != 0){

        $title = 'กรุณาเพิ่มรูปภาพ'; $text = 'กรุณาเพิ่มรูปภาพ...'; $delay = '3000'; $link = 'main.php?page=general';
        msg_error($title,$text,$delay,$link);

    }else{

        $id_data = 1;
        $imgfile = Upload($_FILES['slide5']);
        $sql = "UPDATE web_setting SET slide_5 = '$imgfile' WHERE id = $id_data";
        $query_img = mysqli_query($conn,$sql);

        $title = 'แก้ไข รูป Slide ที่ 5 เสร็จสิ้น'; $text = 'กำลังอัพเดทหน้าเว็บ...'; $delay = '3000'; $link = 'main.php?page=general';
        msg_success($title,$text,$delay,$link);

        unlink('./assets/img/slide/'.$web_record['slide_5']);
        
    }
}
?>


</div>










<script type="text/javascript">
$(function(){
 
    $("#logo").on("change",function(){
        var _fileName = $(this).val();
        $(this).next("label").text(_fileName);
    });
    $("#background").on("change",function(){
        var _fileName = $(this).val();
        $(this).next("label").text(_fileName);
    });
    $("#login").on("change",function(){var _fileName = $(this).val();$(this).next("label").text(_fileName);});
    $("#regis").on("change",function(){var _fileName = $(this).val();$(this).next("label").text(_fileName);});
    $("#promote").on("change",function(){var _fileName = $(this).val();$(this).next("label").text(_fileName);});
    $("#pro1").on("change",function(){var _fileName = $(this).val();$(this).next("label").text(_fileName);});
    $("#pro2").on("change",function(){var _fileName = $(this).val();$(this).next("label").text(_fileName);});
    $("#pro3").on("change",function(){var _fileName = $(this).val();$(this).next("label").text(_fileName);});
    $("#pro4").on("change",function(){var _fileName = $(this).val();$(this).next("label").text(_fileName);});
    $("#pro5").on("change",function(){var _fileName = $(this).val();$(this).next("label").text(_fileName);});
 
});
</script>