<?php

include("hyper_api.php");
$errorMSG = "";

if(empty($_POST['price']) || !filter_var($_POST['price'], FILTER_VALIDATE_INT) || $_POST['price'] <= 0){
    $errorMSG = "กรุณากรอก ราคาสินค้า";
}elseif(empty($_POST['title'])){
    $errorMSG = "กรุณากรอก ชื่อสินค้า";
}elseif(empty($_FILES["imggamecardnew"]) || $_FILES["imggamecardnew"]["error"] != 0){
    $errorMSG = "กรุณาเพิ่มรูปสินค้า";
}else{
    $namea = bin2hex(random_bytes(16)).'_item.jpg';
    function Upload($file,$path="../assets/img/gamepass/"){
        global $namea;
        $newfilename= $namea.str_replace("", "", basename(''));
        if(@copy($file['tmp_name'],$path.$newfilename)){
            @chmod($path.$file,0777);
            return $newfilename;
        }else{
            return false;
        }
    }
    
    $title = $_POST['title'];
    $price = $_POST['price'];
    $fileimg = Upload($_FILES["imggamecardnew"]);

    if($fileimg == false){
        $errorMSG = "เพิ่มรูปภาพไม่สำเร็จ";
    }else{
        $add_new_card = "INSERT INTO stock_item (item_name, item_img, item_price, item_amount) VALUES ('$title','$fileimg','$price', 1)";
        $result = $hyper->connect->query($add_new_card);
        if(!$result){
            $errorMSG = "เพิ่มสินค้าไม่สำเร็จ";
        }
    }
}

if(empty($errorMSG)){
    echo json_encode(['code'=>200,]);
}else{
    echo json_encode(['code'=>500, 'msg'=>$errorMSG]);
}

?>