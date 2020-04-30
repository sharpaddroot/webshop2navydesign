<?php

    $post_id = $_GET['idedit'];

    $strSQL = "SELECT * FROM news WHERE p_id = $post_id";
    $edit_query = mysqli_query($conn,$strSQL);
    $edit_record = mysqli_fetch_array($edit_query);
?>
 
            <h3 class=" m-2 mt-4 text-dark"><i class="fas fa-pen-square"></i> <b>แก้ไขข่าวสารที่ <?= $edit_record['p_id']; ?></b></h3>
            <hr class="border-dark">
            <div class="row no-gutters mt-4">
                <a href=""><img src="assets/img/post_img/<?= $edit_record['p_img']; ?>" id="userimg" class="card-img-top mb-3"></a>
                <div class="input-group mb-3 col-lg-12">
                <div class="input-group-prepend">
<form method="POST" enctype="multipart/form-data">
                        <span class="input-group-text navy-bg-dark">ไฟล์รูปภาพ</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="postimg" class="custom-file-input" id="img" onchange="readURL(this);" aria-describedby="inputGroupFileAddon04"  accept=".jpg,.png">
                        <label class="custom-file-label" for="inputGroupFile04">กรุณาเลือกรูปภาพ</label>
                    </div>
                </div>
                <p style="font-size:0.9rem;"><i class="fas fa-info-circle"></i> <b>หมายเหตุ</b> : แนะนำรูปภาพขนาด (1280 x 720) และ (1920 x 1080) pixel</p>

                <div class="input-group mb-3 col-lg-8 pr-lg-3">
                <div class="input-group-prepend">
                    <span class="input-group-text navy-bg-dark">หัวข้อ</span>
                </div>
                    <input type="text" name="title" class="form-control" placeholder="กรอกหัวข้อ" value="<?= $edit_record['p_head']; ?>" required>
                </div>

                <div class="input-group  mb-3 col-lg-4">
                <div class="input-group-prepend">
                    <span class="input-group-text navy-bg-dark">ประเภทข่าวสาร</span>
                </div>
                    <select name="type" class="custom-select">
                        <option value="1" <?php if($edit_record['p_type'] == 1){echo 'selected';} ?> >อัพเดท</option>
                        <option value="2" <?php if($edit_record['p_type'] == 2){echo 'selected';} ?> >กิจกรรม</option>
                        <option value="3" <?php if($edit_record['p_type'] == 3){echo 'selected';} ?> >โปรโมชั่น</option>
                </select>
                </div>

                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text navy-bg-dark">รายละเอียด</span>
                </div>
                    <textarea name="detail" class="form-control" aria-label="With textarea" style="min-height:200px;max-height:200px;height:200px;"><?= $edit_record['p_detail']; ?></textarea>
                </div>
                <button type="submit" name="editpost" class="btn btn-success mt-3 col-lg-12"><i class="fas fa-check"></i> ยืนยันการแก้ไข</button>
</form>
<?php

if(isset($_POST['editpost'])){

    if(empty($_POST['title'])){
        $title = 'กรุณากรอกชื่อข่าวสาร'; $text = 'กรุณากรอกชื่อข่าวสาร...'; $delay = '3000';
        msg_error($title,$text,$delay);
    }elseif(empty($_POST['type'])){
        $title = 'กรุณาเลือกประเภทข่าวสาร'; $text = 'กรุณาเลือกประเภทข่าวสาร...'; $delay = '3000';
        msg_error($title,$text,$delay);
    }elseif(empty($_POST['detail'])){
        $title = 'กรุณากรอกรายละเอียดข่าวสาร'; $text = 'กรุณากรอกรายละเอียดข่าวสาร...'; $delay = '3000';
        msg_error($title,$text,$delay);
    }else{

        $namea = bin2hex(random_bytes(16)).'_post'.$edit_record['p_id'].'.jpg';
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

            $id_data = $edit_record['p_id'];
            $title = $_POST['title'];
            $type = $_POST['type'];
            $detail = $_POST['detail'];
            $sqlitem = "UPDATE news SET p_head = '".$title."' , p_detail = '".$detail."'  , p_type = '".$type."' WHERE p_id = $id_data";
            $query_item = mysqli_query($conn,$sqlitem);

            $title = 'แก้ไขข่าวสารเสร็จสิ้น'; $text = 'กำลังอัพเดทข่าวสาร...'; $delay = '3000'; $link = 'main.php?page=home';
            msg_success($title,$text,$delay,$link);

        }else{


            $id_data = $edit_record['p_id'];
            $imgfile = Upload($_FILES['postimg']);
            $title = $_POST['title'];
            $type = $_POST['type'];
            $detail = $_POST['detail'];
            $price = $_POST['price'];
            $sql = "UPDATE news SET p_head = '$title' , p_detail = '$detail'  , p_img = '$imgfile' , p_type = '$type' WHERE p_id = $id_data";
            $query_img = mysqli_query($conn,$sql);

            $title = 'แก้ไขข่าวสารเสร็จสิ้น'; $text = 'กำลังอัพเดทข่าวสาร...'; $delay = '3000'; $link = 'main.php?page=home';
            msg_success($title,$text,$delay,$link);

            unlink('./assets/img/post_img/'.$edit_record['p_img']);
        }
    }
}

?>
                <button type="button" class="btn btn-danger mt-2 col-lg-12" data-toggle="modal" data-target="#delpost"><i class="fas fa-trash-alt"></i> ลบข่าวสารนี้</button>
                <!--delitem Modal -->
                <div class="modal fade" id="delpost" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-info"></i> คำเตือนจากระบบ</h5>
                    </div>
                    <div class="modal-body text-center">
                        <h1 class="p-0 m-0 text-secondary" style="font-size:8rem;"><i class="far fa-question-circle" style="animation: pulse 1.5s infinite;"></i></h1>
                        <h4 class="mt-4">คุณต้องลบข่าวสารนี้ใช่หรือไม่</h4>
                        <font class="text-secondary" style="opacity:0.6;">POST NAME : <?= $edit_record['p_head']; ?></font>
                    </div>
                    <div class="modal-footer">
                    <form method="POST">
                        <button type="submit" name="delpost" class="btn btn-danger">ฉันต้องการที่จะลบ</button>
                    </form>
            <?php
                if(isset($_POST['delpost']))
                {
                    unlink('./assets/img/post_img/'.$edit_record['p_img']);

                    $my_id = $edit_record['p_id'];
                    $del = "DELETE FROM news WHERE p_id =  $my_id";
                    $my_del = mysqli_query($conn,$del);

                    $title = 'ทำการลบข่าวสารเสร็จสิ้น!'; $text = 'ระบบกำลังอัพเดทข้อมูล...'; $delay = '3000'; $link = 'main.php?page=home';
                    msg_success($title,$text,$delay,$link);
                }
            ?>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">ไม่ต้องการลบ</button>
                    </div>
                    </div>
                </div>
                </div>
                <!-- END delitem Modal -->

                <div class="col-lg-12"><a href="?page=home"><button type="button" class="btn btn-secondary mt-2 col-lg-12"><i class="fas fa-arrow-left"></i> กลับหน้าตั้งค่าข่าวสาร</button></a></div>
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
