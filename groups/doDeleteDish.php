<?php
require_once("../db-connect.php");

$dish_id=$_GET["card"];

$sql="DELETE FROM dish WHERE dish_id='$dish_id'";


if ($conn->query($sql) === TRUE) {
    $url = "dish-list.php?shop=<?=$shopID?>";
    header("location: ".$url);
} else {
    echo "刪除資料錯誤: " . $conn->error;
}
?>