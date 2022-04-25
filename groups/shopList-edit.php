<?php
// if(!isset($_GET["shop_id"])){
//     header("location: 404.php");
// }
$shopID=$_GET["login"];

require_once("../db-connect.php");

$sql ="SELECT *
FROM shop ,shop_type, shop_service
WHERE shop.type_id = shop_type.type_id AND
shop.service_id = shop_service.service_id AND
shop.shop_id=$shopID
";


$result = $conn->query($sql);
$row = $result->fetch_assoc();
// if(!isset($row)){
//     header("location: 404.php");
// }
// var_dump($row);
// exit;

$sql2 = "SELECT * FROM shop_type";
$result2=$conn->query($sql2);
$rows2=$result2->fetch_all(MYSQLI_ASSOC);

//var_dump($rows2);

?>


<!doctype html>
<html lang="en">

<head>
    <title>店家明細修改</title>
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
        <div>
        <i class="btn btn-light btn-cute fa-solid fa-arrows-left-right border-start-none" id="toggle"></i>
        </div>
        <!-- Page Content  -->
        <div id="content">
            <div class="d-flex justify-content-between mb-4">

                <!-- 可以放header -->




            </div>
            <div>
                <!-- 可以放content -->
                <form action="shopList-updateshop.php" method="POST">

                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <div class="logo">
                            <img class="object-cover" src="image/<?=$row["img"];?>"  alt="">
                            </div>
                        </div>

                        <div class="col-6 d-flex align-items-center">
                            <table class="table table-bordered">
                                <tr>
                                    <th>商家編號</th>
                                    <input type="hidden" name="shop_id" value="<?=$row["shop_id"]?>">
                                    <td><input type="id" name="shop_id" class="form-control" value="<?=$row["shop_id"];?>" disabled></td>
                                </tr>
                                <tr>
                                    <th>商家名稱</th>
                                    <td><input type="text" name="shop_name" class="form-control" value="<?=$row["shop_name"];?>"></td>
                                </tr>
                                <tr>
                                    <th>商家帳號</th>
                                    <td><input type="email" name="shop_email" class="form-control" value="<?=$row["shop_email"];?>"></td>
                                </tr>
                                <tr>
                                    <th>商家電話</th>
                                    <td><input type="tel" name="shop_phone" class="form-control" value="<?=$row["shop_phone"];?>"></td>
                                </tr>
                                <tr>
                                    <th>商家地址</th>
                                    <td><input type="text" name="shop_address" class="form-control" value="<?=$row["shop_address"];?>"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="container pt-5">
                    <table class="table table-bordered">
                        <tr>
                            <th>店家簡介</th>
                            <td><input type="text" name="shop_description" class="form-control shop_description" value="<?=$row["shop_description"];?>" maxlength="100">
                            </td>
                        </tr>
                        <tr>
                        <th>店家服務</th>
                            <td>
                                <select name="service_id" id="" place>

                                    <option value="1">免服務費</option>
                                    <option value="2">服務費10%</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>菜式種類</th>
                            <td>
                            <li><?=$row["type_name"];?></li>
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- <div class="container pt-5">
                    <h3>店家環境圖</h3>
                    <div class="mb-2">
                        <input type="file" class="form-control" name="myFile" accept=".jpg, .jpeg, .png, .svg">
                    </div>
                    <button class="btn btn-info mb-2" type="submit">送出</button>
                    <div class="d-flex flex-row ">
                        <div class="arounding">
                            <img class="object-cover" src="images\NINI_2.jpg" alt="">
                        </div>
                        <div class="arounding ps-4">
                            <img class="object-cover" src="images\NINI_4.jpg" alt="">
                        </div>
                        <div class="arounding ps-4">
                            <img class="object-cover" src="images\NINI_5.jpg" alt="">
                        </div>
                    </div> -->
                    <div class="pt-5 d-flex justify-content-end">
                        <button type="submit" class="btn btn-info me-2">儲存</button>
                        <a href="shopList.php?login=<?=$row["shop_id"]?>" class="btn btn-info btn-danger">取消</a>
                    </div>
                </div>
            </div>
            </form>



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
        <link rel="stylesheet" href="/mid-project/template/sidebars.js">
</body>

</html>