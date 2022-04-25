<?php

$shopID=$_GET["login"];

require_once("../db-connect.php");

$sql ="SELECT * FROM shop WHERE shop_id=$shopID";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!doctype html>
<html lang="en">

<head>
    <title>後台管理系統(商家)</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/mid-project/template/sidebars.css">
    <link rel="stylesheet" href="/mid-project/template/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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
            color: #fff;
            background-color: #51A8DD;
            border-color: #51A8DD;
        }
    </style>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header text-center border border-bottom-1">
            <h4><a href="sample_shop.php?login=<?=$shopID?>">後台管理</a></h4>

            </div>
            <ul class="list-unstyled ps-0">
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                        data-bs-target="#home-collapse" aria-expanded="true">
                        商家管理
                    </button>
                    <div class="collapse show" id="home-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="shopList.php?login=<?=$shopID?>" class="link-dark rounded">店家清單</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
            data-bs-target="#dashboard-collapse" aria-expanded="false">
            開團管理
          </button>
          <div class="collapse" id="dashboard-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="group-list.php?login=<?=$shopID?>" class="link-dark rounded">開團清單</a></li>
              <li><a href="group-open.php?login=<?=$shopID?>&open=<?=$shopID?>" class="link-dark rounded">上架開團</a></li>
              <li><a href="dish-list.php?login=<?=$shopID?>&shop=<?=$shopID?>" class="link-dark rounded">菜式清單</a></li>
              <li><a href="dish.php?login=<?=$shopID?>&dish=<?=$shopID?>" class="link-dark rounded">上架菜式</a></li>
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


                        </ul>
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
                <h4><?=$row["shop_name"]?></h4><a class="mx-3" href="../manager-logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>

            </div>
            <div>
                <!-- 可以放content -->
                <h2>歡迎 <?=$row["shop_name"]?> 使用後台管理系統</h2>
                <?php //require("") ?>



            </div>
        </div>
    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="../template/sidebars.js"></script>
</body>

</html>