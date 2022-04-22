<?php
require_once("../db-connect.php");

$shop_name=$_POST["shop_name"];
$shop_account=$_POST["shop_account"];
$shop_password=$_POST["shop_password"];
$shop_phone=$_POST["shop_phone"];
$shop_address=$_POST["shop_address"];
$shop_description=$_POST["shop_description"];
$type_id=$_POST["type_id"];
$service_id=$_POST["service_id"];
$img=$_POST["img"];
$now=date('Y-m-d');


// echo "$service_id";

// exit;

$sql="INSERT INTO shop (shop_name, shop_account, shop_password, shop_phone, shop_address, shop_description, type_id, service_id, img, shop_create_time, valid) 
VALUES ('$shop_name','$shop_account','$shop_password','$shop_phone','$shop_address','$shop_description','$type_id','$service_id','$img','$now', 1)";
if ($conn->query($sql) === TRUE) {
    //echo "新增資料完成<br>";

} else {
    //echo "新增資料錯誤: " . $conn->error;
    exit;
}


$conn->close();


header("location: shop_in.php");
?>