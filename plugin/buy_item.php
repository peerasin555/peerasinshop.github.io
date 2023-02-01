<?php

include("hyper_api.php");
$errorMSG = "";

$key = "37147679c4d7d89e58be489e";

function encrypt($message){
	$ciphering = "AES-128-CTR";
    $options = 0;
    $encryption_iv = '54ee19cbf393ce85';
    $encryption_key = "37147679c4d7d89e58be489e";
    $encrypt_code = openssl_encrypt($message, $ciphering,$encryption_key, $options, $encryption_iv);
    
	return base64_encode($encrypt_code);
}

if(isset($_POST['id'])){
    $sid = $_COOKIE['USER_SID'];
    $var = "SELECT * FROM accounts WHERE sid = '".$sid."' ";
    $user_query = $hyper->connect->query($var);
    $total_user = mysqli_num_rows($user_query);

    $id = $_POST['id'];
    $user = encrypt($_POST['user']) ;
    $pass = encrypt($_POST['pass']) ;

    if($total_user == 1){
        $data_user = $hyper->connect->query($var)->fetch_array();
        $uid = $data_user['ac_id'];

        $item_sql = "SELECT * FROM stock_item WHERE item_id = $id";
        $item = $hyper->connect->query($item_sql)->fetch_array();

        $p = $data_user['points'] - $item['item_price'];

        if(empty($_POST['user']) || empty($_POST['pass'])){
            $errorMSG = "กรุณากรอกข้อมูลให้ครบถ้วน";
        }elseif($p < 0){
            $errorMSG = "Points ไม่พอซื้อสินค้า";
        }else{
            $updateuser = "UPDATE accounts SET points = '".$p."' WHERE ac_id = $uid";
            $updateuser_query = $hyper->connect->query($updateuser);
            if($updateuser_query){
                $addorder = "INSERT INTO orders (buyer_id, data_item, user, pass, order_status, order_ression, refund_status) VALUES ('$uid','$id','$user','$pass','wait','none','wait')";
                $addorder_query = $hyper->connect->query($addorder);
                if(!$addorder_query){
                    $errorMSG = 'ซื้อสินค้าไม่สำเร็จ!';
                }
            }else{
                $errorMSG = 'ซื้อสินค้าไม่สำเร็จ!';
            }
        }   
    }else{
        $errorMSG = 'ซื้อสินค้าไม่สำเร็จ!';
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