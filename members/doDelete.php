<?php

// require_once("../db-connect.php");

if(!isset($_GET["id"])){
    header("location: 404.php");
}

$id=$_GET["id"];
// echo $id;

require_once("../db-connect.php");
// $sql="DELETE FROM users WHERE id ='$id'";

//SOFT DELETE
$sql="UPDATE user SET valid=0 WHERE user_id='$id'";

// echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "
    <script> 
    alert('刪除成功'); 
    location.href='user-list.php';
    </script>";
    return;
} else {
    echo "刪除資料錯誤: " . $conn->error;
}


$conn->close();

?>