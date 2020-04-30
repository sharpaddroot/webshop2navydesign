<?php  
  include("system/connect.php");
  include('system/head.php');
  $sql = "SELECT * FROM user_profile";
  $query = mysqli_query($conn, $sql);
  $total_user = mysqli_num_rows($query);

  $sql2 = "SELECT * FROM user_profile WHERE u_status = 1";
  $query2 = mysqli_query($conn, $sql2);
  $online_user = mysqli_num_rows($query2);
?>
</head>
<body>
<img src="assets/img/<?= $web_record['web_logo']; ?>" height="120px" style="animation:heartBeat 2.25s infinite;" class="rounded mx-auto d-block mt-5 mb-5">
<div class="container">
    <div class="row">
        <div class="col-lg-8">
        <div class="card navy-shadow-dark border-0">
		  <div class="card-header navy-bg-blue" style="font-size: 1.2rem;">
			<i class="fas fa-images"></i> รูปโปรโมทเว็บไซต์
		  </div>
		  <div class="card-img">
			<div id="demo" class="carousel slide" data-ride="carousel">

			  <!-- Indicators -->
			  <ul class="carousel-indicators">
				<li data-target="#demo" data-slide-to="0" class="active"></li>
				<li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
                <li data-target="#demo" data-slide-to="3"></li>
                <li data-target="#demo" data-slide-to="4"></li>
			  </ul>

			  <!-- The slideshow -->
			  <div class="carousel-inner">
				<div class="carousel-item active">
				  <img src="assets/img/slide/<?= $web_record['slide_1']; ?>" class="card-img">
				</div>
				<div class="carousel-item">
				  <img src="assets/img/slide/<?= $web_record['slide_2']; ?>" class="card-img">
				</div>
				<div class="carousel-item">
				  <img src="assets/img/slide/<?= $web_record['slide_3']; ?>" class="card-img">
                </div>
                <div class="carousel-item">
				  <img src="assets/img/slide/<?= $web_record['slide_4']; ?>" class="card-img">
                </div>
                <div class="carousel-item">
				  <img src="assets/img/slide/<?= $web_record['slide_5']; ?>" class="card-img">
				</div>
			  </div>

			  <!-- Left and right controls -->
			  <a class="carousel-control-prev" href="#demo" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			  </a>
			  <a class="carousel-control-next" href="#demo" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			  </a>
			</div>
		  </div>
        </div>
        <div class="card mt-4 mb-4 navy-shadow-dark border-0">
		  <div class="card-header navy-bg-red" style="font-size: 1.2rem;">
			<i class="fab fa-youtube"></i> วิดีโอโปรโมทเว็บไซต์
		  </div>
		  <div class="card-img">
			<div class="embed-responsive embed-responsive-16by9">
			  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $web_record['youtube_clip']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
        </div>
        </div>

        </div>
        <div class="col-lg-4">

            <div class="card text-white mb-3 navy-shadow-dark border-0">
            <div class="card-header bg-dark text-center">ยินดีต้อนรับสู่ <?= $web_record['web_name']; ?></div>
            <div class="card-body">
              <a href="login.php"><button type="button" class="btn btn-success w-100"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</button></a>
              <a href="regis.php"><button type="button" class="btn btn-danger mt-2 w-100"><i class="fas fa-edit"></i> สมัครสมาชิก</button></a>
            </div>
            </div>

            
            <div class="card mb-3 navy-shadow-dark border-0">
            <div class="card-header navy-bg-green"><i class="fas fa-server"></i> สถานะเซิฟเวอร์</div>
            <div class="card-body">
                <b>Domain :</b> <?= $web_record['web_domain']; ?></p>
                <b>Version :</b> <?= $web_record['web_version']; ?></p>
                <b>Status :</b> <?php if($web_record['web_status'] == 1){ ?>
                  <span style="font-size:0.8rem;" class="badge badge-success p-2">กำลังเปิดให้บริการ <i class="fas fa-sync-alt" style="animation: rotateOut 1.5s infinite;" ></i></span>
                <?php }elseif($web_record['web_status'] == 2){ ?>
                  <span style="font-size:0.8rem;" class="badge badge-danger p-2">ยังไม่เปิดให้บริการ <i class="fas fa-sync-alt" style="animation: rotateOut 1.5s infinite;" ></i></span>
                <?php }elseif($web_record['web_status'] == 3){ ?>
                  <span style="font-size:0.8rem;" class="badge badge-warning p-2">กำลังปิดปรับปรุง <i class="fas fa-sync-alt" style="animation: rotateOut 1.5s infinite;" ></i></span>
                <?php }else{ ?>
                  <span style="font-size:0.8rem;" class="badge badge-dark p-2">ไม่สามารถระบุสถานะได้ <i class="fas fa-sync-alt" style="animation: rotateOut 1.5s infinite;" ></i></span>
                <?php } ?>

            </div>
            </div>

            <div class="card mb-3 navy-shadow-dark border-0">
            <div class="card-header navy-bg-perple">ผู้ใช้งานที่ออนไลน์ <span style="font-size:0.8rem;" class="badge badge-light float-right mt-1"><?= $online_user; ?> / <?= $total_user; ?></span></div>
            <div class="card-body p-0 pl-3 pr-3" style="max-height:200px;overflow: scroll;height:200px;">
<?php
      $strSQL = "SELECT * FROM user_profile WHERE u_status = 1";
      $online_query = mysqli_query($conn,$strSQL);
      $online_record = mysqli_fetch_array($online_query);
if($online_user <= 0){
?>
              <div class="row w-100 mt-5">
                <h5 class="ml-5"><b>ไม่มีคนออนไลน์ในเว็บไซต์ในขณะนี้</b></h5>
              </div>
<?php 
}else{
      do {
?>
                <div class="row mt-2">
                    <div class="col-1"><img src="assets/img/none.png" class="navy-icon-profile"  style="background:url(assets/img/user_img/<?php if(empty($online_record['user_img'])){echo 'none.jpg';}else{echo $online_record['user_img'];}?>) no-repeat center center;background-size: cover;"></div>
                    <div class="col-6 ml-3 mt-1 h5"><?= $online_record['u_name']; ?></div>
                    <div class="col-4"><?php if($online_record['level'] == 7){ echo '<span style="font-size:0.8rem;" class="mt-2 badge badge-warning p-1 w-100"><i class="fas fa-crown"></i> ADMIN</span>';}else{echo '<span style="font-size:0.8rem;" class="mt-2 badge badge-danger p-1 w-100"><i class="fas fa-user"></i> USER</span>';} ?></div>
                </div>
<?php }while($online_record = mysqli_fetch_array($online_query)); }?>
            </div>
            </div>

            <div class="card mb-3 navy-shadow-dark border-0" style="max-width: 500px;">
		    <div class="card-header bg-primary text-white"><i class="fab fa-facebook-f"></i> Facebook</div>
			<div class="card-body p-0 m-0" style="height:130px;">
				<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2F<?= $web_record['fp_facebook']; ?>&tabs&width=500&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" height="130" style="border:none;overflow:hidden;width:100%;" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
		    </div>
            </div>

            <div class="card mb-3 navy-shadow-dark" style="border-radius:10px;opacity:0.8;">
			<div class="card-body p-2 m-0 text-center" style="height:83px;font-size:0.8rem;">
                <i class="far fa-copyright"></i> Copyright 2020 Website By <a href="https://www.facebook.com/nanydesignpage" class="text-primary" target="_blank"><b><u>NAVy DESIGn</u></b></a> All Rights Reserved.</br> <b class="navy-text-red">(แจกฟรีแล้วก็ให้ Cradit กันหน่อยนะจ๊ะ ^^)</b>
		    </div>
            </div>
            
        </div>
    </div>
</div>
</body>
</html>