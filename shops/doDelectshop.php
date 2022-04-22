<?php
require_once("../db-connect.php");

// if(!isset($_GET["shop_id"])){
//     header("location: 404.php");
// }

$shop_id=$_GET["shop_id"];

require_once("../db_connect.php");
//echo $shop_id;

$sql="UPDATE shop SET valid=0 WHERE shop_id='$shop_id'";

// echo $sql;
if ($conn->query($sql) === TRUE) {
    //echo "刪除成功";
    header("location: delectalready.php");
} else {
    echo "刪除資料錯誤: " . $conn->error;
}

$conn->close();


?>