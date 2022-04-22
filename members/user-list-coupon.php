<?php
require_once("../db-connect.php");

if (!isset($_GET["p"])) {
    $p = 1;
} else {
    $p = $_GET["p"];
}

if (!isset($_GET["id"])) {
    //全部使用者
    $sql = "SELECT user.*, level_name.name AS levelName FROM user 
    JOIN level_name ON user.user_level = level_name.id WHERE valid=1";
    $result = $conn->query($sql);
    $total = $result->num_rows;

    //全部使用者數量去做頁籤
    $per_page = 6;
    $start = ($p - 1) * $per_page;
    $page_count = CEIL($total / $per_page);

    //所有使用者做per_page筆一頁
    $sqlNew = "SELECT user.*, level_name.name AS levelName FROM user 
    JOIN level_name ON user.user_level = level_name.id WHERE valid=1 LIMIT $start, $per_page  ";
} else if (empty($_GET["id"])) {

    //假設沒指定ID時
    header("location:user-list-coupon.php");
} else {
    //搜尋全部特定使用者byID
    $id = $_GET["id"];

    $sql = "SELECT user.*, level_name.name AS levelName FROM user 
    JOIN level_name ON user.user_level = level_name.id WHERE  (user.user_id LIKE '%$id%' OR user.user_name LIKE '%$id%' OR level_name.name LIKE '%$id%' OR user.user_bir LIKE '%-$id%' ) AND user.valid = 1 ";
    $result = $conn->query($sql);
    $total = $result->num_rows;

    //特定全部使用者數量去做頁籤
    $per_page = 6;
    $start = ($p - 1) * $per_page;
    $page_count = CEIL($total / $per_page);

    $sqlNew = "SELECT user.*, level_name.name AS levelName FROM user 
    JOIN level_name ON user.user_level = level_name.id WHERE  (user.user_id LIKE '%$id%' OR user.user_name LIKE '%$id%' OR level_name.name LIKE '%$id%' OR user.user_bir LIKE '%-$id%' ) AND user.valid = 1 LIMIT $start, $per_page ";
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
                            <li><a href="user-list-coupon.php" class="link-dark rounded">優惠制度</a></li>
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
                <div class="container py-2 ">
                    <div class="text-end py-2">
                        第 <?= $p ?> 頁, 共 <?php if($page_count == 0): echo 1; else: echo $page_count; endif; ?> 頁,共 <?= $total ?> 筆
                    </div>
                    <div class="row">
                        <div class="col-auto mx-auto py-3">
                            <div class="row">
                                <?php if (!isset($_GET["id"])) : ?>
                                    <div class="col-auto mx-1 py-2 position-relative text-start ">
                                        <form class=" d-inline-block position-relative" action="">
                                            <div class="input-group input-group-sm">
                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="搜尋相關會員" name="id">
                                                <button class="position-absolute  end-0 translate-middle-x btn text-info p-0 " type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-auto py-2 ">
                                        <form class="d-flex" action="">
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="id">
                                                <option selected>依會員等級選擇</option>
                                                <option value="綠寶石">綠寶石</option>
                                                <option value="藍寶石">藍寶石</option>
                                                <option value="紅寶石">紅寶石</option>
                                                <option value="鑽石">鑽石</option>
                                            </select>
                                            <button class="btn p-0 mx-1  text-info d-inline" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        </form>
                                    </div>
                                    <div class="col-auto py-2 ">
                                        <form class="d-flex" action="">
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="id">
                                                <option selected>依會員生日月份選擇</option>
                                                <option value="01-">一月</option>
                                                <option value="02-">二月</option>
                                                <option value="03-">三月</option>
                                                <option value="04-">四月</option>
                                                <option value="05-">五月</option>
                                                <option value="06-">六月</option>
                                                <option value="07-">七月</option>
                                                <option value="08-">八月</option>
                                                <option value="09-">九月</option>
                                                <option value="10-">十月</option>
                                                <option value="11-">十一月</option>
                                                <option value="12-">十二月</option>
                                            </select>
                                            <button class="btn p-0 mx-1 text-info d-inline " type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        </form>
                                    </div>
                            </div>
                        <?php else : ?>
                            <div class="row my-3">
                                <div class="col-auto">
                                    <a href="user-list-coupon.php" class="btn btn-info text-white text-nowrap ">回到所有會員</a>
                                </div>
                            </div>
                        <?php endif; ?>
                        </div>
                    </div>
                    <form action="doCreateCoupon.php" method="post">
                        <div class="row">
                            <div class="col-lg-8 mx-auto ">
                                <table class="table table-bordered">
                                    <?php if ($user_count > 0) : ?>
                                        <thead>
                                            <tr>
                                                <th>選擇</th>
                                                <th>會員編號</th>
                                                <th>會員姓名</th>
                                                <th>會員生日</th>
                                                <th>會員等級</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($rows as $row) : ?>
                                                <?php require("level.php"); ?>
                                                <tr>
                                                    <td><input type="checkbox" name="userId[]" value="<?=$row["user_id"]?>" ></td>
                                                    <td><?= $row["user_id"] ?></td>
                                                    <td><?= $row["user_name"] ?></td>
                                                    <td><?= $row["user_bir"] ?></td>
                                                    <td class="text-end"><?= $row["levelName"] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <?= "沒有相符資料" ?>
                                        <?php endif; ?>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-auto mx-auto py-3">
                                <div class="row">
                                    <div class="col-auto py-2 mx-auto">
                                        <input type="text" class="form-control" placeholder="發送優惠券原因" name="reason">
                                    </div>
                                    <div class="col-4 py-2 mx-auto">
                                        <input type="number" class="form-control" min="0" placeholder="金額(TWD)" name="price" >
                                    </div>
                                    <div class="col-auto py-2 mx-auto">
                                        <button class="btn btn-info" type="submit" >送出</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="col-lg-8 mx-auto py-2 d-flex justify-content-center">
                        <nav aria-label="Page navigation example  ">
                            <ul class="pagination">
                                <?php if (!isset($_GET["id"])) : ?>
                                    <?php if ($p > 1) : ?>
                                        <li class="page-item ">
                                            <a class="page-link" href="user-list-coupon.php?p=<?= $p - 1 ?>" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    <?php endif ?>
                                    <li class="page-item"><a class="page-link" href="user-list-coupon.php?p=<?= $p ?> "><?= $p ?></a></li>
                                    <?php if ($page_count > $p) : ?>
                                        <li class="page-item">
                                            <a class="page-link" href="user-list-coupon.php?p=<?= $p + 1 ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    <?php endif ?>
                                <?php else : ?>
                                    <?php if ($p > 1) : ?>
                                        <li class="page-item ">
                                            <a class="page-link" href="user-list-coupon.php?p=<?= $p - 1 ?>&id=<?= $_GET["id"] ?>" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    <?php endif ?>
                                    <?php if ($page_count != 1) : ?>
                                        <li class="page-item "><a class="page-link" href="user-list-coupon.php?p=<?= $p ?>&id=<?= $_GET["id"] ?> "><?= $p ?></a></li>
                                    <?php endif ?>
                                    <?php if ($page_count > $p) : ?>
                                        <li class="page-item">
                                            <a class="page-link" href="user-list-coupon.php?p=<?= $p + 1 ?>&id=<?= $_GET["id"] ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    <?php endif ?>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
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