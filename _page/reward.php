<h3 class=" m-2 mt-4"><i class="fas fa-tags"></i> <b>แลกรางวัล</b></h3>
<hr class="border-dark">

<div class="row mb-3">
  
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
</div>

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
    <u><i>รายละเอียดรางวัล</i></u></br><?= $item_record['item_detail']; ?></p></div><div class='text-right'>ราคา : <b class='navy-text-green'><i> <?= number_format($item_record['item_price'],0); ?> </i></b> แต้ม</div>"></a>
        <div class="card-body p-3 text-center">
            <b style="font-size:1rem;"><?php if(strlen($item_record['item_title']) >= 18){echo substr($item_record['item_title'], 0, 18).'...';}else{echo $item_record['item_title'];} ?></b>
        </div>
        <div class="pt-1 pb-1 pr-3 ml-3 mb-2" style="font-size:0.7rem;">
            <form method="POST">
            <?php if($item_record['item_price'] < $user_record['reward']){ ?>
                <button type="submit" value="<?= $item_record['item_id']; ?>" name="check" class="btn btn-dark btn-sm w-100">ราคา <?= number_format($item_record['item_price'],0); ?> POINTS</button>
            <?php }else{?>
                <button type="submit" value="<?= $item_record['item_id']; ?>" name="check" class="btn btn-danger disabled btn-sm w-100">ราคา <?= number_format($item_record['item_price'],0); ?> POINTS</button>
            <?php } ?>
            </form>
        </div>
    </div>
</div>

<?php }while ($item_record = mysqli_fetch_array($item_query));} ?>

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


<?php

if(isset($_POST['check'])){

    if(empty($_POST['check'])){

        $title = 'รางวัลมีปัญหา กรุณาติดต่อแอดมิน'; $text = 'ขออภัยในความไม่สะดวก...'; $delay = '3000'; $link = 'main.php?page=reward&rewardpage='.$_GET['rewardpage'];
        msg_warning($title,$text,$delay,$link); 

    }else{

        $item_id = $_POST['check'];
        $item_sql="SELECT * FROM reward_item WHERE item_id = $item_id";
        $result = mysqli_query($conn,$item_sql);
                    
        if(mysqli_num_rows($result) == 1){

            $item_op = mysqli_fetch_array($result);
            $check_coin = $user_record['reward'] - $item_op['item_price'];

            if($check_coin < 0){
                $title = 'คุณมี แต้ม ไม่พอทำรายการ'; $text = 'กรุณาเติม แต้ม และกลับมาทำรายการอีกครั้ง...'; $delay = '3000'; $link = 'main.php?page=reward&rewardpage='.$_GET['rewardpage'];
                msg_error($title,$text,$delay,$link);
            }else{

                $sid = $user_record['U_SID'];
                $cynpass = $user_record['reward'] - $item_op['item_price'];
                $sqlup = "UPDATE user_profile SET reward = '".$cynpass."' WHERE U_SID = '".$sid."'";
                $query = mysqli_query($conn,$sqlup);

                $title = 'แลกรางวัลสำเร็จ'; $text = 'ระบบกำลังบันทึกและอัพเดทข้อมูล...'; $delay = '3000'; $link = 'main.php?page=reward&rewardpage='.$_GET['rewardpage'];
                msg_success($title,$text,$delay,$link);
            }

        }else{

            $title = 'รางวัลมีปัญหา กรุณาติดต่อแอดมิน'; $text = 'ขออภัยในความไม่สะดวก...'; $delay = '3000'; $link = 'main.php?page=reward&rewardpage='.$_GET['rewardpage'];
            msg_warning($title,$text,$delay,$link);

        }
    }

}

?>