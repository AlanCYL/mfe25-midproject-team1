<?php
require_once("../db-connect.php");

// if(!isset($_POST["shop_id"])){
//     echo "您不是透過正常管道到此頁";
//     exit;
// }

$shop_id=$_POST["shop_id"];
$groups_start_time=$_POST["groups_start_time"];
$groups_end_time=$_POST["groups_end_time"];
$eating_date=$_POST["eating_date"];
$eating_time=$_POST["eating_time"];
$least_num=$_POST["least_num"];
$price=$_POST["price"];

// if(empty($groups_start_time) || empty($groups_end_time) || empty($eating_time) || empty($least_num) || empty($price) || empty($gd_combined_id)){
//     echo "您有欄位沒有填寫";
//     return;
// }




$sql="INSERT INTO groups (groups_start_time, groups_end_time, eating_date, eating_time, least_num, price ,shop_id)
 VALUES ('$groups_start_time', '$groups_end_time', '$eating_date', '$eating_time', '$least_num', '$price', '$shop_id')
 ";





if ($conn->query($sql) === TRUE) {

    $data=[
        "status"=>"ok",
        "message"=> "新增資料完成"
    ];
} else {
    $data=[
        "status"=>"fail",
        "message"=> "新增資料錯誤". $conn->error
    ];
}

$conn->close();
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);


?>