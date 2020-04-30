<?php
include_once('system/connect.php');
if(empty($_GET['postId'])){
    $title = 'การแสดงผลผิดพลาด!'; $text = 'กรุณาตรวจสอบการเชื่อมโยงข้อมูล...'; $delay = '3000'; $link = 'main.php';
    msg_error($title,$text,$delay,$link);
}
$id = $_GET['postId'];
$check = "SELECT * FROM news WHERE p_id = '$id'";
$post_query = mysqli_query($conn,$check);
$num = mysqli_num_rows($post_query); 
if($num <= 0){
    $title = 'การแสดงผลผิดพลาด!'; $text = 'กรุณาตรวจสอบการเชื่อมโยงข้อมูล...'; $delay = '3000'; $link = 'main.php';
    msg_error($title,$text,$delay,$link);
}else{
    $post_record = mysqli_fetch_array($post_query);
}
?>
<?php 
    include("system/user_record.php");
    include('system/head.php'); 
?>
</head>
<body>
<?php include('system/nav.php'); ?>
<div class="container mt-5 pt-5">
    <div class="row">
    <div class="col-lg-9" style="height:1124px;">
    <div class="card bg-light h-100  mb-5 navy-shadow-dark" style="overflow: scroll;">
        <h4 class="m-2 mt-4 ml-4"><i class="fas fa-chevron-right"></i> <b><i><?php if(empty($post_record['p_head'])){echo '';}else{ echo $post_record['p_head'];} ?></i></b></h4>
        <hr class="border-dark ml-4 mr-4">
        <a href=""><img src="assets/img/post_img/<?= $post_record['p_img']; ?>" class="card-img-top pl-4 pr-4"></a>
        <span class="m-2 mt-4 ml-4" style="font-size:1.1rem;"><b>ข้อมูลรายละเอียด</b>
        <font class="text-muted float-right pt-1 mr-4" style="font-size:0.8rem;"><i class="fas fa-history"></i> อัพโหลดเมื่อ <?= $post_record['p_date']; ?></font></span>
        <hr class="border-dark ml-4 mr-4 mt-1" style="opacity:0.5;">
        <p class="ml-4 mr-4 card-text"><?php if(empty($post_record['p_detail'])){echo '';}else{ echo $post_record['p_detail'];} ?></p>
    </div>
    </div>
    <div class="col-lg-3">
        <div class="card bg-light mb-3 border-0 navy-shadow-dark order-md-first">
        <div class="card-header bg-dark text-white"><i class="fas fa-user"></i> ข้อมูลของ <?php if(empty($user_record['u_name'])){echo '';}else{echo $user_record['u_name'];} ?></div>
        <div class="card-body">
        <table>
            <tr>
                <td class="text-right">POINT :</td>
                <td class="pl-1"><span class="badge badge-danger"><?php if(empty($user_record['u_name'])){echo '';}else{echo number_format($user_record['point'],2);} ?></span> POINTS</td>
            </tr>
            <tr>
                <td class="text-right">แต้มสะสม :</td>
                <td class="pl-1"><span class="badge badge-success"><?php if(empty($user_record['u_name'])){echo '';}else{echo number_format($user_record['reward'],2);} ?></span> แต้ม</td>
            </tr>
        </table>
        </div>
        </div>
        
        <div class="card mb-3 navy-shadow-dark border-0" style="max-width: 500px;">
		    <div class="card-header bg-primary text-white"><i class="fab fa-facebook-f"></i> Facebook</div>
			<div class="card-body p-0 m-0" style="height:500px;">
				<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2F<?= $web_record['fp_facebook']; ?>%2F&tabs=timeline&width=255&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" height="500" style="border:none;overflow:hidden;width:100%;" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
		    </div>
        </div>

    </div>
    </div>
</div>
</body>
</html>