<style>
.my-custom-scrollbar {
position: relative;
height: 520px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
</style>
<ul class="nav nav-tabs border-0" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link border-0 bg-success text-white navy-hov-dark" style="border-radius:60px;" id="post-tab" data-toggle="tab" href="#post" role="tab" aria-controls="post" aria-selected="true"><i class="fas fa-plus"></i> เพิ่มข่าวสาร</a>
        </li>
        <li class="nav-item ml-2">
            <a class="nav-link border-0 bg-dark text-white navy-hov-dark" style="border-radius:60px;" id="home-tab" data-toggle="tab" href="#update" role="tab" aria-controls="home" aria-selected="false"><i class="fas fa-file-upload"></i> แก้ไขอัพเดท</a>
        </li>
        <li class="nav-item ml-2">
            <a class="nav-link border-0 bg-primary text-white navy-hov-blue" style="border-radius:60px;" id="profile-tab" data-toggle="tab" href="#event" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-calendar-week"></i> แก้ไขกิจกรรม</a>
        </li>
        <li class="nav-item ml-md-2 mt-3 mt-md-0">
            <a class="nav-link border-0 bg-danger text-white navy-hov-red" style="border-radius:60px;" id="contact-tab" data-toggle="tab" href="#promotion" role="tab" aria-controls="contact" aria-selected="false"><i class="fab fa-hotjar"></i> แก้ไขโปรโมชั่น</a>
        </li>
        </ul>
        <div class="tab-content" id="myTabContent">

<?php //เพิ่ม ?>
        <div class="tab-pane fade show active" id="post" role="tabpanel" aria-labelledby="post-tab">
            <h3 class=" m-2 mt-4 text-dark"><i class="fas fa-plus"></i> <b>เพิ่มข่าวสาร</b></h3>
            <hr class="border-dark">
            <div class="row no-gutters mt-4">
                <a href=""><img src="assets/img/dummy.jpg" id="userimg" class="card-img-top mb-3"></a>
                <div class="input-group mb-3 col-lg-12">
                <div class="input-group-prepend">
<form method="POST" enctype="multipart/form-data">
                        <span class="input-group-text navy-bg-dark">ไฟล์รูปภาพ</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="postimg" class="custom-file-input" id="img" onchange="readURL(this);" aria-describedby="inputGroupFileAddon04"  accept=".jpg,.png" required>
                        <label class="custom-file-label" for="inputGroupFile04">กรุณาเลือกรูปภาพ</label>
                    </div>
                </div>
                <p style="font-size:0.9rem;"><i class="fas fa-info-circle"></i> <b>หมายเหตุ</b> : แนะนำรูปภาพขนาด (1280 x 720) และ (1920 x 1080) pixel</p>

                <div class="input-group mb-3 col-lg-6 pr-lg-3">
                <div class="input-group-prepend">
                    <span class="input-group-text navy-bg-dark">หัวข้อ</span>
                </div>
                    <input type="text" name="newtitle" class="form-control" placeholder="กรอกหัวข้อ" required>
                </div>

                <div class="input-group  mb-3 col-lg-6">
                <div class="input-group-prepend">
                    <span class="input-group-text navy-bg-dark">ประเภทข่าวสาร</span>
                </div>
                    <select name="type" class="custom-select">
                        <option value="1">อัพเดท</option>
                        <option value="2">กิจกรรม</option>
                        <option value="3">โปรโมชั่น</option>
                </select>
                </div>

                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text navy-bg-dark">รายละเอียด</span>
                </div>
                    <textarea name="newdetail" class="form-control" aria-label="With textarea" style="min-height:200px;max-height:200px;height:200px;"></textarea>
                </div>
                <button type="submit" name="newpost" class="btn btn-success mt-3 col-12"><i class="fas fa-plus"></i> เพิ่มข่าวสาร</button>
</form>
<?php

if(isset($_POST['newpost'])){

    if(empty($_POST['newtitle'])){
        $title = 'กรุณากรอกชื่อข่าวสาร'; $text = 'กรุณากรอกชื่อข่าวสาร...'; $delay = '3000';
        msg_error($title,$text,$delay);
    }elseif(empty($_POST['type'])){
        $title = 'กรุณาเลือกประเภทข่าวสาร'; $text = 'กรุณาเลือกประเภทข่าวสาร...'; $delay = '3000';
        msg_error($title,$text,$delay);
    }elseif(empty($_POST['newdetail'])){
        $title = 'กรุณากรอกรายละเอียดข่าวสาร'; $text = 'กรุณากรอกรายละเอียดข่าวสาร...'; $delay = '3000';
        msg_error($title,$text,$delay);
    }else{

        $namea = bin2hex(random_bytes(16)).'_post.jpg';
        function Upload($file,$path="./assets/img/post_img/"){
            global $namea;
            $newfilename= $namea.str_replace("", "", basename($_FILES["file"]["name"]));
            if(@copy($file['tmp_name'],$path.$newfilename)){
                @chmod($path.$file,0777);
                return $newfilename;
            }else{
                return false;
            }
        }

        if($_FILES["postimg"]["error"] != 0){

            $title = 'กรุณาเพิ่มรูปภาพข่าวสาร'; $text = 'กรุณาเพิ่มรูปภาพข่าวสาร...'; $delay = '3000';
            msg_error($title,$text,$delay);

        }else{

            $imgfile = Upload($_FILES['postimg']);
            $title = $_POST['newtitle'];
            $type = $_POST['type'];
            $detail = $_POST['newdetail'];
            date_default_timezone_set("Asia/Bangkok");
            $date = date("d/m/Y H:i");

            $sql = "INSERT INTO news (p_head, p_detail, p_img, p_type, p_date) VALUE ('$title','$detail','$imgfile','$type','$date')";
            $query_img = mysqli_query($conn,$sql);

            $title = 'สร้างข่าวสารเสร็จสิ้น'; $text = 'กำลังอัพเดทข่าวสาร...'; $delay = '3000'; $link = 'main.php?page=home';
            msg_success($title,$text,$delay,$link);
        }
    }
}

?>
            </div>           
        </div>

<?php //อัพเดท ?>
        <div class="tab-pane fade" id="update" role="tabpanel" aria-labelledby="home-tab">
            <h3 class=" m-2 mt-4"><i class="fas fa-file-upload"></i> <b>แก้ไขอัพเดท</b></h3>
            <hr class="border-dark">
            <div class="row no-gutters mt-4 table-wrapper-scroll-y my-custom-scrollbar">
            <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                <th scope="col" class="text-center">ไอดี</th>
                <th scope="col" class="text-center">หัวข้อข่าวสาร</th>
                <th scope="col" class="text-center">แก้ไข</th>
                </tr>
            </thead>
            <tbody class="w-100">

<?php 
          $sql="SELECT * FROM news WHERE  p_type = 1";
          $result = mysqli_query($conn,$sql);
                      
          if(mysqli_num_rows($result)==0){ 
?>
                <tr>
                <th scope="row" class="text-center">#</th>
                <td class="text-center">ยังไม่มีรายการในขณะนี้</td>
                <td class="text-center"><i class="fas fa-times text-danger mt-1"></i></td>
                </tr>
<?php
          }else{
    $strSQL = "SELECT * FROM news WHERE p_type = 1 ORDER BY p_id DESC";
    $post_query = mysqli_query($conn,$strSQL);
    $post_record = mysqli_fetch_array($post_query);
do { ?>

                <tr>
                <th scope="row" class="text-center"><?= $post_record['p_id']; ?></th>
                <td class="text-center"><?= $post_record['p_head']; ?></td>
                <td class="text-center"><a href="?page=edit&idedit=<?= $post_record['p_id']; ?>"><button type="button" class="btn btn-sm btn-outline-dark"><i class="fas fa-pen-square"></i> แก้ไข</button></a></td>
                </tr>

<?php }while ($post_record = mysqli_fetch_array($post_query)); }?>
            </tbody>
            </table>
            </div>
        </div>

<?php //กิจกรรม ?>
        <div class="tab-pane fade" id="event" role="tabpanel" aria-labelledby="profile-tab">
            <h3 class=" m-2 mt-4 text-primary"><i class="fas fa-calendar-week"></i> <b>แก้ไขกิจกรรม</b></h3>
            <hr class="border-primary">
            <div class="row no-gutters mt-4 table-wrapper-scroll-y my-custom-scrollbar">
            <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                <th scope="col" class="text-center">ไอดี</th>
                <th scope="col" class="text-center">หัวข้อข่าวสาร</th>
                <th scope="col" class="text-center">แก้ไข</th>
                </tr>
            </thead>
            <tbody class="w-100">

<?php 
          $sql="SELECT * FROM news WHERE  p_type = 2";
          $result = mysqli_query($conn,$sql);
                      
          if(mysqli_num_rows($result)==0){ 
?>
                <tr>
                <th scope="row" class="text-center">#</th>
                <td class="text-center">ยังไม่มีรายการในขณะนี้</td>
                <td class="text-center"><i class="fas fa-times text-danger mt-1"></i></td>
                </tr>
<?php
          }else{
    $strSQL = "SELECT * FROM news WHERE p_type = 2 ORDER BY p_id DESC";
    $post_query = mysqli_query($conn,$strSQL);
    $post_record = mysqli_fetch_array($post_query);
do { ?>

                <tr>
                <th scope="row" class="text-center"><?= $post_record['p_id']; ?></th>
                <td class="text-center"><?= $post_record['p_head']; ?></td>
                <td class="text-center"><a href="?page=edit&idedit=<?= $post_record['p_id']; ?>"><button type="button" class="btn btn-sm btn-outline-primary"><i class="fas fa-pen-square"></i> แก้ไข</button></a></td>
                </tr>

<?php }while ($post_record = mysqli_fetch_array($post_query)); }?>
            </tbody>
            </table>
            </div>
        </div>

<?php //โปรโมชั่น ?>
        <div class="tab-pane fade" id="promotion" role="tabpanel" aria-labelledby="contact-tab">
            <h3 class=" m-2 mt-4 text-danger"><i class="fab fa-hotjar"></i> <b>แก้ไขโปรโมชั่น</b></h3>
            <hr class="border-danger">
            <div class="row no-gutters mt-4 table-wrapper-scroll-y my-custom-scrollbar">
            <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                <th scope="col" class="text-center">ไอดี</th>
                <th scope="col" class="text-center">หัวข้อข่าวสาร</th>
                <th scope="col" class="text-center">แก้ไข</th>
                </tr>
            </thead>
            <tbody class="w-100">

<?php 
          $sql="SELECT * FROM news WHERE  p_type = 3";
          $result = mysqli_query($conn,$sql);
                      
          if(mysqli_num_rows($result)==0){ 
?>
                <tr>
                <th scope="row" class="text-center">#</th>
                <td class="text-center">ยังไม่มีรายการในขณะนี้</td>
                <td class="text-center"><i class="fas fa-times text-danger mt-1"></i></td>
                </tr>
<?php
          }else{
    $strSQL = "SELECT * FROM news WHERE p_type = 3 ORDER BY p_id DESC";
    $post_query = mysqli_query($conn,$strSQL);
    $post_record = mysqli_fetch_array($post_query);
do { ?>

                <tr>
                <th scope="row" class="text-center"><?= $post_record['p_id']; ?></th>
                <td class="text-center"><?= $post_record['p_head']; ?></td>
                <td class="text-center"><a href="?page=edit&idedit=<?= $post_record['p_id']; ?>"><button type="button" class="btn btn-sm btn-outline-danger"><i class="fas fa-pen-square"></i> แก้ไข</button></a></td>
                </tr>

<?php }while ($post_record = mysqli_fetch_array($post_query)); }?>
            </tbody>
            </table>
            </div>
        </div>
        </div>

<script type="text/javascript">
$(function(){
 
    $("#img").on("change",function(){var _fileName = $(this).val();$(this).next("label").text(_fileName);});
 
});
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#userimg')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
};
</script>