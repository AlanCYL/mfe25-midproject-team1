<?php

if (!isset($_GET["p"])) {
    $p = 1;
} else {
    $p = $_GET["p"];
}

if (isset($_GET["cate"])) {
    $cate = $_GET["cate"];
}

if (!isset($_GET["id"])) {
    header("location: 404.php");
}

$id = $_GET["id"];

require_once("../db-connect.php");

$sql = "SELECT user.*, level_name.name AS levelName FROM user 
JOIN level_name ON user.user_level = level_name.id WHERE user_id='$id' AND valid=1 ";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (!$row) {
    header("location: 404.php");
}


if (!isset($_GET["cate"])) {
    $sqlGroup = "SELECT user_and_groups.*, groups.*, groups.groups_name AS shopName FROM user_and_groups
    JOIN groups ON user_and_groups.groups_id = groups.groups_id
    WHERE user_and_groups.user_id=$id
    ";
} else if (isset($_GET["cate"]) && ($_GET["cate"]) == 1) {
    $sqlGroup = "SELECT user_and_groups.*, groups.*, groups.groups_name AS shopName FROM user_and_groups
    JOIN groups ON user_and_groups.groups_id = groups.groups_id
    WHERE user_and_groups.user_id=$id AND groups.least_num <= groups.goal_num
    ";
} else if (isset($_GET["cate"]) && ($_GET["cate"]) == 2) {
    $sqlGroup = "SELECT user_and_groups.*, groups.*, groups.groups_name AS shopName FROM user_and_groups
    JOIN groups ON user_and_groups.groups_id = groups.groups_id
    WHERE user_and_groups.user_id=$id AND groups.least_num > groups.goal_num
    ";
}


$resultGroup = $conn->query($sqlGroup);
$rowsGroup = $resultGroup->fetch_all(MYSQLI_ASSOC);
$groups_count = $resultGroup->num_rows;


$per_page = 2;
$page_count = CEIL($groups_count / $per_page);

$start = ($p - 1) * $per_page;



if (!isset($_GET["cate"])) {
    $sqlGroup = "SELECT user_and_groups.*, groups.*, groups.groups_name AS shopName FROM user_and_groups
    JOIN groups ON user_and_groups.groups_id = groups.groups_id
    WHERE user_and_groups.user_id=$id LIMIT $start, $per_page
    ";
} else if (isset($_GET["cate"]) && ($_GET["cate"]) == 1) {
    $sqlGroup = "SELECT user_and_groups.*, groups.*, groups.groups_name AS shopName FROM user_and_groups
    JOIN groups ON user_and_groups.groups_id = groups.groups_id
    WHERE user_and_groups.user_id=$id AND groups.least_num <= groups.goal_num LIMIT $start, $per_page
    ";
} else if (isset($_GET["cate"]) && ($_GET["cate"]) == 2) {
    $sqlGroup = "SELECT user_and_groups.*, groups.*, groups.groups_name AS shopName FROM user_and_groups
    JOIN groups ON user_and_groups.groups_id = groups.groups_id
    WHERE user_and_groups.user_id=$id AND groups.least_num > groups.goal_num LIMIT $start, $per_page
    ";
}

$resultGroup = $conn->query($sqlGroup);
$rowsGroup = $resultGroup->fetch_all(MYSQLI_ASSOC);
$users_count = $resultGroup->num_rows;


?>

<!doctype html>
<html lang="en">

<head>
    <title><?= $row["user_name"] ?>的會員資料</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../template/style.css">
    <link href="../template/sidebars.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .btn-check:focus+.btn,
        .btn:focus {
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgb(13 110 253 / 0%);
        }

        .btn-cute {
            border: 1px solid #ddd;
            background-color: #f8f9fa;
        }

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
            color: #FCFAF2;
            background-color: #51A8DD;
            border-color: #51A8DD;
        }

        .btn-danger {
            color: #FCFAF2;
            background-color: #B5495B;
            border-color: #B5495B;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #51A8DD;
        }

        .nav-link {
            color: #51A8DD;
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
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="py-2 justify-content-center ">
                            <a href="user-list.php" class="btn text-Secondary  "><i class="fa-solid fa-arrow-rotate-left"></i></a>
                        </div>
                        <div class="col-lg-6">
                            <h3 class="text-nowrap"><?= $row["user_name"] ?>的會員資料</h3>
                            <table class="table table-bordered nowrap">
                                <tr>
                                    <th>會員編號</th>
                                    <td><?= $row["user_id"] ?></td>
                                </tr>
                                <tr>
                                    <th>姓名</th>
                                    <td><?= $row["user_name"] ?></td>
                                </tr>
                                <tr>
                                    <th>ID</th>
                                    <td><?= $row["identity_card"] ?></td>
                                </tr>
                                <tr>
                                    <th>暱稱</th>
                                    <td><?= $row["nick_name"] ?></td>
                                </tr>
                                <tr>
                                    <th>出生日期</th>
                                    <td><?= $row["user_bir"] ?></td>
                                </tr>
                                <tr>
                                    <th>手機號碼</th>
                                    <td><?= $row["user_phone"] ?></td>
                                </tr>
                                <tr>
                                    <th>電子信箱</th>
                                    <td><?= $row["user_mail"] ?></td>
                                </tr>
                                <tr>
                                    <th>會員等級</th>
                                    <td><?= $row["levelName"] ?></td>
                                </tr>
                                <tr>
                                    <th>創建日期</th>
                                    <td><?= $row["user_create_time"] ?></td>
                                </tr>
                            </table>
                            <div class="mb-3">
                                <a class="btn btn-info text-white" href="user-edit.php?id=<?= $row["user_id"] ?>">編輯</a>
                                <a class="btn btn-danger text-white" href="doDelete.php?id=<?= $row["user_id"] ?>">刪除</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="py-2">
                                <h3 class="text-nowrap"><?= $row["user_name"] ?>的參團歷史</h3>
                            </div>
                            <div class="py-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link <?php if (!isset($_GET["cate"])) echo "active" ?>" aria-current="page" href="user.php?id=<?= $id ?>">所有歷史</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?php if (isset($_GET["cate"]) && $_GET["cate"] == 1) echo "active" ?>" aria-current="page" href="user.php?id=<?= $id ?>&cate=1">已成團</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?php if (isset($_GET["cate"]) && $_GET["cate"] == 2) echo "active" ?>" aria-current="page" href="user.php?id=<?= $id ?>&cate=2">未成團</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="py-2">
                                <table class="table table-bordered text-nowrap">
                                    <nav aria-label="Page navigation example">
                                    </nav>
                                    <?php if ($users_count > 0) : ?>
                                        <thead>
                                            <tr>
                                                <th>參團編號</th>
                                                <th>店家名稱</th>
                                                <th>用餐日期</th>
                                                <th>成團與否</th>
                                                <th>是否付款</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($rowsGroup as $rowGroup) : ?>
                                                <tr class="">
                                                    <td><?= $rowGroup["groups_id"] ?></td>
                                                    <td><?= $rowGroup["shopName"] ?></td>
                                                    <td><?php
                                                        $date = $rowGroup["eating_time"];
                                                        $dateM = explode(" ", $date);
                                                        echo $dateM[0];
                                                        ?></td>
                                                    <td><?php
                                                        if ($rowGroup["least_num"] <= $rowGroup["goal_num"]) {
                                                            echo "是";
                                                        } else {
                                                            echo "否";
                                                        }
                                                        ?></td>
                                                    <td><?php
                                                        if ($rowGroup["least_num"] <= $rowGroup["goal_num"]) {
                                                            echo "是";
                                                        } else {
                                                            echo "否";
                                                        }
                                                        ?></td>
                                                    <td><a class="btn btn-info text-white" href="groupHistoryP.php?id=<?= $id ?>&g_id=<?= $rowGroup["groups_id"] ?>">檢視</a></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <?= "沒有相符資料" ?>
                                        <?php endif; ?>
                                        </tbody>
                                </table>
                            </div>
                            <?php if( $page_count > 1 ):?>
                            <div class="py-2 ">
                                <ul class="pagination justify-content-center">
                                    <?php if ($p != 1) : ?>
                                        <li class="page-item">
                                            <a class="page-link" href="user.php?id=<?= $id ?>&p=<?= $p - 1 ?><?php if (isset($_GET["cate"])) echo "&cate=$cate"; ?>" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <li class="page-item "><a class="page-link" href="user.php?id=<?= $id ?>&p=<?= $p ?>&cate=<?= $cate ?>"><?= $p ?></a></li>
                                    <?php if ($p < $page_count) : ?>
                                        <li class="page-item">
                                            <a class="page-link" href="user.php?id=<?= $id ?>&p=<?= $p + 1 ?><?php if (isset($_GET["cate"])) echo "&cate=$cate"; ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="../template/sidebars.js"></script>
</body>

</html>