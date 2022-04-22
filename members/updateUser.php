<?php
require_once("../db-connect.php");

$id=$_POST["id"];
$name=$_POST["user_name"];
$nick_name=$_POST["nick_name"];
$user_bir=$_POST["user_bir"];
$email=$_POST["user_mail"];
$phone=$_POST["user_phone"];
// echo $name;

if(empty($name) || empty($nick_name) || empty($phone) || empty($user_bir) || empty($email) ){
    echo "
    <script> 
    alert('您有欄位沒有寫'); 
    location.href='user-edit.php?id=$id';
    </script>";
    return;
}

// 檢查$phone是否數字
$newPhone=is_numeric($phone);

if ($newPhone != true) {
    echo "
    <script> 
    alert('電話格式有誤'); 
    location.href='user-edit.php?id=$id';
    </script>";
    return;
}

$sql="UPDATE user SET user_name='$name', nick_name='$nick_name', user_bir='$user_bir', user_mail='$email', user_phone='$phone' WHERE user_id='$id'";

if($conn->query($sql) === TRUE){
    echo "更新成功";
    $conn->close();
    header("location: user.php?id=".$id);
}else{
    echo "更新資料錯誤:" . $conn->error;
    exit;
}


?>