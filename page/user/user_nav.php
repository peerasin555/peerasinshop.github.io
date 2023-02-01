    <nav class="navbar navbar-expand-md navbar-light navbar-dark fixed-top" style="border-bottom:#fe0000 solid 3px; background: #2e2d2d;">
        <a class="navbar-brand" href="#">
            <img src="assets/img/<?= $webimage; ?>" width="44" height="44" class="d-inline-block align-top rounded-circle">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
          <div class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php if($page == 'home' || $page == 'shop' || $page == 'item'){echo '-active'; } ?> active" aria-current="page" href="/home"><i class="fas fa-home"></i>&nbsp;หน้าแรก</a>
        </li>
		<li class="nav-item">
          <a class="nav-link <?php if($page == 'topup'){echo '-active'; } ?> active" aria-current="page" href="topup"><i class="fal fa-credit-card mr-1"></i>&nbsp;เติมเงิน</a>
        </li>
		<li class="nav-item">
		<?php if($data_user['role'] == '779'){ ?><a href="adminsys" class="nav-link active<?php if($page == 'adminsys' || $page == 'gametype' || $page == 'gameselect' || $page == 'editgame' || $page == 'gamecard' || $page == 'gamedata' || $page == 'dataowner' || $page == 'datauser' || $page == 'datapay' || $page == 'websetting'){echo '-active'; } ?> " type="button"><i class="fal fa-tools mr-1"></i> ระบบแอดมิน</button></a><?php } ?>
         </li>
		 <div class="btn-group">
          <button class="btn text-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-store-alt"></i>&nbsp;ร้านค้า
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="shop&gameid=14">จำหน่ายไอดีเกม</a></li>
            <li><a class="dropdown-item" href="gift">บริการเกมพลาส</a></li>
          </ul>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!-- Example single danger button -->
<div class="btn-group">
  <button type="button" class="btn  dropdown-toggle" style="color: #fff; background: #fe0000;  /* fallback for old browsers */ background: -webkit-linear-gradient(to right, #fe0000, #fe0000);  /* Chrome 10-25, Safari 5.1-6 */ background: linear-gradient(to right, #fe0000, #fe0000); border-radius: 10px; /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */" 
  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> ข้อมูลผู้ใช้ </button>
  <div class="dropdown-menu">
  <a class="dropdown-item" aria-current="page" href="#"><i class="fab fa-bitcoin mr-1"></i>เหลือ <?= $points; ?> Points</a>
    <a class="dropdown-item <?php if($page == 'profile'){echo '-active'; } ?>" aria-current="page" href="profile"><i class="fal fa-user mr-1"></i>&nbsp;บัญชีของฉัน</a>
    <a class="dropdown-item <?php if($page == 'history'){echo '-active'; } ?>" aria-current="page" href="history"><i class="fal fa-history mr-1"></i>&nbsp;ไอดีของฉัน</a>
    <a class="dropdown-item <?php if($page == 'history-order'){echo '-active'; } ?>" aria-current="page" href="history-order"><i class="fal fa-history mr-1"></i>&nbsp;ประวัติการสั่งซื้อ</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="logout">ออกจากระบบ</a>
  </div>
</div>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href=""><i class=""></i>&nbsp; </a>
        </li>
		<li class="nav-item">
          <a class="nav-link active" aria-current="page" href=""><i class=""></i>&nbsp; </a>
        </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</ul>
          </div>
        </div>
    </nav>