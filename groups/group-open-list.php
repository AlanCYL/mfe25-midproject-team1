<?php
require_once("../db-connect.php");

// if(!isset($_GET["groups_id"])){
//   echo "沒有連線";

// }
$shopID=$_GET["login"];
$groups_id=$_GET["list"];


$sql="SELECT * FROM groups WHERE groups_id='$groups_id'";
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
          <div class="title h3">
            團單詳情：
          </div>
          <div style="margin-right:130px">

            <img src="./bootstrap-icons-1.8.1/person-circle.svg" alt=""> <span style="margin-right:50px">store</span>
            <img src="./bootstrap-icons-1.8.1/box-arrow-right.svg" alt="">

          </div>
        </div>


          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-9">
                <table class="table table-bordered">
                  <input type="hidden" name="groups_id" value="<?=$row["groups_id"]?>">
                  <tr>
                    <th>訂單編號</th>
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
                    <th>價格</th>
                    <td><?=$row["price"]?></td>
                  </tr>
                </table>

                <div class="py-2 text-end">
                  <a class="btn btn-info text-white" href="group-open-edit.php?login=<?=$shopID?>&edit=<?=$row["groups_id"]?>">編輯</a>
                  <a class="btn btn-info text-white" href="group-list.php?login=<?=$shopID?>">返回</a>
                </div>

              </div>
            </div>
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
      function groupEdit(){
            $.ajax({
            	method: "POST",
            	url: "doList.php",
                data: {
                    groups_start_time: $('#groups_start_time').val(),
                    groups_end_time: $('#groups_end_time').val(),
                    eating_time: $('#eating_time').val(),
                    least_num: $('#least_num').val(),
                    price: $('#price').val(),
                }
            })
            .done(function( response ) {
                alert(response.message);
            }).fail(function( jqXHR, textStatus ) {
                console.log( "Request failed: " + textStatus );
            });

        }
    </script>
<script src="../template/sidebars.js"></script>
</body>

</html>