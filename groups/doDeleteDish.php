<?php
require_once("../db-connect.php");
$shopID=$_GET["login"];
$dish_id=$_GET["card"];

$sql="DELETE FROM dish WHERE dish_id='$dish_id'";


if ($conn->query($sql) === TRUE) {
    $url = "dish-list.php?login=".$shopID."&shop=".$shopID;
    header("location: ".$url);
} else {
    echo "刪除資料錯誤: " . $conn->error;
}
?>