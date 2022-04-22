<?php
require_once("../db-connect.php");

// if(!isset($_POST["shop_id"])){
//     echo "您不是透過正常管道到此頁";
//     exit;
// }
$groups_id=$_POST["groups_id"];
$groups_start_time=$_POST["groups_start_time"];
$groups_end_time=$_POST["groups_end_time"];
$eating_time=$_POST["eating_time"];
$least_num=$_POST["least_num"];
$price=$_POST["price"];


// if(empty($groups_start_time) || empty($groups_end_time) || empty($eating_time) || empty($least_num) || empty($price) || empty($gd_combined_id)){
//     echo "您有欄位沒有填寫";
//     return;
// }




$sql="UPDATE groups SET groups_start_time='$groups_start_time', groups_end_time='$groups_end_time', eating_time='$eating_time', least_num='$least_num', price='$price' WHERE groups_id='$groups_id'";



if ($conn->query($sql) === TRUE) {
    echo "更新成功";
    $conn->close();
    $url = "group-open-list.php?list=".$groups_id;
    header("location: ".$url);
} else {
    echo "更新資料錯誤: " . $conn->error;
    exit;
}


$conn->close();



?>