<h3 class=" m-2 mt-4"><i class="fas fa-qrcode"></i> <b>จัดการโค๊ดรางวัล</b></h3>
<hr class="border-dark">


<?php
    $perpage = 8;

    $sql2 = "SELECT * FROM gift_code";
    $query2 = mysqli_query($conn, $sql2);
    $total_record = mysqli_num_rows($query2);
    $total_page = ceil($total_record / $perpage);
    $limit_page = $total_page;

    if (isset($_GET['codepage'])) {
        $page = $_GET['codepage'];
    } else {
        $page = 1;
    }

    if(empty($_GET['codepage'])){
        $page = 1;
    }
    if($_GET['codepage'] > $limit_page){
        $page = 1;
        $title = 'การแสดงผลผิดพลาด!'; $text = 'กรุณาตรวจสอบการเชื่อมโยงข้อมูล...'; $delay = '3000'; $link = 'main.php?page=code';
        msg_error($title,$text,$delay,$link);
    }

    $start = ($page - 1) * $perpage;

    $strSQL = "SELECT * FROM gift_code ORDER BY id DESC LIMIT {$start} , {$perpage}";
    $my_query = mysqli_query($conn,$strSQL);
    $my_record = mysqli_fetch_array($my_query);
?>


<button type="button" class="btn btn-sm btn-secondary">
 <i class="fas fa-qrcode"></i> มีโค๊ดในระบบทั้งหมด <span class="badge badge-light"><?= number_format($total_record,0); ?></span>
</button>
<button type="button" class="btn btn-danger btn-sm  float-right" data-toggle="modal" data-target="#newscode"><i class="fas fa-plus"></i> สร้างโค๊ดรางวัลเพิ่ม</button>
<!-- Modal -->
<div class="modal fade" id="newscode" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-qrcode"></i> เพิ่มโค๊ดรางวัล</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="fas fa-times text-white" aria-hidden="true"></i>
        </button>
      </div>
      <div class="modal-body">
        <h1 class="text-center"><i class="fas fa-qrcode" style="animation: rotateOut 1.5s infinite;"></i> GENERATE CODE <i class="fas fa-qrcode" style="animation: rotateOut 1.5s infinite;"></i></h1>
<form method="POST">
        <div class="input-group flex-nowrap mt-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-dark text-white">กรอกจำนวนแต้ม</span>
            </div>
            <input type="number" name="codepoint" class="form-control" placeholder="กรอกจำนวนแต้ม">
        </div>
        <div class="input-group flex-nowrap mt-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-dark text-white">กรอกจำนวนโค๊ด</span>
            </div>
            <input type="number" name="codenumber" class="form-control" placeholder="กรอกจำนวนโค๊ด" value="1">
        </div>

      </div>
      <div class="modal-footer">
        <button type="submit" name="test" class="btn btn-success">ยืนยันการสร้างโค๊ดรางวัล</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
<?php
if(isset($_POST['test']))
{
  if(empty($_POST['codepoint'])){
    $title = 'จำนวนแต้ม ว่างไม่ได้!'; $text = 'กรุณากรอก จำนวนแต้ม!'; $delay = '3000'; $link = 'main.php?page=code';
    msg_error($title,$text,$delay,$link);
  }elseif(empty($_POST['codenumber'])){
    $title = 'จำนวนโค๊ด ว่างไม่ได้!'; $text = 'กรุณากรอก จำนวนโค๊ด!'; $delay = '3000'; $link = 'main.php?page=code';
    msg_error($title,$text,$delay,$link);
  }elseif($_POST['codepoint'] <= 0){
    $title = 'จำนวนแต้ม ต้องมากกว่า 0 !'; $text = 'กรุณากรอก จำนวนแต้ม ต้องมากกว่า 0 !'; $delay = '3000'; $link = 'main.php?page=code';
    msg_error($title,$text,$delay,$link);
  }elseif($_POST['codenumber'] <= 0){
    $title = 'จำนวนโค๊ด ต้องมากกว่า 0 !'; $text = 'กรุณากรอก จำนวนโค๊ด ต้องมากกว่า 0 !'; $delay = '3000'; $link = 'main.php?page=code';
    msg_error($title,$text,$delay,$link);
  }else{

    $c = $_POST['codenumber'];
    for($i=0; $i<$c; $i++){

        $code = bin2hex(random_bytes(16));
        $code_point= $_POST['codepoint'];
        $sql = "INSERT INTO gift_code ( reward_code, reward_point) VALUES ('$code','$code_point')";
        $query = mysqli_query($conn,$sql); 
        if($query) {
            $title = 'สร้าง '.$c.' โค๊ดรางวัลเสร็จสิ้น!'; $text = 'ระบบกำลังบันทึกข้อมูล...'; $delay = '3000'; $link = 'main.php?page=code';
            msg_success($title,$text,$delay,$link);
        }
    }
  }
}
?>
      </div>
</form>
    </div>
  </div>
</div>
<!-- END Modal -->

<div class="row no-gutters mt-3">
<table id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm text-center" cellspacing="0"
  width="100%">
  <thead class="thead-dark">
    <tr>
      <th class="th-sm">ไอดี</th>
      <th class="th-sm">โค๊ดรางวัล</th>
      <th class="th-sm">แต้ม</th>
      <th class="th-sm">ตัวเลือก</th>
    </tr>
  </thead>
  <tbody>
<?php do { ?>
    <tr>
      <td><?= $my_record['id']; ?></td>
      <td><?= $my_record['reward_code']; ?></td>
      <td><?= number_format($my_record['reward_point'],0); ?></td>
      <td><button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delcode<?= $my_record['id']; ?>"><i class="fas fa-trash-alt"></i> ลบโค๊ดนี้</button></td>
    </tr>
    <!-- Modal -->
    <div class="modal fade" id="delcode<?= $my_record['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header bg-danger text-white">
            <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-info"></i> คำเตือนจากระบบ</h5>
        </div>
        <div class="modal-body text-center">
            <h1 class="p-0 m-0 text-secondary" style="font-size:8rem;"><i class="far fa-question-circle" style="animation: pulse 1.5s infinite;"></i></h1>
            <h4 class="mt-4">คุณต้องลบโค็ดนี้ใช่หรือไม่</h4>
            <font class="text-secondary" style="opacity:0.6;">Code : <?= $my_record['reward_code']; ?></br>REWARD : <?= number_format($my_record['reward_point'],0); ?></font>
        </div>
        <div class="modal-footer">
        <form method="POST">
            <button type="submit" name="delcode" value="<?= $my_record['id']; ?>" class="btn btn-danger">ฉันต้องการที่จะลบ</button>
        </form>
<?php
    if(isset($_POST['delcode']))
    {
        $my_id = $_POST['delcode'];
        $del = "DELETE FROM gift_code WHERE id =  $my_id";
        $my_del = mysqli_query($conn,$del);

        $title = 'ทำการลบโค๊ดเสร็จสิ้น!'; $text = 'ระบบกำลังอัพเดทข้อมูล...'; $delay = '3000'; $link = 'main.php?page=code';
        msg_success($title,$text,$delay,$link);
    }
?>
            <button type="button" class="btn btn-primary" data-dismiss="modal">ไม่ต้องการลบ</button>
        </div>
        </div>
    </div>
    </div>
    <!-- END Modal -->
<?php }while ($my_record = mysqli_fetch_array($my_query)); ?>

</tbody>
</table>
</div>
</div>



<div class="mt-3">
<nav aria-label="Page navigation example">
<?php 
    $backpage = $_GET['codepage']-1;
    $nextpage = $_GET['codepage']+1;
?>
	<ul class="pagination justify-content-center">
        <li class="page-item"><a class="<?php if($_GET['codepage'] <= 1){ echo 'navy-page-link-dark-disabled';}else{ echo 'navy-page-link-dark';} ?>" <?php if($_GET['codepage'] <= 1){ echo '';}else{ echo 'href="?page=code&codepage='.$backpage.'"';} ?>>ก่อนหน้า</a></li>
        <?php for($i=1;$i<=$total_page;$i++){ ?>
        <li class="page-item"><a class="<?php if($_GET['codepage'] == $i){ echo 'navy-page-link-dark-active';}else{ echo 'navy-page-link-dark';} ?>" href="?page=code&codepage=<?= $i; ?>"><?= $i; ?></a></li>
        <?php } ?>
		<li class="page-item"><a class="<?php if($_GET['codepage'] >= $total_page){ echo 'navy-page-link-dark-disabled';}else{ echo 'navy-page-link-dark';} ?>" <?php if($_GET['codepage'] >= $total_page){ echo '';}else{ echo 'href="?page=code&codepage='.$nextpage.'"';} ?>>หน้าถัดไป</a></li>
	</ul>
</nav>