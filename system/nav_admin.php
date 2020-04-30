<?php error_reporting(0); ?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark navy-shadow-dark fixed-top">
  <a class="navbar-brand" href="#"><?= $web_record['web_name']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php if($_GET['page'] == 'general'){echo 'active';} ?>">
        <a class="nav-link" href="main.php?page=general"><i class="fas fa-cogs"></i> ตั้งค่าทั่วไป <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?php if($_GET['page'] == 'home' OR $_GET['page'] == 'edit'){echo 'active';} ?>">
        <a class="nav-link" href="main.php?page=home"><i class="fas fa-home"></i> จัดการข่าวสาร</a>
      </li>
      <li class="nav-item <?php if($_GET['page'] == 'shop'){echo 'active';} ?>">
        <a class="nav-link" href="main.php?page=shop"><i class="fas fa-shopping-cart"></i> จัดการร้านค้า</a>
      </li>
<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-plus"></i> เพิ่มเติม
        </a>
        <div class="dropdown-menu navy-dw-dark navy-shadow-dark" aria-labelledby="navbarDropdown">
          <a class="dropdown-item navy-dw-dark-item p-2" <?php if($_GET['page'] == 'reward'){echo 'style="color:white !important;"';} ?> href="main.php?page=reward"><i class="fas fa-tags"></i> จัดการรางวัล</a>
          <a class="dropdown-item navy-dw-dark-item p-2" <?php if($_GET['page'] == 'user'){echo 'style="color:white !important;"';} ?> href="main.php?page=user"><i class="fas fa-users-cog"></i> จัดการผู้ใช้งาน</a>
          <a class="dropdown-item navy-dw-dark-item p-2" <?php if($_GET['page'] == 'pay'){echo 'style="color:white !important;"';} ?> href="main.php?page=pay"><i class="fas fa-coins"></i> จัดการการเติมเงิน</a>
          <a class="dropdown-item navy-dw-dark-item p-2" <?php if($_GET['page'] == 'code'){echo 'style="color:white !important;"';} ?> href="main.php?page=code"><i class="fas fa-qrcode"></i> จัดการโค๊ดรางวัล</a>
          <a class="dropdown-item navy-dw-dark-item p-2" <?php if($_GET['page'] == 'contact'){echo 'style="color:white !important;"';} ?> href="main.php?page=contact"><i class="fas fa-user-shield"></i> จัดการการติดต่อ</a>
        </div>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
    <ul class="navbar-nav mr-auto mr-5">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="assets/img/none.png" class="card-img-top navy-img-profile-sm mr-2"  style="background:url(assets/img/user_img/<?php if(empty($user_record['user_img'])){echo 'none.jpg';}else{echo $user_record['user_img'];}?>) no-repeat center center;background-size: cover;">
            ผู้ใช้งาน : <?php if(empty($user_record['u_name'])){echo '';}else{echo $user_record['u_name'];} ?>
            </a>
            <div class="dropdown-menu navy-dw-dark  navy-shadow-dark text-center" aria-labelledby="navbarDropdown" style="width:230px;">
            <a href=""><img src="assets/img/none.png" class="card-img-top navy-img-profile-md mt-3 mb-3" style="border-radius: 100%;background:url(assets/img/user_img/<?php if(empty($user_record['user_img'])){echo 'none.jpg';}else{echo $user_record['user_img'];}?>) no-repeat center center;background-size: cover;"></a></br>
            <p class="navy-text-white p-1 pb-0">POINTS : <span class="badge badge-danger"><?php echo number_format($user_record['point'],2); ?></span> POINTS</p>
            <p class="navy-text-white p-0">แต้มสะสม : <span class="badge badge-success"><?php echo number_format($user_record['reward'],2); ?></span> แต้ม</p>
            <button type="button" onclick="sid()" class="btn btn-sm btn-success w-75"><i class="fas fa-search"></i> SID ของฉัน</button>
            <a href="editprofile.php">
            <button type="button" class="btn btn-sm btn-secondary w-75 mt-2"><i class="fas fa-cog"></i> ตั้งค่าโปรไฟล์</button>
            </a>
            <form action="?logout" method="POST">
            <button type="submit" name="submit" value="logout" class="btn btn-sm btn-danger w-75 mt-2 mb-3"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</button>
            </form>
            </div>
        </li>
    </ul>
    </div>
  </div>
</nav>
<script>
    function sid(){
        swal("SID ของคุณคือ", "<?php echo $user_record['U_SID']; ?>", "success", {closeOnClickOutside: false});
    }
</script>