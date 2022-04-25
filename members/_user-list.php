<?php

unset($_SESSION['page']);
unset($_SESSION['typePage']);
unset($_SESSION['searchId']);


if (!isset($_GET["p"])) {
    $p = 1;
} else {
    $p = $_GET["p"];
}

if (!isset($_GET["type"])) {
    $type = 1;
} else {
    $type = $_GET["type"];
}


switch ($type) {
    case "1":
        $order = "user_id ASC";
        break;
    case "2":
        $order = "user_id DESC";
        break;
    case "3":
        $order = "identity_card ASC";
        break;
    case "4":
        $order = "identity_card DESC";
        break;
    default:
        $order = "user_id ASC";
}

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    //全部使用者
    $sql = "SELECT user.*, level_name.name AS levelName FROM user 
    JOIN level_name ON user.user_level = level_name.id WHERE valid=1";
    $result = $conn->query($sql);
    $total = $result->num_rows;

    //全部使用者數量去做頁籤
    $per_page = 4;
    $start = ($p - 1) * $per_page;
    $page_count = CEIL($total / $per_page);

    //所有使用者做升降冪排序
    $sqlNew = "SELECT user.*, level_name.name AS levelName FROM user 
    JOIN level_name ON user.user_level = level_name.id WHERE valid=1 ORDER BY $order LIMIT $start, $per_page  ";
} else if (empty($_GET["id"])) {
    //假設沒指定ID時
    header("location:user-list.php");
} else {
    //搜尋全部特定使用者byID
    $id = $_GET["id"];
    $_SESSION["searchId"] = $id;

    $sqlNew = "SELECT user.*, level_name.name AS levelName FROM user 
    JOIN level_name ON user.user_level = level_name.id WHERE  (user.user_id LIKE '%$id%' OR user.user_name LIKE '%$id%' OR user.identity_card LIKE '%$id%' OR level_name.name LIKE '%$id%') AND user.valid = 1 ";
}

$resultNew = $conn->query($sqlNew);
$rows = $resultNew->fetch_all(MYSQLI_ASSOC);
$user_count = $resultNew->num_rows;

?>




<!-- 可以放content -->
<div class="container">
    <h2 class="pb-2">會員清單</h2>
    <table class="table table-bordered shadow-sm">
        <?php if (!isset($_GET["id"]) ||empty($_GET["id"]) ) : ?>
            <div class="row">
                <div class="col-auto px-0  position-relative">
                    <form class="d-inline-block" action="">
                        <input placeholder="搜尋相關會員" name="id" type="text">
                        <button class="position-absolute  end-0 translate-middle-x btn text-info p-0 " type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
            </div>
            <div class="float-md-none float-end text-end col-4 col-md-auto py-2 py-sm-0 mt-2">
                <a href="user-list.php?p=<?= $p ?>&type=1" class="btn btn-info text-white my-1 text-nowrap <?php if ($type == 1) echo "active"; ?>">依會員編號正序</a>
                <a href="user-list.php?p=<?= $p ?>&type=2" class="btn btn-info text-white my-1 text-nowrap <?php if ($type == 2) echo "active"; ?>">依會員編號反序</a>
                <a href="user-list.php?p=<?= $p ?>&type=3" class="btn btn-info text-white my-1 text-nowrap <?php if ($type == 3) echo "active"; ?>">依身分證字號正序</a>
                <a href="user-list.php?p=<?= $p ?>&type=4" class="btn btn-info text-white my-1 text-nowrap <?php if ($type == 4) echo "active"; ?>">依身分證字號反序</a>
                <?php $_SESSION["typePage"]=$type ?>
            </div>
            <div class="py-2 text-center">
                <nav aria-label="page navigation ">
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $page_count; $i++) : ?>
                            <li class="page-item <?php if ($p == $i) echo "active"; ?>"><a class="page-link" href="user-list.php?p=<?= $i ?>&type=<?= $type ?>"><?= $i ?></a></li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            </div>
        <?php else : ?>
            <div class="row mb-3">
                <div class="col-auto">
                    <a href="user-list.php" class="btn btn-info text-white">回到所有會員</a>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($user_count > 0) : ?>
            <thead>
                <tr>
                    <th>會員編號</th>
                    <th>會員姓名</th>
                    <th>身分證字號</th>
                    <th>會員電話</th>
                    <th>會員生日</th>
                    <th>會員等級</th>
                    <th>詳細資料</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($rows as $row) : ?>
                    <?php require("level.php"); ?>
                    <tr>
                        <td><?= $row["user_id"] ?></td>
                        <td><?= $row["user_name"] ?></td>
                        <td><?= $row["identity_card"] ?></td>
                        <td><?= $row["user_phone"] ?></td>
                        <td><?= $row["user_bir"] ?></td>
                        <td class="text-end"><?= $row["levelName"] ?></td>
                        <td><a class="btn btn-info text-white" href="user.php?id=<?= $row["user_id"] ?>">檢視</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <?= "沒有相符資料" ?>
            <?php endif; ?>
            </tbody>
    </table>
    <?php if (!isset($_GET["id"])|| empty($_GET["id"])) : ?>
        <div class="py-2 text-center">
            第 <?= $p ?> 頁, 共 <?= $page_count ?> 頁,共 <?= $total ?> 筆
            <?php $_SESSION["page"]=$p ?>
        </div>
    <?php endif; ?>
</div>