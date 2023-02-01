      <!-- Pay Form -->
      <div class="card-body aos-init aos-animate" data-aos="fade-up">
		<div class="card-title">
			<form class="col-xl-9 mx-auto bg-white" style="border-radius: 25px;">
				<img class="col-xl-12 img-fluid img-thumbnail w-100" src="assets/img/tppup/topup.jpg" style="display: block;margin-right: auto;margin-left: auto;width: 100%;border-radius: 25px;">

				<div class="card-body">
					<div class="mb-3">
					<h6></h6>
						<label id="giftlinkHelp" class="form-label"> &gt; คงเหลือ <?= $points; ?> Points</label>
				<input type="email" class="form-control" id="ref" placeholder="กรุณากรอก ลิ้งค์ซองอั่งเปา" autocomplete="off">
					</div>
					</div>
					<a onclick="Pay()" class="btn btn-dark btn-sm col-12 submit_topup" style="border-radius:25px; max-width: 350px; display:table; margin: 0 auto;">เติมเงิน</a>
					<br>
				</div>
			</form>
		</div>

	</div>
      <!-- End Pay Form -->

      <script>
      /** Pay */
      function Pay() {
      var  ref = $("#ref").val();
      swal({
            title: 'คุณต้องการทำรายการ',
            text: "ลิ้งซองของขวัญ\n"+ref,
            icon: "info",
            buttons: {
            confirm : {text:'ทำรายการ',className:'hyper-btn-notoutline-success'},
            cancel : 'ยกเลิก'
            },
            closeOnClickOutside:false,
      })
      .then((willDelete) => {
            if (willDelete) {
            $.ajax({

            type: "POST",
            url: "plugin/transaction.php",
            dataType: "json",
            data: {ref:ref},

            beforeSend: function() {
            swal("กำลังตรวจสอบรายการ กรุณารอสักครู่...",{button:false,closeOnClickOutside:false,timer:5000,});

            },

            success : function(data){
            setTimeout(function() {
                  if (data.code == "200"){
                  swal("ทำรายการ สำเร็จ!", "ระบบกำลังพาท่านไป...", "success",{button:false,closeOnClickOutside:false,});
                  setTimeout(function(){ window.location.reload();}, 2000);
                  } else {
                  swal(data.msg ,"" ,"error",{button:{className:'hyper-btn-notoutline-danger',},closeOnClickOutside:false,});
                  }
            }, 2000);
            }

            });
            }
      });
      }
      </script>
	  
	  <style>
.img-thumbnail {
    padding: 0.25rem;
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: 0.25rem;
    max-width: 100%;
    height: auto;
}
.img-fluid {
    max-width: 100%;
    height: auto;
}
img, svg {
    vertical-align: middle;
}
  </style>