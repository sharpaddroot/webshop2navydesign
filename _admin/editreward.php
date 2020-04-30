<h3 class=" m-2 mt-4"><i class="fas fa-tags"></i> <b>จัดการรางวัล</b></h3>
<hr class="border-dark">

<?php
    $perpage = 12;

    $sql2 = "SELECT * FROM reward_item";
    $query2 = mysqli_query($conn, $sql2);
    $total_record = mysqli_num_rows($query2);
    $total_page = ceil($total_record / $perpage);
    $limit_page = $total_page;

    if (isset($_GET['rewardpage'])) {
        $page = $_GET['rewardpage'];
    } else {
        $page = 1;
    }

    if(empty($_GET['rewardpage'])){
        $page = 1;
    }
    if($_GET['rewardpage'] > $limit_page){
        $page = 1;
        $title = 'การแสดงผลผิดพลาด!'; $text = 'กรุณาตรวจสอบการเชื่อมโยงข้อมูล...'; $delay = '3000'; $link = 'main.php?page=reward';
        msg_error($title,$text,$delay,$link);
    }

    $start = ($page - 1) * $perpage;

    $strSQL = "SELECT * FROM reward_item ORDER BY item_id DESC LIMIT {$start} , {$perpage}";
    $item_query = mysqli_query($conn,$strSQL);
    $item_record = mysqli_fetch_array($item_query);
?>
<button type="button" class="btn btn-sm btn-secondary ml-2">
<i class="fas fa-shopping-cart"></i> มีรางวัลในระบบทั้งหมด <span class="badge badge-light"><?= number_format($total_record,0); ?></span>
</button>
<button type="button" class="btn btn-danger btn-sm  float-right mr-2" data-toggle="modal" data-target="#newsitem"><i class="fas fa-plus"></i> สร้างรางวัลเพิ่ม</button>
<!-- NEW ITEM Modal -->
<div class="modal fade" id="newsitem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-pen-square"></i><b> สร้างรายการรางวัล</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row">
        <div class="text-center"><img src="assets/img/dummy.jpg" id="userimg" class="card-img-top w-50"></div>
        <div class="input-group mb-3 mt-3 col-lg-12">
            <div class="input-group-prepend">
<form method="POST" enctype="multipart/form-data">
                <span class="input-group-text navy-bg-dark">ไฟล์รูปภาพ</span>
            </div>
             <div class="custom-file w-100">
                <input type="file" name="newimgfile" id="img" class="custom-file-input" onchange="readURL(this);" aria-describedby="inputGroupFileAddon04"  accept=".jpg,.png">
                <label class="custom-file-label" for="inputGroupFile04">กรุณาเลือกรูปภาพ</label>
            </div>
        </div>

        <div class="input-group mb-3 col-lg-8">
            <div class="input-group-prepend">
                <span class="input-group-text navy-bg-dark">ชื่อรางวัล</span>
            </div>
                <input type="text" name="newtitle" class="form-control" placeholder="กรอกชื่อรางวัล" required>
        </div>

        <div class="input-group  mb-3 col-lg-4">
        <div class="input-group-prepend">
            <span class="input-group-text navy-bg-dark">ประเภทรางวัล</span>
        </div>
            <select name="type" class="custom-select">
                <option value="type_1" selected >type_1</option>
                <option value="type_2">type_2</option>
                <option value="type_3">type_3</option>
            </select>
        </div>

        <div class="input-group ml-3 mr-3">
            <div class="input-group-prepend">
                <span class="input-group-text navy-bg-dark">รายละเอียดรางวัล</span>
            </div>
                <textarea class="form-control" name="newdetail" aria-label="With textarea" style="min-height:130px;max-height:130px;height:130px;"></textarea>
        </div>

      </div>
      <div class="modal-footer">
        <div class="input-group col-6 mr-auto">
            <div class="input-group-prepend">
                <span class="input-group-text navy-bg-dark">ราคารางวัล</span>
            </div>
                <input type="number" name="newprice" class="form-control" placeholder="กรอกราคารางวัล" value="0" required>
        </div>
        <button type="submit" name="newitem" class="btn btn-success">สร้างรางวัล</button>
</form>
<?php

if(isset($_POST['newitem'])){

    if(empty($_POST['newtitle'])){
        $title = 'กรุณากรอกชื่อรางวัล'; $text = 'กรุณากรอกชื่อรางวัล...'; $delay = '3000'; $link = 'main.php?page=reward';
        msg_error($title,$text,$delay,$link);
    }elseif(empty($_POST['type'])){
        $title = 'กรุณาเลือกประเภทรางวัล'; $text = 'กรุณาเลือกประเภทรางวัล...'; $delay = '3000'; $link = 'main.php?page=reward';
        msg_error($title,$text,$delay,$link);
    }elseif(empty($_POST['newdetail'])){
        $title = 'กรุณากรอกรายละเอียดรางวัล'; $text = 'กรุณากรอกรายละเอียดรางวัล...'; $delay = '3000'; $link = 'main.php?page=reward';
        msg_error($title,$text,$delay,$link);
    }elseif($_POST['newprice'] < 0 OR empty($_POST['newprice'])){
        $title = 'กรุณาใส่ราคารางวัลมากกว่า 0 !'; $text = 'กรุณาใส่ราคารางวัลมากกว่า...'; $delay = '3000'; $link = 'main.php?page=reward';
        msg_error($title,$text,$delay,$link);
    }else{

        $namea = bin2hex(random_bytes(16)).'_reward.jpg';
        function Upload($file,$path="./assets/img/reward_img/"){
            global $namea;
            $newfilename= $namea.str_replace("", "", basename($_FILES["file"]["name"]));
            if(@copy($file['tmp_name'],$path.$newfilename)){
                @chmod($path.$file,0777);
                return $newfilename;
            }else{
                return false;
            }
        }

        if($_FILES["newimgfile"]["error"] != 0){

            $title = 'กรุณาเพิ่มรูปภาพรางวัล'; $text = 'กรุณาเพิ่มรูปภาพรางวัล...'; $delay = '3000'; $link = 'main.php?page=reward';
            msg_error($title,$text,$delay,$link);

        }else{

            $imgfile = Upload($_FILES['newimgfile']);
            $title = $_POST['newtitle'];
            $type = $_POST['type'];
            $detail = $_POST['newdetail'];
            $price = $_POST['newprice'];

            $sql = "INSERT INTO reward_item (item_title, item_detail, item_price, item_img, item_type) VALUE ('$title','$detail','$price','$imgfile','$type')";
            $query_img = mysqli_query($conn,$sql);

            $title = 'สร้างรางวัลเสร็จสิ้น'; $text = 'กำลังอัพเดทรางวัล...'; $delay = '3000'; $link = 'main.php?page=reward';
            msg_success($title,$text,$delay,$link);
        }
    }
}

?>
        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>    
</div>
<!-- END NEW ITEM Modal -->

<div class="row no-gutters">
<?php if($total_record == 0){ ?>
    <h3 class=" m-2">ยังไม่มีรางวัลในขณะนี้</h3>
<?php
    }else{
    do { 
?>
<div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4">
    <div class="card bordder-0 m-2 navy-card-dark-noani">
    <a href=""><img src="assets/img/reward_img/<?= $item_record['item_img']; ?>" class="card-img-top" data-toggle="tooltip" data-placement="right" data-html="true" title="<div class='text-left'>ชื่อรางวัล : <b><i class='navy-text-green'><?= $item_record['item_title']; ?></b></i></br>ประเภท : <b> <?= $item_record['item_type']; ?> </b></p>
    <u><i>รายละเอียดรางวัล</i></u></br><?= $item_record['item_detail']; ?></p></div><div class='text-right'>ราคา : <b class='navy-text-green'><i> <?= number_format($item_record['item_price'],0); ?> </i></b> POINTS</div>"></a>
        <div class="card-body p-3 text-center">
            <b style="font-size:1rem;"><?php if(strlen($item_record['item_title']) >= 18){echo substr($item_record['item_title'], 0, 18).'...';}else{echo $item_record['item_title'];} ?></b>
        </div>
        <div class="pt-1 pb-1 pr-3 ml-3 mb-2" style="font-size:0.7rem;">
            <button type="button" class="btn btn-dark btn-sm w-100" data-toggle="modal" data-target="#exampleModalCenter<?= $item_record['item_id']; ?>"><i class="fas fa-pen-square"></i> แก้ไขรางวัล</button>
            <button type="submit" data-toggle="modal" data-target="#delreward<?= $item_record['item_id']; ?>" class="btn mt-2 btn-danger btn-sm w-100"><i class="fas fa-trash-alt"></i> ลบรางวัล</button>

            <!--delitem Modal -->
            <div class="modal fade" id="delreward<?= $item_record['item_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-info"></i> คำเตือนจากระบบ</h5>
                </div>
                <div class="modal-body text-center">
                    <h1 class="p-0 m-0 text-secondary" style="font-size:8rem;"><i class="far fa-question-circle" style="animation: pulse 1.5s infinite;"></i></h1>
                    <h4 class="mt-4">คุณต้องลบรางวัลนี้ใช่หรือไม่</h4>
                    <font class="text-secondary" style="opacity:0.6;">REWARD NAME : <?= $item_record['item_title']; ?></font>
                </div>
                <div class="modal-footer">
                <form method="POST">
                    <button type="submit" name="delreward" value="<?= $item_record['item_id']; ?>" class="btn btn-danger">ฉันต้องการที่จะลบ</button>
                    <input type="hidden" value="<?= $item_record['item_img']; ?>" name="pathimg">
                </form>
        <?php
            if(isset($_POST['delreward']))
            {

                unlink('./assets/img/reward_img/'.$_POST['pathimg']);

                $my_id = $_POST['delreward'];
                $del = "DELETE FROM reward_item WHERE item_id =  $my_id";
                $my_del = mysqli_query($conn,$del);

                $title = 'ทำการลบรางวัลเสร็จสิ้น!'; $text = 'ระบบกำลังอัพเดทข้อมูล...'; $delay = '3000'; $link = 'main.php?page=reward';
                msg_success($title,$text,$delay,$link);
            }
        ?>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">ไม่ต้องการลบ</button>
                </div>
                </div>
            </div>
            </div>
            <!-- END delitem Modal -->
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter<?= $item_record['item_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-pen-square"></i><b> แก้ไขรางวัลที่ <?= $item_record['item_id']; ?></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row">

        <div class="text-center"><img src="assets/img/reward_img/<?= $item_record['item_img']; ?>" class="card-img-top w-50"></div>
        <div class="input-group mb-3 mt-3 col-lg-12">
            <div class="input-group-prepend">
<form method="POST" enctype="multipart/form-data">
                <span class="input-group-text navy-bg-dark">ไฟล์รูปภาพ</span>
            </div>
             <div class="custom-file">
                <input type="file" name="imgfile" class="custom-file-input" id="img<?= $item_record['item_id']; ?>" onchange="readURL(this);" aria-describedby="inputGroupFileAddon04<?= $item_record['item_id']; ?>"  accept=".jpg,.png">
                <label class="custom-file-label" for="inputGroupFile04<?= $item_record['item_id']; ?>">กรุณาเลือกรูปภาพ</label>
            </div>
        </div>

        <div class="input-group mb-3 col-lg-8">
            <div class="input-group-prepend">
                <span class="input-group-text navy-bg-dark">ชื่อรางวัล</span>
            </div>
                <input type="text" name="title" class="form-control" placeholder="กรอกชื่อรางวัล" value="<?= $item_record['item_title']; ?>" required>
        </div>

        <div class="input-group  mb-3 col-lg-4">
        <div class="input-group-prepend">
            <span class="input-group-text navy-bg-dark">ประเภทรางวัล</span>
        </div>
            <select name="type" class="custom-select">
                <option value="type_1" <?php if($item_record['item_type'] == 'type_1'){echo 'selected';} ?> >type_1</option>
                <option value="type_2" <?php if($item_record['item_type'] == 'type_2'){echo 'selected';} ?> >type_2</option>
                <option value="type_3" <?php if($item_record['item_type'] == 'type_3'){echo 'selected';} ?> >type_3</option>
            </select>
        </div>

        <div class="input-group ml-3 mr-3">
            <div class="input-group-prepend">
                <span class="input-group-text navy-bg-dark">รายละเอียดรางวัล</span>
            </div>
                <textarea class="form-control" name="detail" aria-label="With textarea" style="min-height:130px;max-height:130px;height:130px;"><?= $item_record['item_detail']; ?></textarea>
        </div>

      </div>
      <div class="modal-footer">
        <div class="input-group col-6 mr-auto">
            <div class="input-group-prepend">
                <span class="input-group-text navy-bg-dark">ราคารางวัล</span>
            </div>
                <input type="number" name="price" class="form-control" placeholder="กรอกราคารางวัล" value="<?= $item_record['item_price']; ?>" required>
        </div>
        <input type="hidden" name="imgname" value="<?= $item_record['item_img']; ?>">
        <button type="submit" name="edit" value="<?= $item_record['item_id']; ?>" class="btn btn-success">ยืนยันการแก้ไข</button>
</form>

<?php

if(isset($_POST['edit'])){

    if(empty($_POST['title'])){
        $title = 'กรุณากรอกชื่อสินค้า'; $text = 'กรุณากรอกชื่อสินค้า...'; $delay = '3000'; $link = 'main.php?page=reward';
        msg_error($title,$text,$delay,$link);
    }elseif(empty($_POST['type'])){
        $title = 'กรุณาเลือกประเภทสินค้า'; $text = 'กรุณาเลือกประเภทสินค้า...'; $delay = '3000'; $link = 'main.php?page=reward';
        msg_error($title,$text,$delay,$link);
    }elseif(empty($_POST['detail'])){
        $title = 'กรุณากรอกรายละเอียดสินค้า'; $text = 'กรุณากรอกรายละเอียดสินค้า...'; $delay = '3000'; $link = 'main.php?page=reward';
        msg_error($title,$text,$delay,$link);
    }elseif($_POST['price'] < 0 OR empty($_POST['price'])){
        $title = 'กรุณาใส่ราคาสินค้ามากกว่า 0 !'; $text = 'กรุณาใส่ราคาสินค้ามากกว่า...'; $delay = '3000'; $link = 'main.php?page=reward';
        msg_error($title,$text,$delay,$link);
    }else{

        $namea = bin2hex(random_bytes(16)).'_item'.$_POST['edit'].'.jpg';
        function Upload($file,$path="./assets/img/reward_img/"){
            global $namea;
            $newfilename= $namea.str_replace("", "", basename($_FILES["file"]["name"]));
            if(@copy($file['tmp_name'],$path.$newfilename)){
                @chmod($path.$file,0777);
                return $newfilename;
            }else{
                return false;
            }
        }

        if($_FILES["imgfile"]["error"] != 0){

            $id_data = $_POST['edit'];
            $title = $_POST['title'];
            $type = $_POST['type'];
            $detail = $_POST['detail'];
            $price = $_POST['price'];
            $sqlitem = "UPDATE reward_item SET item_title = '".$title."' , item_detail = '".$detail."' , item_price = '".$price."' , item_type = '".$type."' WHERE item_id = $id_data";
            $query_item = mysqli_query($conn,$sqlitem);

            $title = 'แก้ไขรางวัลเสร็จสิ้น'; $text = 'กำลังอัพเดทรางวัล...'; $delay = '3000'; $link = 'main.php?page=reward';
            msg_success($title,$text,$delay,$link);

        }else{

            $id_data = $_POST['edit'];
            $imgfile = Upload($_FILES['imgfile']);
            $title = $_POST['title'];
            $type = $_POST['type'];
            $detail = $_POST['detail'];
            $price = $_POST['price'];
            $sql = "UPDATE reward_item SET item_title = '$title' , item_detail = '$detail' , item_price = '$price' , item_img = '$imgfile' , item_type = '$type' WHERE item_id = $id_data";
            $query_img = mysqli_query($conn,$sql);

            $title = 'แก้ไขรางวัลเสร็จสิ้น'; $text = 'กำลังอัพเดทรางวัล...'; $delay = '3000'; $link = 'main.php?page=reward';
            msg_success($title,$text,$delay,$link);

            unlink('./assets/img/reward_img/'.$_POST['imgname']);
        }
    }
}

?>
        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>    
</div>
<script type="text/javascript">
$(function(){
 
    $("#img<?= $item_record['item_id']; ?>").on("change",function(){var _fileName = $(this).val();$(this).next("label").text(_fileName);});
 
});
</script>
<?php }while ($item_record = mysqli_fetch_array($item_query)); } ?>


</div>

<div class="mt-3">
<nav aria-label="Page navigation example">
<?php 
    $backpage = $_GET['rewardpage']-1;
    $nextpage = $_GET['rewardpage']+1;
?>
	<ul class="pagination justify-content-center">
        <li class="page-item"><a class="<?php if($_GET['rewardpage'] <= 1){ echo 'navy-page-link-dark-disabled';}else{ echo 'navy-page-link-dark';} ?>" <?php if($_GET['rewardpage'] <= 1){ echo '';}else{ echo 'href="?page=reward&rewardpage='.$backpage.'"';} ?>>ก่อนหน้า</a></li>
        <?php for($i=1;$i<=$total_page;$i++){ ?>
        <li class="page-item"><a class="<?php if($_GET['rewardpage'] == $i){ echo 'navy-page-link-dark-active';}else{ echo 'navy-page-link-dark';} ?>" href="?page=reward&rewardpage=<?= $i; ?>"><?= $i; ?></a></li>
        <?php } ?>
		<li class="page-item"><a class="<?php if($_GET['rewardpage'] >= $total_page){ echo 'navy-page-link-dark-disabled';}else{ echo 'navy-page-link-dark';} ?>" <?php if($_GET['rewardpage'] >= $total_page){ echo '';}else{ echo 'href="?page=reward&rewardpage='.$nextpage.'"';} ?>>หน้าถัดไป</a></li>
	</ul>
</nav>
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