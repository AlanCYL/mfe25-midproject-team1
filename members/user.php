<?php require_once("../db-connect.php") ?>
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
    $sqlGroup = "SELECT user_and_groups.*, groups.*, shop.shop_name AS shopName FROM groups
    JOIN user_and_groups ON groups.groups_id = user_and_groups.groups_id
    JOIN shop ON groups.shop_id = shop.shop_id
    WHERE user_and_groups.user_id=$id
    ";
} else if (isset($_GET["cate"]) && ($_GET["cate"]) == 1) {
    $sqlGroup = "SELECT user_and_groups.*, groups.*, shop.shop_name AS shopName FROM groups
    JOIN user_and_groups ON groups.groups_id = user_and_groups.groups_id
    JOIN shop ON groups.shop_id = shop.shop_id
    WHERE user_and_groups.user_id=$id AND groups.least_num <= groups.goal_num
    ";
} else if (isset($_GET["cate"]) && ($_GET["cate"]) == 2) {
    $sqlGroup = "SELECT user_and_groups.*, groups.*, shop.shop_name AS shopName FROM groups
    JOIN user_and_groups ON groups.groups_id = user_and_groups.groups_id
    JOIN shop ON groups.shop_id = shop.shop_id
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
    $sqlGroup = "SELECT user_and_groups.*, groups.*, shop.shop_name AS shopName FROM groups
    JOIN user_and_groups ON groups.groups_id = user_and_groups.groups_id
    JOIN shop ON groups.shop_id = shop.shop_id
    WHERE user_and_groups.user_id=$id LIMIT $start, $per_page
    ";
} else if (isset($_GET["cate"]) && ($_GET["cate"]) == 1) {
    $sqlGroup = "SELECT user_and_groups.*, groups.*, shop.shop_name AS shopName FROM groups
    JOIN user_and_groups ON groups.groups_id = user_and_groups.groups_id
    JOIN shop ON groups.shop_id = shop.shop_id
    WHERE user_and_groups.user_id=$id AND groups.least_num <= groups.goal_num LIMIT $start, $per_page
    ";
} else if (isset($_GET["cate"]) && ($_GET["cate"]) == 2) {
    $sqlGroup = "SELECT user_and_groups.*, groups.*, shop.shop_name AS shopName FROM groups
    JOIN user_and_groups ON groups.groups_id = user_and_groups.groups_id
    JOIN shop ON groups.shop_id = shop.shop_id
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
                <h4>後台管理系統</h4>
            </div>
            <ul class="list-unstyled ps-0">
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                        商家管理
                    </button>
                    <div class="collapse" id="home-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark rounded">店家清單</a></li>
                            <li><a href="#" class="link-dark rounded">開團清單</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                        會員管理
                    </button>
                    <div class="collapse" id="orders-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="user-list.php" class="link-dark rounded">會員清單</a></li>
                            <li><a href="user-list-coupon.php" class="link-dark rounded">優惠券發送</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <div>
            <i class="btn btn-light btn-cute fa-solid fa-arrows-left-right border-start-none" id="toggle"></i>
        </div>
        <!-- Page Content  -->
        <div id="content">
            <div class="d-flex justify-content-end mb-4 border-bottom border-secondary container-fluid ">
                <!-- 可以放header -->
                <br>
                <h4>Admin</h4><a class="mx-3" href="../manager-logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>

            </div>
            <div>
                <!-- 可以放content -->
                <?php require("_user.php") ?>



            </div>
        </div>
    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="../template/sidebars.js"></script>
</body>

</html>