<h3 class=" m-2 mt-4"><i class="fas fa-user-shield"></i> <b>ติดต่อทีมงาน</b></h3>
<hr class="border-dark">
<center>
<a href="https://www.facebook.com/<?= $web_record['fp_facebook']; ?>/" target="_blank" class="badge text-white w-100 navy-contact navy-shadow-dark" style="font-size:30px;background: linear-gradient(to right, #005c97, #363795);"><i class="fab fa-facebook-square text-white"></i> <?= $web_record['fanpagefb_name']; ?></a></br>
<a href="<?= $web_record['youtube_ch']; ?>" target="_blank" class="badge text-white w-100 mt-3 navy-contact navy-shadow-dark" style="font-size:30px; background: linear-gradient(to left, #cb2d3e, #ef473a);"><i class="fab fa-youtube text-white"></i> <?= $web_record['youtube_name']; ?></a></br>
<a href="<?= $web_record['discord_link']; ?>" target="_blank" class="badge text-white w-100 mt-3 navy-contact navy-shadow-dark" style="font-size:30px; background: linear-gradient(to right, #9d50bb, #6e48aa);"><i class="fab fa-discord text-white"></i> <?= $web_record['discord_name']; ?></a>
</center>
<div class="card-img mt-3">
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