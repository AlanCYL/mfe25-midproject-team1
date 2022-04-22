<?php
require_once("../db-connect.php");

$user_name = $_POST["user_name"];
$identity_card = $_POST["identity_card"];
$user_password = $_POST["user_password"];
$nick_name = $_POST["nick_name"];
$user_phone = $_POST["user_phone"];
$user_bir = $_POST["user_bir"];
$user_mail = $_POST["user_mail"];


if (empty($user_name) || empty($identity_card) || empty($user_password) || empty($nick_name) || empty($user_phone) || empty($user_bir) || empty($user_mail)) {
    echo "您有欄位沒有填寫";
    return;
}


$sql = "SELECT * FROM user WHERE identity_card='$identity_card' OR user_phone='$user_phone' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $data = [
        "status" => 0,
        "message" => "該身分證/手機號碼已經存在"
    ];
    echo json_encode($data);
    exit;
}

$user_password = md5($user_password);
$now = date('Y-m-d H:i:s');

$sql = "INSERT INTO user (user_name, identity_card, user_password, nick_name, user_phone, user_bir, user_mail, user_create_time)
VALUES ('$user_name', '$identity_card', '$user_password', '$nick_name', '$user_phone', '$user_bir', '$user_mail', '$now')";

if ($conn->query($sql) === TRUE) {
    $data = [
        "status" => 1,
        "message" => "新增資料完成"
    ];
    echo json_encode($data);
    $_SESSION["name"] = $user_name;
} else {
    $data = [
        "status" => 0,
        "message" => "新增資料錯誤: " . $conn->error
    ];
    echo json_encode($data);
    exit;
}

$conn->close();
