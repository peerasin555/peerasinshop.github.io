<?php

include("hyper_api.php");
$errorMSG = "";
// status,id,ression
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $data = "SELECT orders.*, stock_item.* FROM orders INNER JOIN stock_item ON orders.data_item = stock_item.item_id WHERE orders.order_id = $id";
    $order= $hyper->connect->query($data)->fetch_array();
    $buyer_id = $order['buyer_id'];
    
    $var = "SELECT * FROM accounts WHERE ac_id = '".$buyer_id."' ";
    $user_query = $hyper->connect->query($var);
    $total_user = mysqli_num_rows($user_query);

    if($total_user == 1){
        $data_user = $hyper->connect->query($var)->fetch_array();
        $new_point = $data_user['points'] + $order['item_price'];

        $updateuser = "UPDATE accounts SET points = '".$new_point."' WHERE ac_id = $buyer_id";
        $updateuser_query = $hyper->connect->query($updateuser);
        if($updateuser_query){
            $updateorder = "UPDATE orders SET refund_status = 'success' WHERE order_id = $id";
            $updateorder_query = $hyper->connect->query($updateorder);
            if(!$updateorder_query){
                $errorMSG = 'คืนเงินไม่สำเร็จ';
            }
        }else{
            $errorMSG = 'คืนเงินไม่สำเร็จ';
        }
    }else{
        $errorMSG = 'คืนเงินไม่สำเร็จ';
    }
    /* result */
    if(empty($errorMSG)){
        echo json_encode(['code'=>200,]);
    }else{
        echo json_encode(['code'=>500, 'msg'=>$errorMSG]);
    }


}else{
    header("Location: 403.php");
}
?>