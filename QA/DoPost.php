<?php
require_once("../db-connect.php");

$id=$_POST['id'];
$content_id=$_POST["QA_content_id"];
$adminReply=$_POST['adminReply'];
$now=date('Y-m-d H:i:s');


if(empty($adminReply) ){
    echo "您有欄位沒有填寫";
    return;
}
$sql = "INSERT INTO qa_reply(QA_content_id, QA_reply, QA_reply_time)
VALUES('$content_id' , '$adminReply', '$now') 
";

if ($conn->query($sql) === TRUE) {
    echo "回覆成功<br>";
} else {
    echo "回覆失敗: " . $conn->error;
    exit;
}

$conn->close();

header("location: QA-reply-user.php?id=$id&qa_content_id=$content_id");

?>