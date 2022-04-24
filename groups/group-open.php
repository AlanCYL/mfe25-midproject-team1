<?php
require_once("../db-connect.php");
$shopID=$_GET["login"];
$shop_id=$_GET["open"];


$sql="SELECT * FROM shop WHERE shop_id='$shop_id'";
$result=$conn->query($sql);
$row = $result->fetch_assoc();



?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../template/style.css">
  <link rel="stylesheet" href="../template/sidebars.css">
  <link rel="stylesheet" href="../template/sidebars.js">
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
    <div class="">
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
              <li><a href="#" class="link-dark rounded">店家資訊</a></li>
              <li><a href="#" class="link-dark rounded">店家清單</a></li>
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
          </div>
        </li>
      </ul>
    </nav>

            <!-- Page Content  -->

            <div id="content">
                <div class="border-bottom mb-3 d-flex justify-content-between">
                    <div class="title">
                        上架開團
                    </div>
                    <div style="margin-right:130px">

                        <img src="./bootstrap-icons-1.8.1/person-circle.svg" alt=""> <span
                            style="margin-right:50px">store</span>
                        <img src="./bootstrap-icons-1.8.1/box-arrow-right.svg" alt="">

                    </div>
                </div>


                <div class="container w-50">


                    <div class="mb-3">
                        <label for="groups_start_time" class="form-label">店家名稱</label>
                       <input type="hidden" name="shop_id" id="shop_id" value="<?=$row["shop_id"]?>">
                        <div class="border border-dark" style="height: 40px; padding-left: 10px; padding-top: 5px "><?=$row["shop_name"]?></div>
                        </div>
                    <div class="mb-3">
                        <label for="groups_start_time" class="form-label">開團開始時間</label>
                        <input type="date" class="form-control" data-val="true" id="groups_start_time" name="groups_start_time" required >

                    </div>
                    <div class="mb-3">
                        <label for="groups_end_time" class="form-label" >截止時間</label>
                        <input type="date" class="form-control" id="groups_end_time" name="groups_end_time" required>
                    </div>
                    <div class="mb-3">
                        <label for="eating_time eating_date" class="form-label">用餐時間</label>
                        <div class="d-flex ">
                        <input type="date" class="form-control w-50" id="eating_date"  name="eating_date" required>
                        <input type="time" class="form-control w-50" id="eating_time"  name="eating_time" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="least_num" class="form-label" >成團人數</label>
                        <input type="number" class="form-control" id="least_num" placeholder="請輸入最少成團人數
                        " name="least_num" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label" >價格</label>
                        <input type="text" class="form-control" id="price" placeholder="請輸入價格" name="price"  required>
                    </div>


                    <div class="my-4" style="margin-left:600px;">
                        <button class="btn btn-secondary" type="submit" onclick="addGroup()">送出</button>
                    </div>
                </div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script>
            function addGroup(){
            $.ajax({
            	method: "POST",
            	url: "doGroupOpen.php",
                data: {
                    shop_id: $('#shop_id').val(),
                    groups_start_time: $('#groups_start_time').val(),
                    groups_end_time: $('#groups_end_time').val(),
                    eating_date: $('#eating_date').val(),
                    eating_time: $('#eating_time').val(),
                    least_num: $('#least_num').val(),
                    price: $('#price').val()
                }
            })
            .done(function( response ) {
                alert(response.message);
                window.location.href = "group-list.php?login=<?=$shop_id?>";
            }).fail(function( jqXHR, textStatus ) {
                console.log( "Request failed: " + textStatus );
            });

        }
        </script>
</body>

</html>