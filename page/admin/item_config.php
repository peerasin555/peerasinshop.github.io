<div class="table-responsive mt-3 card mt-4 shadow-dark radius-border hyper-bg-white card-body">
    <h3 class="text-center mt-4 mb-4">--- จัดการสินค้าหน้าเว็ป ---</h3>
    <center><button class="btn hyper-btn-info my-2 my-sm-0 w-100" type="button" data-toggle="modal" data-target="#addgamecardmodal"><i class="fal fa-plus-square mr-1"></i> เพิ่มสินค้าใหม่เข้าระบบ</button></center>
    <div class="table-responsive mt-3">
        <table id="datatable" class="table text-center w-100">
            <thead class="hyper-bg-dark">
                <tr>
                    <th scope="col" style="width:100px;">เลขที่สินค้า</th>
                    <th scope="col">ชื่อสินค้า</th>
                    <th scope="col">ราคาสินค้า</th>
                    <th scope="col" style="width: 170px;">เมนู</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql_select_item = "SELECT * FROM stock_item WHERE 1";
                    $result = $hyper->connect->query($sql_select_item);
                    if($result->num_rows == 0){
                ?>
                    <tr>
                        <td colspan="5">Not found data in database</td>
                    </tr>
                <?php 
                    } else  {while ($item = $result->fetch_assoc()){
                ?>
                    <tr>
                        <td>0<?=$item['item_id']?></td>
                        <td><?=$item['item_name']?></td>
                        <td><?=$item['item_price']?> บาท</td>
                        <td>
                            <button type="button" class="btn hyper-btn-notoutline-success btn-sm" data-toggle="modal" data-target="#editusermodal<?= $item['item_id']; ?>"><i class="fal fa-edit mr-1"></i> แก้ไข</button>
                            <button onclick="del(<?= $item['item_id'] ?>)"  class="btn btn-sm hyper-btn-notoutline-danger my-1 my-sm-0" type="button"><i class="fal fa-trash-alt mr-1"></i> ลบ</button>
                        </td>
                        <!-- Edit Game Data Modal -->
                        <div class="modal fade" id="editusermodal<?= $item['item_id']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 radius-border-2 hyper-bg-white">
                                    <div class="modal-header hyper-bg-dark">
                                        <h6 class="modal-title"><i class="fal fa-plus-square mr-1"></i> อัพเดทข้อมูล</h6>
                                    </div>
                                    <div class="modal-body text-center">

                                        <form id="uploadForm" method="POST" enctype="multipart/form-data">

                                            <img src="/assets/img/gamepass/<?= $item['item_img']; ?>" width="99px" class="img-fluid ml-auto mr-auto mb-2"></br>

                                            <div class="input-group input-group-sm mb-3 mt-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hyper-bg-dark border-dark">ชื่อสินค้า</span>
                                                </div>
                                                <input id="item_name<?= $item['item_id']; ?>" value="<?= $item['item_name']; ?>" type="text" class="form-control form-control-sm hyper-form-control" required>
                                            </div>
                                            <div class="input-group input-group-sm mb-3 mt-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hyper-bg-dark border-dark">ราคาสินค้า</span>
                                                </div>
                                                <input id="item_price<?= $item['item_id']; ?>" value="<?= $item['item_price']; ?>" type="number" class="form-control form-control-sm hyper-form-control" required>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="modal-footer p-2 border-0">
                                        <button type="button" onclick="save(<?= $item['item_id'] ?>)" class="btn hyper-btn-notoutline-success"><i class="fal fa-plus-square mr-1"></i>อัพเดทข้อมูล</button>
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
    <div class="modal fade" id="addgamecardmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 radius-border-2 hyper-bg-white">
                <div class="modal-header hyper-bg-dark">
                    <h6 class="modal-title"><i class="fal fa-plus-square mr-1"></i> เพิ่มสินค้าใหม่เข้าระบบ</h6>
                </div>
            <div class="modal-body text-center">

        <!-- CARD -->
                <form id="additem" method="POST" enctype="multipart/form-data">
                    <div class="ml-auto mr-auto mb-3 text-center">
                        <img id="gamecardimgnew" src="assets/img/item/card.jpg" class="img-fluid" style="height: 170px;"></br>
                        <font class="text-muted">แนะนำขนาด 1920 x 1080 Pixel</font></br>
                        <input type="file" style="display:none;" id="imggamecardnew" name="imggamecardnew" onchange="gamecardURL(this,'new');" accept=".jpg,.png"/>
                        <button  onclick="uploadcardgame('new')"class="btn btn-sm hyper-btn-info mb-2 mb-md-0 mr-0 mr-md-2 w-100" type="button"><i class="fal fa-images mr-1"></i>เพิ่มรูปภาพ</button>
                    </div>

                    <div class="input-group input-group-sm mb-3 mt-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text hyper-bg-dark border-dark">ชื่อสินค้า</span>
                        </div>
                        <input id="title" name="title" type="text" class="form-control form-control-sm hyper-form-control" placeholder="ชื่อสินค้า" required autocomplete="off">
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text hyper-bg-dark border-dark">ราคาสินค้า</span>
                        </div>
                        <input id="price" name="price" type="number" class="form-control form-control-sm hyper-form-control" placeholder="ราคาสินค้า" required autocomplete="off">
                    </div>

                    <button type="submit" id="submitdatanew" class="d-none"></button>
                </form>
        <!-- End CARD -->
            </div>
                <div class="modal-footer p-2 border-0">
                    <button type="submit" onclick="submitdata('new')" class="btn hyper-btn-notoutline-success"><i class="fal fa-plus-square mr-1"></i>เพิ่มสินค้า</button>
                    <button type="button" class="btn hyper-btn-notoutline-danger" data-dismiss="modal"><i class="fad fa-times-circle mr-1"></i>ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function gamecardURL(input,id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#gamecardimg'+id).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            
                }
        }

        function uploadcardgame(id) {
            $("#imggamecard"+id).click();
        }

        function submitdata(id) {
            $("#submitdata"+id).click();
        }
    </script>
    <script type="text/javascript">
        $("#additem").submit(function(additem){
            additem.preventDefault();
            $.ajax({
                type: "POST",
                url: "plugin/add_new_item.php",
                data: new FormData(this),
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    swal("กำลังเพิ่มสินค้า กรุณารอสักครู่...",{button:false,closeOnClickOutside:false,timer:1900,});
                },
                success : function(data){
                    setTimeout(function() {
                        if (data.code == "200"){
                            swal("เพิ่มสินค้าสำเร็จ!", "ระบบกำลังบันทึกข้อมูล...", "success",{button:false,closeOnClickOutside:false,});
                            setTimeout(function(){ window.location.reload();}, 2000);
                        } else {
                            swal(data.msg ,"" ,"error",{button:{className:'hyper-btn-notoutline-danger',},closeOnClickOutside:false,});
                        }
                    }, 2000);
                }
            });
        })

        function save(id) {
            var item_name = $("#item_name"+id).val();
            var item_price = $("#item_price"+id).val();
            swal({
                title: "ต้องการเปลี่ยนข้อมูลสินค้าเลขที่ 0"+id,
                text: "ใช่หรือไม่?",
                icon: 'info',
                buttons: {
                    confirm : {text:'แก้ไข',className:'hyper-btn-notoutline-success'},
                    cancel : 'ยกเลิก'
                },
                closeOnClickOutside:false,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({

                    type: "POST",
                    url: "plugin/edit_item.php",
                    dataType: "json",
                    data:{
                        id,item_name,item_price
                    },

                    beforeSend: function() {
                    swal("กำลังแก้ไขข้อมูล กรุณารอสักครู่...",{button:false,closeOnClickOutside:false,timer:1900,});

                    },

                    success : function(data){
                    setTimeout(function() {
                        if (data.code == "200"){
                            swal({
                                title: "แก้ไขสำเร็จ!",
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

        function del(id) {
            swal({
                title: "ต้องการลบข้อมูลสินค้าเลขที่ 0"+id,
                text: "ใช่หรือไม่?",
                icon: 'info',
                buttons: {
                    confirm : {text:'ลบ',className:'hyper-btn-notoutline-danger'},
                    cancel : 'ยกเลิก'
                },
                closeOnClickOutside:false,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({

                    type: "POST",
                    url: "plugin/del_item.php",
                    dataType: "json",
                    data:{
                        id
                    },

                    beforeSend: function() {
                    swal("กำลังลบข้อมูล กรุณารอสักครู่...",{button:false,closeOnClickOutside:false,timer:1900,});

                    },

                    success : function(data){
                    setTimeout(function() {
                        if (data.code == "200"){
                            swal({
                                title: "ลบสำเร็จ!",
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