<?php

$groups_id=$_GET["groups_id"];

require_once("../db-connect.php");

$sql ="SELECT groups.*, shop.shop_name
FROM groups
JOIN shop on shop.shop_id=groups.shop_id
WHERE groups.groups_id=$groups_id
";


$result = $conn->query($sql);
$row = $result->fetch_assoc();




?>


<!doctype html>
<html lang="en">

<head>
    <title><?=$row["shop_name"]?>團單明細</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
        .btn-cute{
            border: 1px solid #ddd ;
            background-color: #f8f9fa;
        }
        /* -------------------內容css------------------------- */
        * {
            text-decoration: none;
            list-style: none;
        }

        .logo {
            width: 256px;
            height: 256px;
            border: 1px solid black;
            /* background-image: url(./logo/kangyaolife.jpg); */

        }

        .object-cover {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .aroundimg {
            width: 160px;
            height: 160px;
        }

        .shop_address {
            height: 50px;
        }
/* -------------------內容css------------------------- */
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
                        data-bs-target="#home-collapse" aria-expanded="true">
                        商家管理
                    </button>
                    <div class="collapse show" id="home-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="shop_list.php" class="link-dark rounded">店家清單</a></li>
                            <li><a href="shop_groups_list.php" class="link-dark rounded">開團清單</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                        data-bs-target="#dashboard-collapse" aria-expanded="false">
                        會員管理
                    </button>
                    <div class="collapse" id="dashboard-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark rounded">會員清單</a></li>
                            <li><a href="#" class="link-dark rounded">優惠制度</a></li>
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
                
                <div class="container">
            <div class="row justify-content-center mt-5">
              <div class="col-lg-9">
                <table class="table table-bordered">
                  <input type="hidden" name="groups_id" value="<?=$row["groups_id"]?>">
                  <tr>
                    <th>開團編號</th>
                    <td><?=$row["groups_id"]?></td>
                  </tr>
                 
                  <tr>
                    <th>開團時間</th>
                    <td>
                      <?=$row["groups_start_time"]?>
                    </td>
                  </tr>
                  <tr>
                    <th>截止時間</th>
                    <td><?=$row["groups_end_time"]?></td>
                    <!-- 要加name,updateUser要抓資料才知道要如何識別 -->
                  </tr>
                  <tr>
                    <th>用餐時間</th>
                    <td class="d-flex">
                      <?=$row["eating_date"]?>
                      <?=$row["eating_time"]?>
                    </td>
                  </tr>
                  <tr>
                    <th>最少成團人數</th>
                    <td><?=$row["least_num"]?></td>
                  </tr>
                  <tr>
                    <th>目前人數</th>
                    <td><?=$row["goal_num"]?></td>
                  </tr>
                  <tr>
                    <th>價格</th>
                    <td><?=$row["price"]?></td>
                  </tr>
                </table>
                <a href="eachShop_groupList.php?shop_id=<?=$row["shop_id"];?>" class="btn btn-info text-white mb-4">返回開團清單</a>

              </div>
              
            </div>
          </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
        <script src="../template/sidebars.js"></script>
</body>

</html>