<?php
require_once("../db-connect.php");
$contact=$_POST["contact"];
$account=$_POST["account"];
$password=$_POST["password"];
$repassword=$_POST["repassword"];
if($contact=='shopLogin'){
    $sql="SELECT * FROM shop WHERE shop_account='$account'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    if($result->num_rows>0){
        $conn->close();
        header("location: group-list.php?shop=".$row["shop_id"]);
    }else{
        echo "尚未註冊";
    }
}else{
    $sql="SELECT * FROM user WHERE user_account='$account' AND is_manager=1";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    if($result->num_rows>0){
        $conn->close();
        header("location: group-list.php?shop=".$row["user_id"]);
    }else{
        echo "尚未註冊";
    }
}
$conn->close();



// if($password!=$repassword){
//     echo "密碼不一致";
//     exit;
// }

?>