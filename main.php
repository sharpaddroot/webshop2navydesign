<?php 
    include("system/user_record.php");
    include('system/head.php'); 
?>
</head>
<body>
<?php 
if($user_record['level'] == 7){
    include('system/nav_admin.php'); 
}else{
    include('system/nav.php'); 
}
?>
<div class="container mt-5 pt-5">
    <div class="row">
    <div class="col-lg-9">
    <div class="card bg-white mb-5 navy-shadow-dark">
    <div class="card-body">

    <?php 
        error_reporting(0);
        if($user_record['level'] == 7){
    ?>
            <nav aria-label="breadcrumb">
            <span class="badge badge-dark mb-2 p-2" style="font-size:1rem;">คลิ๊กเมนูด้านล่างเพื่อดูมุมมองแบบ ผู้ใช้งานทั่วไป</span>
            <ol class="breadcrumb">
                <li class="breadcrumb-item" <?php if($_GET['page'] == 'phome'){echo 'style="opacity:0.5 !important;"';} ?>> <a href="main.php?page=phome">หน้าแรก</a></li>
                <li class="breadcrumb-item" <?php if($_GET['page'] == 'pshop'){echo 'style="opacity:0.5 !important;"';} ?>> <a href="main.php?page=pshop">ร้านค้า</a></li>
                <li class="breadcrumb-item" <?php if($_GET['page'] == 'preward'){echo 'style="opacity:0.5 !important;"';} ?>> <a href="main.php?page=preward">แลกรางวัล</a></li>
                <li class="breadcrumb-item" <?php if($_GET['page'] == 'ppay'){echo 'style="opacity:0.5 !important;"';} ?>> <a href="main.php?page=ppay">เติมเงิน</a></li>
                <li class="breadcrumb-item" <?php if($_GET['page'] == 'pusecode'){echo 'style="opacity:0.5 !important;"';} ?>> <a href="main.php?page=pusecode">สะสมแต้ม</a></li>
                <li class="breadcrumb-item" <?php if($_GET['page'] == 'ptrade'){echo 'style="opacity:0.5 !important;"';} ?>> <a href="main.php?page=ptrade">โอนเงินให้เพื่อน</a></li>
                <li class="breadcrumb-item" <?php if($_GET['page'] == 'pcontact'){echo 'style="opacity:0.5 !important;"';} ?>> <a href="main.php?page=pcontact">ติดต่อทีมงาน</a></li>
            </ol>
            </nav>
    <?php
            if($_GET['page'] == 'general'){
                include_once('_admin/general.php');
            }elseif($_GET['page'] == 'home'){
                include_once('_admin/edithome.php');
            }elseif($_GET['page'] == 'edit'){
                include_once('_admin/editpost.php');
            }elseif($_GET['page'] == 'shop'){
                include_once('_admin/editshop.php');
            }elseif($_GET['page'] == 'reward'){
                include_once('_admin/editreward.php');
            }elseif($_GET['page'] == 'user'){
                include_once('_admin/edituser.php');
            }elseif($_GET['page'] == 'code'){
                include_once('_admin/editcode.php');
            }elseif($_GET['page'] == 'contact'){
                include_once('_admin/editcontact.php');
            }elseif($_GET['page'] == 'pay'){
                include_once('_admin/editpay.php'); 


            }elseif($_GET['page'] == 'phome'){
                include_once('_page/home.php');
            }elseif($_GET['page'] == 'ppay'){
                include_once('_page/pay.php');
            }elseif($_GET['page'] == 'pusecode'){
                include_once('_page/usecode.php');
            }elseif($_GET['page'] == 'ptrade'){
                include_once('_page/trade.php'); 
            }elseif($_GET['page'] == 'pcontact'){
                include_once('_page/contact.php'); 
            }elseif($_GET['page'] == 'pshop'){
                include_once('_page/shop.php');
            }elseif($_GET['page'] == 'preward'){
                include_once('_page/reward.php');

                
            }else{
                include_once('_admin/general.php'); 
            }


        }else{
            if($_GET['page'] == 'home'){
                include_once('_page/home.php');
            }elseif($_GET['page'] == 'pay'){
                include_once('_page/pay.php');
            }elseif($_GET['page'] == 'usecode'){
                include_once('_page/usecode.php');
            }elseif($_GET['page'] == 'trade'){
                include_once('_page/trade.php'); 
            }elseif($_GET['page'] == 'contact'){
                include_once('_page/contact.php'); 
            }elseif($_GET['page'] == 'shop'){
                include_once('_page/shop.php');
            }elseif($_GET['page'] == 'reward'){
                include_once('_page/reward.php');
            }else{
                include_once('_page/home.php'); 
            }
        }
    ?>

    </div>
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