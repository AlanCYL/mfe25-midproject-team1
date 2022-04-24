<?php
require_once("../db-connect.php");


$userId = $_POST["userId"];
$reason = $_POST["reason"];
$price = $_POST["price"];

if (empty($userId) || empty($reason) || empty($price)) {

    echo
    "<script> alert('您有欄位沒有寫'); history.go(-1);</script>";
    exit;
}

$now = date('Y-m-d H:i:s');

$sqlIn = "INSERT INTO coupon (reason, price, create_time)
VALUES ('$reason', '$price', '$now')";
// $resultIn = $conn -> query($sqlIn);


if ($conn->query($sqlIn) === TRUE) {

    $sql = "SELECT * FROM coupon";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $count = $result->num_rows;
    $countId = $rows[$count - 1]["id"];

    for ($i = 0; $i < count($userId); $i++) {

        $sqlOut = "INSERT INTO user_and_coupon (user_id, coupon_id)
                VALUES ('$userId[$i]', '$countId')";
        $resultOut = $conn->query($sqlOut);
    }

    echo "<script> alert('優惠券發送成功'); location.href='user-list-coupon.php';</script>";

    $conn->close();
} else {
    echo "優惠券發送失敗 : " . $conn->error;
    exit;
}
