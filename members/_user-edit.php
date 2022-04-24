<?php

if (!isset($_GET["id"])) {
    header("location: 404.php");
}

$id = $_GET["id"];

require_once("../db-connect.php");
$sql = "SELECT * FROM user WHERE user_id='$id' AND valid=1";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (!$row) {
    header("location: 404.php");
}

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-6">
            <form action="updateUser.php" method="post">
                <table class="table table-bordered  text-nowrap">
                    <input type="hidden" name="id" value="<?= $row["user_id"] ?>">
                    <tr>
                        <th>會員編號</th>
                        <td><?= $row["user_id"] ?></td>
                    </tr>
                    <tr>
                        <th>會員姓名</th>
                        <td><input class="form-control" type="text" name="user_name" value="<?= $row["user_name"] ?>"></td>
                    </tr>
                    <tr>
                        <th>身分證字號</th>
                        <td><?= $row["identity_card"] ?></td>
                    </tr>
                    <tr>
                        <th>暱稱</th>
                        <td><input class="form-control" type="text" name="nick_name" value="<?= $row["nick_name"] ?>"></td>
                    </tr>
                    <tr>
                        <th>出生年月日</th>
                        <td><input class="form-control" type="date" name="user_bir" value="<?= $row["user_bir"] ?>"></td>
                    </tr>
                    <tr>
                        <th>手機號碼</th>
                        <td><input class="form-control" type="tel" name="user_phone" value="<?= $row["user_phone"] ?>"></td>
                    </tr>
                    <tr>
                        <th>電子信箱</th>
                        <td><input class="form-control" type="email" name="user_mail" value="<?= $row["user_mail"] ?>"></td>
                    </tr>
                    <tr>
                        <th>會員等級</th>
                        <td><?= $row["user_level"] ?></td>
                    </tr>
                    <tr>
                        <th>創建日期</th>
                        <td><?= $row["user_create_time"] ?></td>
                    </tr>
                </table>
                <div class="py-2">
                    <button type="submit" class="btn btn-info text-white">儲存</button>
                    <a class="btn btn-info text-white" href="user.php?id=<?= $row["user_id"] ?>">取消</a>
                </div>
            </form>
        </div>
    </div>
</div>