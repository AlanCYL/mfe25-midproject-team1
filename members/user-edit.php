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

<!doctype html>
<html lang="en">

<head>
    <title>修改會員資料</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../template/style.css">
    <link rel="stylesheet" href="style.css">
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
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                        data-bs-target="#home-collapse" aria-expanded="false">
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
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                        data-bs-target="#dashboard-collapse" aria-expanded="true">
                        會員管理
                    </button>
                    <div class="collapse show" id="dashboard-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark rounded">會員清單</a></li>
                            <li><a href="#" class="link-dark rounded">優惠制度</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                        data-bs-target="#orders-collapse" aria-expanded="false">
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
            </div>
        </div>
    </div>



    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="../template/sidebars.js"></script>
</body>

</html>