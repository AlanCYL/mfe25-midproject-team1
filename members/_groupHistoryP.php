<?php

$id = $_GET["id"];

$sql = "SELECT user.*, level_name.name AS levelName FROM user 
JOIN level_name ON user.user_level = level_name.id WHERE user_id='$id' AND valid=1 ";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

// if (!$row) {
//     header("location: 404.php");
// }

$g_id = $_GET["g_id"];

$sqlGroup = "SELECT groups.*, user_and_groups.*, shop.shop_name AS shopName, user_and_groups.compliment AS comment FROM groups 
JOIN user_and_groups ON groups.groups_id = user_and_groups.groups_id 
JOIN shop ON groups.shop_id = shop.shop_id
WHERE groups.groups_id = '$g_id' ";

$resultGroup = $conn->query($sqlGroup);
$rowGroup = $resultGroup->fetch_assoc();


if (!$rowGroup) {
    header("location: 404.php");
}

?>

<div class="container">
    <div class="row">
        <div class="py-2">
            <table class="table table-bordered text-nowrap shadow-sm ">
                <nav aria-label="Page navigation example">
                </nav>
                <thead class="table-light">
                    <tr class="text-center">
                        <th>會員編號</th>
                        <th>會員姓名</th>
                        <th>身分證字號</th>
                        <th>會員等級</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td><?= $row["user_id"] ?></td>
                        <td><?= $row["user_name"] ?></td>
                        <td><?= $row["identity_card"] ?></td>
                        <td><?= $row["levelName"] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <table class="table table-bordered nowrap shadow-sm">
            <tr>
                <th>參團編號</th>
                <td><?= $rowGroup["groups_id"] ?></td>
            </tr>
            <tr>
                <th>店家名稱</th>
                <td><?= $rowGroup["shopName"] ?></td>
            </tr>
            <tr>
                <th>用餐日期</th>
                <td><?=
                    $rowGroup["eating_date"];
                    ?>
                </td>
            </tr>
            <tr>
                <th>截團日期</th>
                <td>
                    <?php
                    $date = $rowGroup["groups_end_time"];
                    $dateM = explode(" ", $date);
                    echo $dateM[0];
                    ?>
                </td>
            </tr>
            <tr>
                <th>成團與否</th>
                <td>
                    <?php
                    if ($rowGroup["least_num"] <= $rowGroup["goal_num"]) {
                        echo "是";
                    } else {
                        echo "否";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th>成團最低人數</th>
                <td><?= $rowGroup["least_num"] ?></td>
            </tr>
            <tr>
                <th>目前參團人數</th>
                <td><?= $rowGroup["goal_num"] ?></td>
            </tr>
            <tr>
                <th>付款與否</th>
                <td>
                    <?php
                    if ($rowGroup["least_num"] <= $rowGroup["goal_num"]) {
                        echo "是";
                    } else {
                        echo "否";
                    }
                    ?>
                </td>
            </tr>
            <?php if ($rowGroup["least_num"] <= $rowGroup["goal_num"]) : ?>
                <tr>
                    <th>用戶評論</th>
                    <td>
                        <?= $rowGroup["comment"] ?>
                    </td>
                </tr>
            <?php endif ?>
        </table>
    </div>
    <div class="py-2 justify-content-center ">
        <a href="javascript:history.go(-1)" class="btn text-Secondary  "><i class="fa-solid fa-arrow-rotate-left"></i></a>
    </div>
</div>