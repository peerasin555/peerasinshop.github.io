<div class="container">
    <div class="card my-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">ข้อมูลรหัส</h5>
            </div>
            <div class="card-body">
                <p class="mb-2">ชื่อผู้เล่น</p>
                <div class="input-group mb-3">
                    <input id="user" type="text" class="form-control" placeholder="กรุณาใส่ชื่อผู้เล่น">
                </div>
                <p class="mb-2">รหัสผ่าน</p>
                <div class="input-group mb-3">
                    <input id="pass" type="text" class="form-control" placeholder="กรุณาใส่รหัสผ่าน">
                </div>
            </div>
        </div>
    </div>
    <?php
        $sql_select_item = "SELECT * FROM stock_item WHERE 1";
        $result = $hyper->connect->query($sql_select_item);
        if($result->num_rows == 0){
    ?>
    <div class="container">
        <h4 class="text-center w-100 mt-4">ไม่มีข้อมูลในขณะนี้</h4>
    <?php 
        } else {
    ?>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">
    <?php
        while ($item = $result->fetch_assoc()){
    ?>
        <div class="col mb-4">
            <div class="card">
                <img src="assets/img/gamepass/<?= $item['item_img']; ?>" class="card-img-top img-fluid">
                <div class="card-body">
                    <h5 class="mt-0 mb-2"><?= $item['item_name'] ?></h5>
                    <h6 class="mt-0 text-muted">ราคา <?= number_format($item['item_price'],0) ?> Points</h6>
                    <div class="button-group text-center mt-3">
                        <button onclick="buy(<?= $item['item_id'] ?>,'<?= $item['item_name'] ?>')" class="btn btn-sm hyper-btn-buy"><i class="fal fa-shopping-cart mr-1"></i>ซื้อสินค้า</button>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }}
    ?>
    </div>
</div>
    <script type="text/javascript">
        function buy(id,name) {
            var user = $("#user").val();
            var pass = $("#pass").val();
            swal({
                title: "ต้องการซื้อ "+name,
                text: "ใช่หรือไม่?",
                icon: 'info',
                buttons: {
                    confirm : {text:'ซื้อ',className:'hyper-btn-notoutline-success'},
                    cancel : 'ยกเลิก'
                },
                closeOnClickOutside:false,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({

                    type: "POST",
                    url: "plugin/buy_item.php",
                    dataType: "json",
                    data:{
                        id,user,pass
                    },

                    beforeSend: function() {
                    swal("กำลังซื้อ กรุณารอสักครู่...",{button:false,closeOnClickOutside:false,timer:1900,});

                    },

                    success : function(data){
                    setTimeout(function() {
                        if (data.code == "200"){
                            swal({
                                title: "ซื้อสำเร็จ!",
                                icon: 'success',
                                button:false,
                                closeOnClickOutside:false,
                            });
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