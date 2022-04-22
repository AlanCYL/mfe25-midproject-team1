
<?php
require_once("../db-connect.php");

// if(!isset($_POST["name"])){
//     echo "您不是透過正常管道到此頁";
//     exit;
// }

$shop_id=$_POST["shop_id"];
$dish_name=$_POST["dish_name"];
$dish_description=$_POST["dish_description"];
$dish_image=$_FILES["dish_image"]['name'];



// echo $dish_image
$sql="INSERT INTO dish (shop_id, dish_name, dish_description, dish_image) VALUES ('$shop_id', '$dish_name', '$dish_description', '$dish_image')";

if ($conn->query($sql) === TRUE) {
    $data=[
        "status"=>"ok",
        "message"=> "新增資料完成"
    ];
} else {
    $data=[
        "status"=>"fail",
        "message"=> "新增資料錯誤". $conn->error
    ];
}

$conn->close();
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
?>