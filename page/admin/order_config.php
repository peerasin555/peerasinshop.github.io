<?php

function decrypt($message){
	$text = base64_decode($message);
	$ciphering = "AES-128-CTR";
    $options = 0;
    $encryption_iv = '54ee19cbf393ce85';
    $encryption_key = "37147679c4d7d89e58be489e";
    $decrypt_code = openssl_decrypt($text, $ciphering,$encryption_key, $options, $encryption_iv);
    
	return $decrypt_code;
}

?>

<div class="table-responsive mt-3 card mt-4 shadow-dark radius-border hyper-bg-white card-body">
    <h3 class="text-center mt-4 mb-4">--- รายการคำสั่งซื้อ ---</h3>
    <script>
    $(document).ready(function() {
        $('#detail').DataTable( {
            "order": [[ 0, "desc" ]],
            scrollX: true
        } );
    } );
    </script>
    <div class="table-responsive mt-3">
        <table id="detail" class="table text-center w-100">
            <thead class="hyper-bg-dark">
                <tr>
                    <th scope="col" style="width:120px;">เลขที่คำสั่งซื้อ</th>
                    <th scope="col">วัน-เวลาที่สั่ง</th>
                    <th scope="col">ชื่อสินค้า</th>
                    <th scope="col">สถานะ</th>
                    <th scope="col">การคืนเงิน</th>
                    <th scope="col" style="width: 170px;">เมนู</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql_select_order = "SELECT orders.*, accounts.*, stock_item.* FROM ((orders
                    INNER JOIN accounts ON orders.buyer_id = accounts.ac_id)
                    INNER JOIN stock_item ON orders.data_item = stock_item.item_id)";
                    $result = $hyper->connect->query($sql_select_order);
                    if($result->num_rows == 0){
                ?>
                    <tr>
                        <td colspan="6">Not found data in database</td>
                    </tr>
                <?php 
                    } else  {while ($order = $result->fetch_assoc()){
                ?>
                    <tr>
                        <td>0<?=$order['order_id']?></td>
                        <td><?=date('d/m/Y - H:i', strtotime($order['date']))?></td>
                        <td><?=$order['item_name']?></td>
                        <?php if($order['order_status'] == 'wait'){ ?>
                            <td><p class="mb-0 text-warning"><i class="fas fa-clock"></i> รอดำเนินการ</p></td>
                        <?php }elseif($order['order_status'] == 'success'){ ?>
                            <td><p class="mb-0 text-success"><i class="fas fa-check-circle"></i> สำเร็จ</p></td>
                        <?php }elseif($order['order_status'] == 'cancle'){ ?>
                            <td><p class="mb-0 text-danger"><i class="fas fa-times-circle"></i> ยกเลิก</p></td>
                        <?php } ?>
                        <?php if($order['refund_status'] == 'success'){ ?>
                            <td><p class="mb-0 text-success"><i class="fas fa-check-circle"></i> สำเร็จ</p></td>
                        <?php }elseif($order['refund_status'] == 'wait'){ ?>
                            <td><p class="mb-0">ยังไม่คืนเงิน</td>
                        <?php } ?>
                        <td><button type="button" class="btn hyper-btn-notoutline-success btn-sm" data-toggle="modal" data-target="#editusermodal<?= $order['order_id']; ?>"><i class="fal fa-edit mr-1"></i> แก้ไข</button></td>
                        <!-- Edit Game Data Modal -->
                        <div class="modal fade" id="editusermodal<?= $order['order_id']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 radius-border-2 hyper-bg-white">
                                    <div class="modal-header hyper-bg-dark">
                                        <h6 class="modal-title"><i class="fal fa-plus-square mr-1"></i> อัพเดทข้อมูลคำสั่งซื้อเลขที่ 0<?=$order['order_id']?></h6>
                                    </div>
                                    <div class="modal-body text-center">

                                        <form id="updatedata" method="POST" enctype="multipart/form-data">

                                            <img src="/assets/img/gamepass/<?= $order['item_img']; ?>" width="99px" class="img-fluid ml-auto mr-auto mb-2"></br>

                                            <div class="input-group input-group-sm mb-3 mt-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hyper-bg-dark border-dark">ชื่อสินค้า</span>
                                                </div>
                                                <p class="form-control form-control-sm hyper-form-control"><?=$order['item_name']?></p>
                                            </div>

                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hyper-bg-dark border-dark">วันที่สั่งซื้อ</span>
                                                </div>
                                                <p class="form-control form-control-sm hyper-form-control"><?=date('d/m/Y - H:i', strtotime($order['date']))?></p>
                                            </div>

                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hyper-bg-dark border-dark">จำนวน</span>
                                                </div>
                                                <p class="form-control form-control-sm hyper-form-control">1 ชิ้น</p>
                                            </div>

                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hyper-bg-dark border-dark">ชื่อผู้ใช้</span>
                                                </div>
                                                <p class="form-control form-control-sm hyper-form-control"><?= decrypt($order['user']) ?></p>
                                            </div>
                                            
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hyper-bg-dark border-dark">รหัสผ่าน</span>
                                                </div>
                                                <p class="form-control form-control-sm hyper-form-control"><?= decrypt($order['pass'])  ?></p>
                                            </div>
                                            
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text hyper-bg-dark border-dark" for="inputGroupSelect01">สถานะคำสั่งซื้อ</label>
                                                </div>
                                                <select id="status_item<?= $order['order_id']; ?>" class="custom-select hyper-form-control" id="inputGroupSelect01">
                                                    <option <?php if($order['order_status'] == 'wait'){echo 'selected';} ?> value="wait">รอดำเนินการ</option>
                                                    <option <?php if($order['order_status'] == 'success'){echo 'selected';} ?> value="success">สำเร็จ</option>
                                                    <option <?php if($order['order_status'] == 'cancle'){echo 'selected';} ?> value="cancle">ยกเลิก</option>
                                                </select>
                                            </div>

                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text hyper-bg-dark border-dark" for="inputGroupSelect01">สาเหตุ</label>
                                                </div>
                                                <select id="order_ression<?= $order['order_id']; ?>" class="custom-select hyper-form-control" id="inputGroupSelect01">
                                                    <option <?php if($order['order_ression'] == 'none'){echo 'selected';} ?> value="none">ไม่มี</option>
                                                    <option <?php if($order['order_ression'] == 'error_id'){echo 'selected';} ?> value="error_id">ชื่อผู้ใช้หรือรหัสผ่านผิด</option>
                                                    <option <?php if($order['order_ression'] == 'error_2step'){echo 'selected';} ?> value="error_2step">รหัสติด 2 Step</option>
                                                    <option <?php if($order['order_ression'] == 'error_item'){echo 'selected';} ?> value="error_item">เกิดข้อผิดพลาดในตัวสินค้า</option>
                                                </select>
                                            </div>
                                            <lable class="float-left">การคืนเงิน</lable>
                                            <div class="input-group input-group-sm mb-3">
                                                <?php if($order['refund_status'] == 'wait'){ ?>
                                                    <button type="button" onclick="refund(<?= $order['order_id'] ?>)" class="btn btn-sm hyper-btn-notoutline-success btn-block">คืนเงิน</button>
                                                <?php }elseif($order['refund_status'] == 'success'){ ?>
                                                    <button type="button" class="btn btn-sm hyper-btn-notoutline-danger btn-block" disabled>รายการนี้ได้คืนเงินไปแล้ว</button>
                                                <?php } ?>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="modal-footer p-2 border-0">
                                        <button type="button" onclick="updatedata(<?= $order['order_id'] ?>)" class="btn hyper-btn-notoutline-success"><i class="fal fa-plus-square mr-1"></i>อัพเดทข้อมูล</button>
                                        <button type="button" class="btn hyper-btn-notoutline-danger" data-dismiss="modal"><i class="fad fa-times-circle mr-1"></i>ยกเลิก</button>
                                    </div>
                                </div>
                            </div>
                        </div>
              <!-- End Edit Game Data Modal -->
                    </tr>
                <?php
                    }}
                ?>
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        function updatedata(id){
            const status = document.querySelector('#status_item'+id).value;
            const ression = document.querySelector('#order_ression'+id).value;
            $.ajax({
                type: "POST",
                url: "plugin/edit_order.php",
                data: {
                        status,id,ression
                },
                dataType: "json",
                beforeSend: function() {
                    swal("กำลังแก้ไขข้อมูล กรุณารอสักครู่...",{button:false,closeOnClickOutside:false,timer:1900,});
                },
                success : function(data){
                    setTimeout(function() {
                        if (data.code == "200"){
                            swal("แก้ไขข้อมูลสำเร็จ!", "ระบบกำลังบันทึกข้อมูล...", "success",{button:false,closeOnClickOutside:false,});
                            setTimeout(function(){ window.location.reload();}, 2000);
                        } else {
                            swal(data.msg ,"" ,"error",{button:{className:'hyper-btn-notoutline-danger',},closeOnClickOutside:false,});
                        }
                    }, 2000);
                }
            });
        }

        function refund(id) {
            swal({
                title: "ต้องการคืนเงินคำสั่งซื้อเลขที่ 0"+id,
                text: "ใช่หรือไม่?",
                icon: 'info',
                buttons: {
                    confirm : {text:'คืนเงิน',className:'hyper-btn-notoutline-success'},
                    cancel : 'ยกเลิก'
                },
                closeOnClickOutside:false,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({

                    type: "POST",
                    url: "plugin/refund_item.php",
                    dataType: "json",
                    data:{
                        id
                    },

                    beforeSend: function() {
                    swal("กำลังคืนเงิน กรุณารอสักครู่...",{button:false,closeOnClickOutside:false,timer:1900,});

                    },

                    success : function(data){
                    setTimeout(function() {
                        if (data.code == "200"){
                            swal({
                                title: "คืนเงินสำเร็จ!",
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