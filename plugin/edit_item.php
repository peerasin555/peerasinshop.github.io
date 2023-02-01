<?php

include("hyper_api.php");
$errorMSG = "";
// id,item_name,item_price
$id = $_POST['id'];
$item_name = $_POST['item_name'];
$item_price = $_POST['item_price'];

$sql = "SELECT * FROM stock_item WHERE item_id ='$id'";
$query = $hyper->connect->query($sql);
$data = mysqli_fetch_array($query);

if(empty($id)){
    $errorMSG = "เกิดข้อผิดพราด";
}elseif(($item_name == $data['item_name']) && ($item_price == $data['item_price'])){
    $errorMSG = "กรุณาแก้ไขข้อมูลก่อนกดบันทึก";
}else{
    $update_data_sql = "UPDATE stock_item SET item_name = '$item_name', item_price = '$item_price' WHERE item_id ='$id'";
    $query_data_update = $hyper->connect->query($update_data_sql);
    if(!$query_data_update){
        $errorMSG = "อัพเดทข้อมูลไม่สำเร็จ";
    }
}


if(empty($errorMSG)){
    echo json_encode(['code'=>200,]);
}else{
    echo json_encode(['code'=>500, 'msg'=>$errorMSG]);
}
?>