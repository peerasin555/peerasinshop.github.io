<?php

include("hyper_api.php");
$errorMSG = "";

if(isset($_POST['id'])){
    $id = $_POST['id'];

    $image_sql ="SELECT * FROM stock_item WHERE item_id = $id";
    $data_query = $hyper->connect->query($image_sql);
    $data = mysqli_fetch_array($data_query);
    do{
        unlink('../assets/img/gamepass/'.$data['item_img'].'');
    }while($data = mysqli_fetch_array($data_query));

    $del_data_sql = "DELETE FROM stock_item WHERE item_id = $id";
    $del_data_query = $hyper->connect->query($del_data_sql);
    if(!$del_data_query){
        $errorMSG = "ลบไม่สำเร็จ";
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