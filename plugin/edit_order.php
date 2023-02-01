<?php

include("hyper_api.php");
$errorMSG = "";
// status,id,ression
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $ression = $_POST['ression'];
    $status = $_POST['status'];

    $data_sql = "SELECT * FROM orders WHERE order_id = $id";
    $data = $hyper->connect->query($data_sql)->fetch_array();
    if(empty($id) || empty($ression) || empty($status)){
        $errorMSG = "แก้ไขข้อมูลไม่สำเร็จ";
    }elseif($ression == $data['order_ression'] && $status == $data['order_status']){
        $errorMSG = "กรุณาแก้ไขข้อมูลก่อนกดบันทึก";
    }else{
        $update_data_sql = "UPDATE orders SET order_status = '$status', order_ression = '$ression' WHERE order_id ='$id'";
        $query_data_update = $hyper->connect->query($update_data_sql);
        if(!$query_data_update){
            $errorMSG = "แก้ไขข้อมูลไม่สำเร็จ";
        }
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