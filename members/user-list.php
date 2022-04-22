<?php
require_once("../db-connect.php");

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



if (!isset($_GET["id"])) {
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
    $sql = "SELECT user.*, level_name.name AS levelName FROM user 
    JOIN level_name ON user.user_level = level_name.id WHERE user.user_id LIKE '%$id%' OR user.user_name LIKE '%$id%' OR user.identity_card LIKE '%$id%' AND valid=1";
    $result = $conn->query($sql);
    $total = $result->num_rows;

    //特定使用者數量去做頁籤
    $per_page = 4;
    $start = ($p - 1) * $per_page;
    $page_count = CEIL($total / $per_page);

    $sqlNew = "SELECT user.*, level_name.name AS levelName FROM user 
    JOIN level_name ON user.user_level = level_name.id WHERE user.user_id LIKE '%$id%' OR user.user_name LIKE '%$id%' OR user.identity_card LIKE '%$id%'AND valid=1 "
    ;

}



$resultNew = $conn->query($sqlNew);
$rows = $resultNew->fetch_all(MYSQLI_ASSOC);
$user_count = $resultNew->num_rows;


?>

<!doctype html>
<html lang="en">

<head>
    <title>會員清單</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../template/style.css">
    <link href="../template/sidebars.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .btn-check:active+.btn-info,
        .btn-check:checked+.btn-info,
        .btn-info.active,
        .btn-info:active,
        .show>.btn-info.dropdown-toggle {
            color: white;
            background-color: gray;
            border-color: gray;
        }

        .page-item.active .page-link,
        .btn-info {
            z-index: 3;
            color: #fff;
            background-color: #51A8DD;
            border-color: #51A8DD;
        }

        .btn-check:focus+.btn,
        .btn:focus {
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgb(13 110 253 / 0%);
        }

        .btn-cute {
            border: 1px solid #ddd;
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header text-center border border-bottom-1">
                <h4>後台管理</h4>
            </div>
            <ul class="list-unstyled ps-0">
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                        商家管理
                    </button>
                    <div class="collapse" id="home-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark rounded">店家資訊</a></li>
                            <li><a href="#" class="link-dark rounded">店家清單</a></li>
                            <li><a href="#" class="link-dark rounded">開團清單</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="true">
                        會員管理
                    </button>
                    <div class="collapse show" id="dashboard-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="user-list.php" class="link-dark rounded">會員清單</a></li>
                            <li><a href="#" class="link-dark rounded">優惠制度</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                        客服管理
                    </button>
                    <div class="collapse" id="orders-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark rounded">商家意見反應</a></li>
                            <li><a href="#" class="link-dark rounded">會員意見反應</a></li>

                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- Page Content  -->
        <div>
            <i class="btn btn-light btn-cute fa-solid fa-arrows-left-right border-start-none" id="toggle"></i>
        </div>
        <div id="content">

            <div class="d-flex justify-content-between mb-4">

                <!-- 可以放header -->

            </div>
            <div>
                <!-- 可以放content -->
                <div class="container pt-5">
                    <table class="table table-bordered">
                        <?php if (!isset($_GET["id"])) : ?>
                            <div class="row">
                                <div class="col-auto px-0  position-relative">
                                    <form class="d-inline-block" action="">
                                        <input placeholder="請輸入相關資訊" name="id" type="text">
                                        <button class="position-absolute  end-0 translate-middle-x btn text-info p-0 " type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="float-md-none float-end text-end col-4 col-md-auto py-2 py-sm-0 mt-2">
                                <a href="user-list.php?p=<?= $p ?>&type=1" class="btn btn-info text-white my-1 text-nowrap <?php if ($type == 1) echo "active"; ?>">依會員編號正序</a>
                                <a href="user-list.php?p=<?= $p ?>&type=2" class="btn btn-info text-white my-1 text-nowrap <?php if ($type == 2) echo "active"; ?>">依會員編號反序</a>
                                <a href="user-list.php?p=<?= $p ?>&type=3" class="btn btn-info text-white my-1 text-nowrap <?php if ($type == 3) echo "active"; ?>">依身分證字號正序</a>
                                <a href="user-list.php?p=<?= $p ?>&type=4" class="btn btn-info text-white my-1 text-nowrap <?php if ($type == 4) echo "active"; ?>">依身分證字號反序</a>
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
                        <? else : ?>
                            <div class="row mb-3">
                                <div class="col-auto">
                                    <a href="user-list.php" class="btn btn-info text-white">回到所有會員</a>
                                </div>
                            </div>
                        <? endif; ?>
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
                    <?php if (!isset($_GET["id"])) : ?>
                        <div class="py-2 text-center">
                            第 <?= $p ?> 頁, 共 <?= $page_count ?> 頁,共 <?= $total ?> 筆
                        </div>
                    <? endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="../template/sidebars.js"></script>
    <?php $conn->close() ?>
</body>

</html>