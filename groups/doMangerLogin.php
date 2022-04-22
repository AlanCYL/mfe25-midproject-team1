<?php
require_once("../db-connect.php");

$account=$_POST["account"];
$password=$_POST["password"];
$repassword=$_POST["repassword"];

if($password!=$repassword){
    echo "密碼不一致";
    exit;
}

$sql="SELECT * FROM shop WHERE name='$account'";
$result = $conn->query($sql);
if($result->num_rows>0){
    echo "該帳號已存在";
    exit;
}


$password=md5($password);
$sql="INSERT INTO shop (shop_account, shop_password) VALUES ('$account', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "新增資料完成<br>";

} else {
    echo "新增資料錯誤: " . $conn->error;
    exit;
}

$conn->close();
header("location: manager-login.php");

?>