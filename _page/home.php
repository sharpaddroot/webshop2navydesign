<ul class="nav nav-tabs border-0" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link border-0 bg-dark text-white navy-hov-dark" style="border-radius:60px;" id="home-tab" data-toggle="tab" href="#update" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-file-upload"></i> อัพเดท</a>
        </li>
        <li class="nav-item ml-2">
            <a class="nav-link border-0 bg-primary text-white navy-hov-blue" style="border-radius:60px;" id="profile-tab" data-toggle="tab" href="#event" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-calendar-week"></i> กิจกรรม</a>
        </li>
        <li class="nav-item ml-2">
            <a class="nav-link border-0 bg-danger text-white navy-hov-red" style="border-radius:60px;" id="contact-tab" data-toggle="tab" href="#promotion" role="tab" aria-controls="contact" aria-selected="false"><i class="fab fa-hotjar"></i> โปรโมชั่น</a>
        </li>
        </ul>
        <div class="tab-content" id="myTabContent">
<?php //อัพเดท ?>
        <div class="tab-pane fade show active" id="update" role="tabpanel" aria-labelledby="home-tab">
            <h3 class=" m-2 mt-4"><i class="fas fa-file-upload"></i> <b>อัพเดท</b></h3>
            <hr class="border-dark">
            <div class="row no-gutters mt-4">

<?php 
          $sql="SELECT * FROM news WHERE  p_type = 1";
          $result = mysqli_query($conn,$sql);
                      
          if(mysqli_num_rows($result)==0){ 
?>
            <h3 class=" m-2">ยังไม่มีรายการในขณะนี้</h3>
<?php
          }else{
    $strSQL = "SELECT * FROM news WHERE p_type = 1 ORDER BY p_id DESC LIMIT 9";
    $post_query = mysqli_query($conn,$strSQL);
    $post_record = mysqli_fetch_array($post_query);
do { ?>
                <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <a href="readpost.php?postId=<?= $post_record['p_id']; ?>" style="text-decoration: none;" target="_blank">
                    <div class="card bordder-0 m-2 navy-card-dark" title="<?= $post_record['p_head']; ?>">
                    <img src="assets/img/post_img/<?= $post_record['p_img']; ?>" class="card-img-top">
                    <div class="card-body p-3">
                        <b class="card-detail text-dark" style="font-size:1rem;height:20px;"><i><?= $post_record['p_head']; ?></i></b></br>
                        <div class="text-muted card-detail"><?= $post_record['p_detail']; ?></div>
                    </div>
                    <div class="text-muted text-right pt-1 pb-1 pr-3" style="font-size:0.7rem;">
                        <i class="fas fa-history"></i> อัพโหลดเมื่อ <?= $post_record['p_date']; ?>
                    </div>
                    </div>
                    </a>
                </div>
<?php }while ($post_record = mysqli_fetch_array($post_query)); }?>
            </div>
        </div>

<?php //กิจกรรม ?>
        <div class="tab-pane fade" id="event" role="tabpanel" aria-labelledby="profile-tab">
            <h3 class=" m-2 mt-4 text-primary"><i class="fas fa-calendar-week"></i> <b>กิจกรรม</b></h3>
            <hr class="border-primary">
            <div class="row no-gutters mt-4">

<?php 
          $sql="SELECT * FROM news WHERE  p_type = 2";
          $result = mysqli_query($conn,$sql);
                      
          if(mysqli_num_rows($result)==0){ 
?>
            <h3 class=" m-2">ยังไม่มีรายการในขณะนี้</h3>
<?php
          }else{
    $strSQL = "SELECT * FROM news WHERE p_type = 2 ORDER BY p_id DESC LIMIT 9";
    $post_query = mysqli_query($conn,$strSQL);
    $post_record = mysqli_fetch_array($post_query);
do { ?>
                <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <a href="readpost.php?postId=<?= $post_record['p_id']; ?>" style="text-decoration: none;" target="_blank">
                    <div class="card bordder-0 m-2 navy-card-blue" title="<?= $post_record['p_head']; ?>">
                    <img src="assets/img/post_img/<?= $post_record['p_img']; ?>" class="card-img-top">
                    <div class="card-body p-3">
                        <b class="card-detail text-primary" style="font-size:1rem;height:20px;"><i><?= $post_record['p_head']; ?></i></b></br>
                        <div class="text-muted card-detail"><?= $post_record['p_detail']; ?></div>
                    </div>
                    <div class="text-muted text-right pt-1 pb-1 pr-3" style="font-size:0.7rem;">
                        <i class="fas fa-history"></i> อัพโหลดเมื่อ <?= $post_record['p_date']; ?>
                    </div>
                    </div>
                    </a>
                </div>
<?php }while ($post_record = mysqli_fetch_array($post_query)); }?>
            </div>           
        </div>

<?php //โปรโมชั่น ?>
        <div class="tab-pane fade" id="promotion" role="tabpanel" aria-labelledby="contact-tab">
            <h3 class=" m-2 mt-4 text-danger"><i class="fab fa-hotjar"></i> <b>โปรโมชั่น</b></h3>
            <hr class="border-danger">
            <div class="row no-gutters mt-4">

<?php 
          $sql="SELECT * FROM news WHERE  p_type = 3";
          $result = mysqli_query($conn,$sql);
                      
          if(mysqli_num_rows($result)==0){ 
?>
            <h3 class=" m-2">ยังไม่มีรายการในขณะนี้</h3>
<?php
          }else{
    $strSQL = "SELECT * FROM news WHERE p_type = 3 ORDER BY p_id DESC LIMIT 9";
    $post_query = mysqli_query($conn,$strSQL);
    $post_record = mysqli_fetch_array($post_query);
do { ?>
                <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <a href="readpost.php?postId=<?= $post_record['p_id']; ?>" style="text-decoration: none;" target="_blank">
                    <div class="card bordder-0 m-2 navy-card-red" title="<?= $post_record['p_head']; ?>">
                    <img src="assets/img/post_img/<?= $post_record['p_img']; ?>" class="card-img-top">
                    <div class="card-body p-3">
                        <b class="card-detail text-danger" style="font-size:1rem;height:20px;"><i><?= $post_record['p_head']; ?></i></b></br>
                        <div class="text-muted card-detail"><?= $post_record['p_detail']; ?></div>
                    </div>
                    <div class="text-muted text-right pt-1 pb-1 pr-3" style="font-size:0.7rem;">
                        <i class="fas fa-history"></i> อัพโหลดเมื่อ <?= $post_record['p_date']; ?>
                    </div>
                    </div>
                    </a>
                </div>
<?php }while ($post_record = mysqli_fetch_array($post_query)); } ?>
            </div>
        </div>
        </div>
