<?php
require_once("../db-connect.php");


$shop_id=$_POST["shop_id"];
$shop_name=$_POST["shop_name"];
$shop_account=$_POST["shop_account"];
$shop_phone=$_POST["shop_phone"];
$shop_address=$_POST["shop_address"];
$shop_description=$_POST["shop_description"];
$service=$_POST["service_id"];
$type=$_POST["type"];
$types=join(",",$type);

// var_dump($types) ;
// exit;


$sql="UPDATE shop 
SET 
shop_name='$shop_name', 
shop_account='$shop_account', 
shop_phone='$shop_phone', 
shop_address='$shop_address', 
shop_description='$shop_description', 
service_id='$service', 
type_id='$types' 
WHERE shop_id='$shop_id'";

// echo $sql;
// exit;

$result = $conn->query($sql);
if ($result === TRUE) {
    //echo "更新成功";
    $conn->close();
    header("location:updatealready.php");
} else {
    echo "更新資料錯誤";
    $conn->error;
    exit;
}

?>