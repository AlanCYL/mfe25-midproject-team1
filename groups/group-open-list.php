<?php
require_once("../db-connect.php");

// if(!isset($_GET["groups_id"])){
//   echo "沒有連線";

// }
$type=$_GET["type"];
$shopID=$_GET["login"];
$groups_id=$_GET["list"];
$type=$_GET["type"];

if($type=='group'||$type=='history'){
    $group_sql="SELECT * FROM groups JOIN user_and_groups ON groups.groups_id=user_and_groups.groups_id JOIN user ON user_and_groups.user_id=user.user_id WHERE user_and_groups.groups_id='$groups_id'";
    $group_result=$conn->query($group_sql);
    $user_count=$group_result->num_rows;
    $group_rows= $group_result->fetch_all(MYSQLI_ASSOC);

}

$sql="SELECT * FROM groups WHERE groups_id='$groups_id'";
$result=$conn->query($sql);
$row = $result->fetch_assoc();



?>
<!doctype html>
<html lang="en">

<head>
  <title>團單詳情</title>
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
              <li><a href="shopList.php?login=<?=$shopID?>" class="link-dark rounded">店家資訊</a></li>

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
    <div>
        <i class="btn btn-light btn-cute fa-solid fa-arrows-left-right border-start-none" id="toggle"></i>
        </div>
      <!-- Page Content  -->

      <div id="content">
      <div class="d-flex justify-content-between mb-4 border-bottom border-secondary container-fluid ">
                <div>
                <h1>開團詳情 :</h1>
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


              </div>
            </div>
          </div>

          <?php if($type=='group'||$type=='history'): ?>
          <div class="mx-auto" style="width:700px; margin-top: 26px;">
           <h4>會員資料：</h4>
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <table class="table table-hover border border-1">
          <thead class=" p-3 mb-2 ">
              <tr>
                <th>會員暱稱</th>
                <th>會員名稱</th>
                <th>會員電話</th>
                <th>會員mail</th>

              </tr>
            </thead>
            <tbody>
            <?php if($type=='group'||$type=='history'&$user_count>0): ?>
                <?php foreach($group_rows as $group_row): ?>
              <tr>
                <td><?=$group_row["user_id"]?></a></td>
                <td><?=$group_row["nick_name"]?></td>
                <td><?=$group_row["user_phone"]?></td>
                <td><?=$group_row["user_mail"]?></td>

            </tr>

              <?php endforeach; ?>
                  <?php else: ?>
                    <?="no data."?>
                    <?php endif; ?>
                  </tbody>
        </table>
        </div>
        </div>

        <?php endif; ?>

        <div class="py-2 text-end">
                  <a class="btn btn-info text-white" href="group-open-edit.php?login=<?=$shopID?>&type=<?=$type?>&edit=<?=$row["groups_id"]?>">編輯</a>
                  <a class="btn btn-info text-white" href="group-list.php?login=<?=$shopID?>&type=<?=$type?>">返回</a>
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