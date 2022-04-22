<!-- 講義p.317 -->
<?php
require_once("../db-connect.php");

$id=$_POST["id"];
$name=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
// echo $name;

$sql="UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id='$id'";

// echo $sql;
if ($conn->query($sql) === TRUE) {
    	echo "更新成功";
        // 如果更新成功,就會跑回原本那頁user.php
        $conn->close();
        header("location: user.php?id=".$id);
} else {
    	echo "更新資料錯誤: " . $conn->error;
        exit;
}



?>