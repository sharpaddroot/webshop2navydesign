<h3 class=" m-2 mt-4"><i class="fas fa-users-cog"></i> <b>จัดการผู้ใช้งาน</b></h3>
<hr class="border-dark">

<div class="row mb-3">
  
<?php
    $perpage = 10;

    $sql2 = "SELECT * FROM user_profile";
    $query2 = mysqli_query($conn, $sql2);
    $total_record = mysqli_num_rows($query2);
    $total_page = ceil($total_record / $perpage);
    $limit_page = $total_page;

    if (isset($_GET['userpage'])) {
        $page = $_GET['userpage'];
    } else {
        $page = 1;
    }

    if(empty($_GET['userpage'])){
        $page = 1;
    }
    if($_GET['userpage'] > $limit_page){
        $page = 1;
        $title = 'การแสดงผลผิดพลาด!'; $text = 'กรุณาตรวจสอบการเชื่อมโยงข้อมูล...'; $delay = '3000'; $link = 'main.php?page=user';
        msg_error($title,$text,$delay,$link);
    }

    $start = ($page - 1) * $perpage;

    $strSQL = "SELECT * FROM user_profile ORDER BY id DESC LIMIT {$start} , {$perpage}";
    $my_query = mysqli_query($conn,$strSQL);
    $my_record = mysqli_fetch_array($my_query);
?>
</div>


<div class="row no-gutters">
<table id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm text-center" cellspacing="0"
  width="100%">
  <thead class="thead-dark">
    <tr>
      <th class="th-sm">ไอดี</th>
      <th class="th-sm">ชื่อผู้ใช้</th>
      <th class="th-sm">อีเมล</th>
      <th class="th-sm">ระดับ</th>
      <th class="th-sm">สถานะ</th>
      <th class="th-sm">ตัวเลือก</th>
    </tr>
  </thead>
  <tbody>
<?php do { ?>
    <tr>
      <td><?= $my_record['id']; ?></td>
      <td><?= $my_record['u_name']; ?></td>
      <td><?= $my_record['e_mail']; ?></td>
      <td>
        <?php if($my_record['level'] == 7){ ?>
            <span class="badge badge-dark text-warning mt-1"><i class="fas fa-crown"></i> ADMIN</span>
        <?php }elseif($my_record['level'] == 0){ ?>
            <span class="badge badge-primary mt-1"><i class="fas fa-user"></i> USER</span>
        <?php }else{ ?>
            <span class="badge badge-warning mt-1">บัญชีมีปัญหา</span>
        <?php } ?>
      </td>
      <td>
        <?php if($my_record['u_status'] == 0){ ?>
            <span class="badge badge-secondary mt-1">OFFLINE</span>
        <?php }elseif($my_record['u_status'] == 1){ ?>
            <span class="badge badge-success mt-1">ONLINE</span>
        <?php }elseif($my_record['u_status'] == 9){ ?>
            <span class="badge badge-danger mt-1">Banned</span>
        <?php }else{ ?>
            <span class="badge badge-warning mt-1">บัญชีมีปัญหา</span>
        <?php } ?>
      </td>
      <td>
        <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#exampleModalCenter<?= $my_record['id']; ?>"><i class="fas fa-wrench"></i> ปรับแต่ง</button>
        <?php if($my_record['u_status'] != 9){ ?>
          <button type="button" class="btn btn-outline-danger btn-sm mt-2 mt-md-0" data-toggle="modal" data-target="#ban<?= $my_record['id']; ?>"><i class="fas fa-ban"></i> แบนผู้ใช้</button>
        <?php }else{ ?>
          <button type="button" class="btn btn-outline-warning btn-sm mt-2 mt-md-0" data-toggle="modal" data-target="#unban<?= $my_record['id']; ?>"><i class="fas fa-key"></i> ปลดแบน</button>
        <?php } ?>

            <!--UNBAN Modal -->
            <div class="modal fade" id="unban<?= $my_record['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalCenterTitle">ผู้ใช้ : <?= $my_record['u_name']; ?></h5>
                </div>
                <div class="modal-body text-center">
                    <h1 class="p-0 m-0 text-secondary" style="font-size:8rem;"><i class="far fa-question-circle" style="animation: pulse 1.5s infinite;"></i></h1>
                    <h4 class="mt-4">คุณต้องการปลดแบนผู้ใช้นี้ใช่หรือไม่</h4>
                    <font class="text-secondary" style="font-size:0.8rem;opacity:0.6;">SID : <?= $my_record['U_SID']; ?></font>
                </div>
                <div class="modal-footer">
                <?php if($my_record['level'] == 0){ ?>
                <form method="POST">
                    <button type="submit" name="unbanuser" value="<?= $my_record['id']; ?>" class="btn btn-success">ปลดแบนผู้ใช้ที่ <?= $my_record['id']; ?></button>
                </form>
                <?php } ?>
            <?php
              if(isset($_POST['unbanuser']))
              {
                  $my_id = $_POST['unbanuser'];
                  $del = "UPDATE user_profile SET u_status = 0 WHERE id =  $my_id";
                  $my_del = mysqli_query($conn,$del);

                  $title = 'ทำการปลดแบนผู้ใช้เสร็จสิ้น!'; $text = 'ระบบกำลังอัพเดทข้อมูล...'; $delay = '3000'; $link = 'main.php?page=user';
                  msg_success($title,$text,$delay,$link);
              }
            ?>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                </div>
                </div>
            </div>
            </div>
            <!-- END UNBAN Modal -->


            <!--BAN Modal -->
            <div class="modal fade" id="ban<?= $my_record['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalCenterTitle">ผู้ใช้ : <?= $my_record['u_name']; ?></h5>
                </div>
                <div class="modal-body text-center">
                    <h1 class="p-0 m-0 text-secondary" style="font-size:8rem;"><i class="far fa-question-circle" style="animation: pulse 1.5s infinite;"></i></h1>
                    <h4 class="mt-4">คุณต้องการแบนผู้ใช้นี้ใช่หรือไม่</h4>
                    <font class="text-secondary" style="font-size:0.8rem;opacity:0.6;">SID : <?= $my_record['U_SID']; ?></font>
                </div>
                <div class="modal-footer">
                <?php if($my_record['level'] == 0){ ?>
                <form method="POST">
                    <button type="submit" name="banuser" value="<?= $my_record['id']; ?>" class="btn btn-danger">แบนผู้ใช้ที่ <?= $my_record['id']; ?></button>
                </form>
                <?php }else{ ?>
                    <button type="button" class="btn btn-danger disabled">ไม่สามารถแบนผู้ใช้นี้ได้</button>
                <?php } ?>
            <?php
              if(isset($_POST['banuser']))
              {
                  $my_id = $_POST['banuser'];
                  $del = "UPDATE user_profile SET u_status = 9 WHERE id =  $my_id";
                  $my_del = mysqli_query($conn,$del);

                  $title = 'ทำการแบนผู้ใช้เสร็จสิ้น!'; $text = 'ระบบกำลังอัพเดทข้อมูล...'; $delay = '3000'; $link = 'main.php?page=user';
                  msg_success($title,$text,$delay,$link);
              }
            ?>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">ยกเลิก</button>
                </div>
                </div>
            </div>
            </div>
            <!-- END BAN Modal -->
      </td>
    </tr>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter<?= $my_record['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-pen-square"></i><b> ปรับแต่งผู้ใช้ : <?= $my_record['u_name']; ?></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row no-gutters">

      <div class="media">
        <img src="assets/img/none.png" class="lign-self-center navy-img-profile-md " style="border-radius: 100%;background:url(assets/img/user_img/<?php if(empty($my_record['user_img'])){echo 'none.jpg';}else{echo $my_record['user_img'];}?>) no-repeat center center;background-size: cover;">
        <div class="media-body ml-4">
            USERNAME : <b><?= $my_record['u_name']; ?></b></br>
            E-mail : <b><?= $my_record['e_mail']; ?></b></br>
            SID : <b style="font-size:0.7rem;"><?= $my_record['U_SID']; ?></b></br>
            <div class="input-group input-group-sm mt-3">
            <div class="input-group-prepend">
<form method="POST">
                <span class="input-group-text navy-bg-dark">POINT</span>
            </div>
                <input type="number" name="point" class="form-control" placeholder="จำนวน POINT" value="<?= $my_record['point']; ?>" required>
            </div>
            <div class="input-group input-group-sm mt-2">
            <div class="input-group-prepend">
                <span class="input-group-text navy-bg-dark">REWARD</span>
            </div>
                <input type="number" name="reward" class="form-control" placeholder="จำนวน REWARD" value="<?= $my_record['reward']; ?>" required>
            </div>
            <div class="input-group input-group-sm mt-2 mb-4">
            <div class="input-group-prepend">
                <label class="input-group-text navy-bg-perple">ระดับ</label>
            </div>
            <select name="level" class="custom-select">
                <option value="0" <?php if($my_record['level'] == 0){echo 'selected';} ?> >ผู้ใช้งานทั่วไป</option>
                <option value="7" <?php if($my_record['level'] == 7){echo 'selected';} ?> >ผู้ดูแลระบบ</option>
            </select>
            </div>


        </div>
       </div>
            

      </div>
      <div class="modal-footer">
        <button type="submit" name="saveuser" value="<?= $my_record['id']; ?>" class="btn btn-sm btn-success">ยืนยันการแก้ไข</button>
</form>
<?php

if(isset($_POST['saveuser'])){

    if($_POST['point'] <= -1){
        $title = 'กรุณากรอก POINT ให้เท่ากับหรือมากกว่า 0!'; $text = 'กรุณากรอก POINT ให้เท่ากับหรือมากกว่า 0!...'; $delay = '3000'; $link = 'main.php?page=user';
        msg_error($title,$text,$delay,$link);
    }elseif($_POST['reward'] <= -1){
        $title = 'กรุณากรอก REWARD ให้เท่ากับหรือมากกว่า 0!'; $text = 'กรุณากรอก REWARD ให้เท่ากับหรือมากกว่า 0!...'; $delay = '3000'; $link = 'main.php?page=user';
        msg_error($title,$text,$delay,$link);
    }else{

        $id_data = $_POST['saveuser'];
        $newpoint = $_POST['point'];
        $newreward = $_POST['reward'];
        $level = $_POST['level'];

        $sql = "UPDATE user_profile SET point = '$newpoint' , reward = '$newreward' , level = '$level' WHERE id = $id_data";
        $query_img = mysqli_query($conn,$sql);

        $title = 'แก้ไขผู้ใช้เสร็จสิ้น'; $text = 'กำลังอัพเดทบัญชี...'; $delay = '3000'; $link = 'main.php?page=user';
        msg_success($title,$text,$delay,$link);
    }

}

?>
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>    
</div>
<?php }while ($my_record = mysqli_fetch_array($my_query)); ?>

</tbody>
</table>
</div>
</div>



<div class="mt-3">
<nav aria-label="Page navigation example">
<?php 
    $backpage = $_GET['userpage']-1;
    $nextpage = $_GET['userpage']+1;
?>
	<ul class="pagination justify-content-center">
        <li class="page-item"><a class="<?php if($_GET['userpage'] <= 1){ echo 'navy-page-link-dark-disabled';}else{ echo 'navy-page-link-dark';} ?>" <?php if($_GET['userpage'] <= 1){ echo '';}else{ echo 'href="?page=user&userpage='.$backpage.'"';} ?>>ก่อนหน้า</a></li>
        <?php for($i=1;$i<=$total_page;$i++){ ?>
        <li class="page-item"><a class="<?php if($_GET['userpage'] == $i){ echo 'navy-page-link-dark-active';}else{ echo 'navy-page-link-dark';} ?>" href="?page=user&userpage=<?= $i; ?>"><?= $i; ?></a></li>
        <?php } ?>
		<li class="page-item"><a class="<?php if($_GET['userpage'] >= $total_page){ echo 'navy-page-link-dark-disabled';}else{ echo 'navy-page-link-dark';} ?>" <?php if($_GET['userpage'] >= $total_page){ echo '';}else{ echo 'href="?page=user&userpage='.$nextpage.'"';} ?>>หน้าถัดไป</a></li>
	</ul>
</nav>
<script>
$(document).ready(function () {
$('#dtVerticalScrollExample').DataTable({
"scrollY": "200px",
"scrollCollapse": true,
});
$('.dataTables_length').addClass('bs-select');
});
</script>