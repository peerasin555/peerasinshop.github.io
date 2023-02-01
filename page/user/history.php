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
                    <th scope="col">หมายเหตุ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sid = $_SESSION["USER_SID"] ;
                    $sql_select_order = "SELECT orders.*, accounts.*, stock_item.* FROM ((orders
                    INNER JOIN accounts ON orders.buyer_id = accounts.ac_id)
                    INNER JOIN stock_item ON orders.data_item = stock_item.item_id) WHERE accounts.sid = '$sid'";
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

                        <?php if($order['order_ression'] == 'none'){ ?>
                            <td><p class="mb-0"> - </p></td>
                        <?php }elseif($order['order_ression'] == 'error_id'){ ?>
                            <td><p class="mb-0">ชื่อหรือรหัสผิด</td>
                        <?php }elseif($order['order_ression'] == 'error_item'){ ?>
                            <td><p class="mb-0">เกิดข้อผิดพลาดในตัวสินค้า</td>
                        <?php }elseif($order['order_ression'] == 'error_2step'){ ?>
                            <td><p class="mb-0">รหัสติด 2 Step</td>
                        <?php } ?>
              <!-- End Edit Game Data Modal -->
                    </tr>
                <?php
                    }}
                ?>
            </tbody>
        </table>
    </div>