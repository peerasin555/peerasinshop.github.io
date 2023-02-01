        <!-- Image Banner -->
          <div id="carouselExampleInterval" class="carousel slide shadow-dark radius-border" data-ride="carousel">
            <div class="carousel-inner radius-border">

            <?php

            $sql_select_slide_image = "SELECT * FROM image_slide ORDER BY slide_id DESC";
            $query_slide_image = $hyper->connect->query($sql_select_slide_image);
            $slide_image = mysqli_fetch_array($query_slide_image);
            $active = 1;
            do{

            ?>
              <div class="carousel-item <?php if($active == 1){echo 'active'; } ?>" data-interval="7000">
                <img src="assets/img/slide/<?= $slide_image['image_name'] ?>" class="d-block w-100" alt="...">
              </div>
            <?php $active = 0; }while ($slide_image = mysqli_fetch_array($query_slide_image)); ?>

            </div>

            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>

        </div>
        <!-- End Image Banner -->
<br>
		
			<div class="container">
<div class="recommend-category">
<div class="row mb-4 mb-md-2 mt-2">
				<div class=" col-md-6 my-3">
					<h1 class="page-text-title text-start aos-init aos-animate" data-aos="fade" style=""><i><i class="fas fa-award"></i> รายการสินค้า</i></h1>
					<!-- 		<h1 class="page-text-titler aos-init aos-animate mx-auto" data-aos="fade">Recommend</h1> -->
					<h5 class="d-none d-md-block text-white text-start" style="">หมวดหมู่สินค้า</h5>
				</div>

			</div>
<div class="row">
<div class="col-12 col-lg-6 mb-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
<a href="shop&gameid=14" class="category-panel">
<div class="category-image">
<img src="assets/img/gameplay/1.jpg" class="img-fluid">
</div>
<div class="category-details">
<div class="category-name text-truncate">บริการ ขาย ID</div>
<div class="category-description text-truncate">เกม Roblox</div>
</div>
</a>
</div>
<div class="col-12 col-lg-6 mb-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="50">
<a href="gift" class="category-panel">
<div class="category-image">
<img src="assets/img/gameplay/2.jpg" class="img-fluid">
</div>
<div class="category-details"> 
<div class="category-name text-truncate">บริการ ขายเกมส์พาส Roblox</div>
<div class="category-description text-truncate">เกมส์พาส robux</div>
</div>
</a>
</div>
</div>
</div>
</div>
		
		        <div class="row no-gutters mt-4">
        <?php
          $game_type = "SELECT count(game_id) AS 'totalgame' FROM game_type";
          $game_type_row = $hyper->connect->query($game_type)->fetch_array();

          $data_ready_selled = "SELECT count(data_id) AS 'totaldata' FROM game_data WHERE selled = 0";
          $ready_selled_row = $hyper->connect->query($data_ready_selled)->fetch_array();

          $data_selled = "SELECT count(data_id) AS 'totalselled' FROM game_data WHERE selled = 1";
          $selled_row = $hyper->connect->query($data_selled)->fetch_array();
        ?>
            <div class="col-12 col-lg-4 p-2">
                <div class="card shadow-dark radius-border-6 hyper-bg-white text-center p-3">
                    <h1 class="mt-0 mb-0" style="font-size: 3.5rem;"><i class="fal fa-gamepad"></i></h1>
                    <h1 class="mt-0 mb-0"><?= number_format($game_type_row['totalgame'],0); ?></h1>
                    <font class="text-muted">เกมทั้งหมดในระบบ</font>
                </div>
            </div>
            
            <div class="col-6 col-lg-4 p-2">
                <div class="card shadow-dark radius-border-6 hyper-bg-white text-center p-3">
                    <h1 class="mt-0 mb-0" style="font-size: 3.5rem;"><i class="fal fa-check-circle"></i></h1>
                    <h1 class="mt-0 mb-0"><?= number_format($ready_selled_row['totaldata'],0); ?></h1>
                    <font class="text-muted">ไอดีพร้อมจำหน่าย</font>
                </div>
            </div>
            
            <div class="col-6 col-lg-4 p-2">
                <div class="card shadow-dark radius-border-6 hyper-bg-white text-center p-3">
                    <h1 class="mt-0 mb-0" style="font-size: 3.5rem;"><i class="fal fa-box-full"></i></h1>
                    <h1 class="mt-0 mb-0"><?= number_format($selled_row['totalselled'],0); ?></h1>
                    <font class="text-muted">ไอดีถูกจำหน่ายแล้ว</font>
                </div>
            </div>

        </div>
		
		<div class="row mb-4 mb-md-2 mt-4">
				<div class="col-12 col-md-8 text-start">
					<h1 class="page-text-title text-start aos-init" data-aos="fade" style=""><i><i class="fas fa-comment-dots"></i> ประกาศ</i></h1>
					<!-- 		<h1 class="page-text-titler aos-init aos-animate mx-auto" data-aos="fade">Recommend</h1> -->
					<h5 class="d-none d-md-block text-white text-start" style="">ประกาศจากเพจ</h5>
				</div>
				
			</div>
			<div class="row">
				<div class="col-12 mb-4 aos-init w-100" data-aos="fade-up" data-aos-delay="50">
					<div class="container">
						<div class="row justify-content-md-center">
							<div class="card col" style=" border-style: solid; border-width: 3px;border-image: radial-gradient(rgb(68, 68, 242), rgb(254, 0, 0)) 1;; background: none; border-radius: 25px;">
							<br>
							<h1 class="page-text-title text-start aos-init mt-0 d-none d-lg-block text-start blockText"><b><?= strtoupper($webname) ?></b> เว็บไซต์บริการจำหน่ายไอดีมากมาย</h1>
							<pre class="text-white text-start blockText"> <?= $webdetail; ?> </pre>
	
						</div>
					</div>
				</div>
			</div>
		</div>
		
        <!-- Site Banner Text -->
<section id="countdownSection" class="my-5">
        <div class="container">
            <div class="blockTitle">
                <h3>โปรโมชั่นลดราคา</h3>
            </div>
            <div class="blockText">
                <h3>ลดราคา <span style="color: #fe0000;">30%</span> ถึงสิ้นเดือนนี้เท่านั้น</h3>
            </div>
            <div class="countdown">
                <div class="time">
				<p id="demo"></p>
                    </div>
                
            </div>
        </div>
    </section>
        <!-- Site Banner Text -->
        <!-- End Site Banner Text -->

        <!-- Status Site Bar -->

        <!-- End Status Site Bar -->
		<br>
<section>
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="panel panel-primary">
							
							<div class="panel-body">
								<div class="embed-responsive embed-responsive-16by9">
					                <iframe src="https://www.youtube.com/embed/itLDK8g-HD0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
								</div>
								 <p></p>
							</div> 
						</div>
						
					</div>
					<div id="fb-root"></div>
					<script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v12.0" nonce="jIw4GB8K"></script>
					<div class="col-sm-4">
						<div class="panel panel-primary">
							<div class="fb-page" data-href="https://web.facebook.com/DARK-SHOP-101002951490510" data-tabs="timeline" data-width="300" data-height="400" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://web.facebook.com/DARK-SHOP-101002951490510" class="fb-xfbml-parse-ignore"><a href="https://web.facebook.com/DARK-SHOP-101002951490510">DARK SHOP</a></blockquote></div>
								</tbody> 
							</table>
						</div>
					</div>
				</div><!-- row end -->
			</div><!-- container end -->
		</section>

        <!-- Game Type -->
        <h1 class="text-center mt-4 mb-2 texbo"></h1>
        <div class="row no-gutters">

        <?php
          $sql_select_game = "SELECT * FROM game_type ORDER BY game_id DESC";
          $query_game = $hyper->connect->query($sql_select_game);
          $total_game_row = mysqli_num_rows($query_game);
          $game = mysqli_fetch_array($query_game);

          if($total_game_row <= 0){
          ?>
          <h4 class="text-center w-100 mt-4">ไม่มีเกมในขณะนี้</h4>
          <?php 
          }else{
          do{
              $gid = $game['game_id'];
              $data_ready_selled = "SELECT count(data_id) AS 'totaldata' FROM game_data WHERE game_id = $gid AND selled = 0";
              $ready_selled_row = $hyper->connect->query($data_ready_selled)->fetch_array();

              if($ready_selled_row['totaldata'] > 0){

        ?>
            
        <?php }}while ($game = mysqli_fetch_array($query_game));} ?>

        </div>
        <!-- End Game Type -->
		<head>
	<?php include("./assets/css/style.php"); ?>
	</head>