<?php
require_once("../db-connect.php");


$userId = $_POST["userId"];
$reason=$_POST["reason"];
$price=$_POST["price"];

if(empty($userId) || empty($reason) || empty($price)){
    echo "您有欄位沒有填寫";
    return;
}


for($i=0;$i<count($userId);$i++){
    echo $userId[$i], $reason, $price ;
}

exit;


$now=date('Y-m-d H:i:s');

echo "$userId, $reason, $price";
exit;



$sql="INSERT INTO users (name, email, phone, create_time)
VALUES ('$name', '$email', '$phone', '$now')";

// echo $sql;
// exit;


if ($conn->query($sql) === TRUE) {
    echo "新增資料完成 <br>";
    $last_id = $conn->insert_id;
    echo "last id is $last_id";
    exit;
} else {
    echo "新增資料錯誤 : ". $conn->error;
    exit;
}

$conn -> close();

header("location: create-user.php")

?>
