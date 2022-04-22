<?php
$servername = "localhost";
$username = "mf251";
$password = "2525";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// 檢查連線
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
}else{
    // echo "連線成功";
}

session_start();

?>
