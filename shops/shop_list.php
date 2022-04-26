<?php
require_once("../db-connect.php");
if(!isset($_GET["p"])){
  $p="1";
}else{
  $p=$_GET["p"];
}

if(!isset($_GET["type"])){
  $type=1;
}else{
  $type=$_GET["type"];
}

switch($type){
  case "1":
      $order="ASC";
      break;
  case "2":
      $order="DESC";
      break;
}

//設定分頁 抓共幾筆資料
$sql = "SELECT * FROM shop WHERE valid=1"; //抓到全部資料
$result=$conn->query($sql);
$total=$result->num_rows;  //用num_rows的方式知道有幾筆資料
//-----------------------------------------------------------------

$per_page=6;  //一頁幾筆帶入變數
$page_count=CEIL($total/$per_page); //(總共幾筆資料) 除 (一頁要得頁數) 用CEIL去無條件進位(只要有資料就要跳下一頁)

$start=($p-1)*$per_page;


// $sql = "SELECT * FROM shop
// ORDER BY shop.shop_id ASC
// LIMIT $start,$per_page ";


$user_count=$result->num_rows;


if(isset($_GET["date"])){
  $date=$_GET["date"];
  $sql = "SELECT * FROM shop
  WHERE valid=1 AND shop.shop_create_time ='$date'
  ORDER BY shop.shop_id $order
  LIMIT $start,$per_page
  ";

  }
  else if(isset($_GET["date1"]) && isset($_GET["date2"])){
  $date1=$_GET["date1"];
  $date2=$_GET["date2"];
  $sql = "SELECT * FROM shop
  WHERE valid=1 AND shop.shop_create_time BETWEEN '$date1' AND '$date2'
  ORDER BY shop.shop_id $order
  LIMIT $start,$per_page
  ";

  }
  else{
  $sql = "SELECT * FROM shop
  WHERE valid=1
  ORDER BY shop.shop_id $order
  LIMIT $start,$per_page
  ";
  }

  $result = $conn->query($sql);
  $rows = $result->fetch_all(MYSQLI_ASSOC);
  $total2=$result->num_rows;
  $per_page=6;  //一頁幾筆帶入變數
  $page_count1=CEIL($total2/$per_page); //(總共幾筆資料) 除 (一頁要得頁數) 用CEIL去無條件進位(只要有資料就要跳下一頁)

  $start=($p-1)*$per_page;

?>


<!doctype html>
<html lang="en">

<head>
    <title>店家清單總覽</title>
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
        .nav-tabs .nav-link{
            font-weight: 500;
            color: #495057;
            background-color: #fff;
            border-color: #dee2e6 #dee2e6 #fff;

        }
        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
            margin-bottom: -1px;
            background: 0 0;
            border: 1px solid transparent;
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
            font-weight: 900;
            color:maroon;
        }
        .page-item.active .page-link, .btn-info {
        z-index: 3;
        color: #fff;
        background-color: #BDC0BA;
        border-color: #BDC0BA;
        }
        .page-link {
            color: gray;
        }

    </style>



</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header text-center border border-bottom-1">
            <a href="../template/sample_admin.php"><h4>後台管理系統</h4></a>
            </div>
            <ul class="list-unstyled ps-0">
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
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
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                        會員管理
                    </button>
                    <div class="collapse" id="orders-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="../members/user-list.php" class="link-dark rounded">會員清單</a></li>
                            <li><a href="../members/user-list-coupon.php" class="link-dark rounded">優惠券發送</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#cs-collapse" aria-expanded="false">
                        客服管理
                    </button>
                    <div class="collapse" id="cs-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="../QA/QA-list-user.php" class="link-dark rounded">意見反應</a></li>
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
                <i class="fa-solid fa-user mx-2 py-1"></i>
                <h4>Admin</h4><a class="mx-3" href="../manager-logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>

            </div>
            <div>
                <!-- 可以放content -->
                <div class="wrapper">


      <div id="content">

        <div class="d-flex justify-content-between mb-4">
          <div>
            <h2 class="mb-4">店家清單總覽</h2>
           <!-- search -->
           <!-- <div class="input-group">
              <div class="form-outline">
                <input id="search-focus" type="search" id="form1" class="form-control" placeholder="Search" />
              </div>
              <a href="" class="btn btn-outline-secondary input-group-text">
              <i class="fa-solid fa-magnifying-glass"></i>
              </a>
            </div> -->
          </div>
          <div>
            <div class="input-group">
              <form action="">
              <div class="row justify-content-end">
                  <div class="col-auto">
                    <h5 for="" class="form-control-label">註冊時間:</h5>
                  </div>
                  <div class="col-auto">
                    <input type="date" name="date1" class="form-control"
                    <?php if(isset($_GET["date1"])):?>
                      value="<?=$_GET["date1"]?>"

                      <?php endif;?>
                    >
                  </div>
                  <div class="col-auto">
                    <label for="" class="form-control-label">~</label>
                  </div>
                  <div class="col-auto">
                    <input type="date" name="date2" class="form-control"
                    <?php if(isset($_GET["date2"])):?>
                      value="<?=$_GET["date2"]?>"
                    <?php endif;?>
                    >
                  </div>
                  <div class="col-auto">
                    <button type="submit" class="btn" style="background-color:#BDC0BA; color:white;">查詢</button>
                  </div>
                  </div>
                </div>
              </form>
          </div>
        </div>
        <div class="d-flex justify-content-end ">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="shop_list.php">全部店家</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($type==1) echo"active"?>" aria-current="page" href="shop_list.php?p=<?=$p?>&type=1">依編號正序</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($type==2) echo"active"?>" aria-current="page" href="shop_list.php?p=<?=$p?>&type=2">依編號反序</a>
            </li>

          </ul>
        </div>
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <table class="table table-hover border border-1">
            <thead class=" p-3 mb-2 ">
              <tr>
                <th>商家編號</th>
                <th>商家店名</th>
                <th>商家帳號</th>
                <th>商家電話</th>

                <th>註冊時間</th>
                <th>檢視</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              <?php if($user_count>0):?>
                <?php foreach($rows as $row): ?>
                <td><?=$row["shop_id"]?></td>
                <td><?=$row["shop_name"]?></td>
                <td><?=$row["shop_account"]?></td>
                <td><?=$row["shop_phone"]?></td>

                <td><?=$row["shop_create_time"]?></td>
                <td><a href="shop_detail.php?shop_id=<?=$row["shop_id"]?>" class="btn text-white" style="background-color:#BDC0BA; color:white;">檢視</a></td>
              </tr>
              <?php endforeach; ?>
              <?php else:?>
                <?="no data."?>
              <?php endif;?>
            </tbody>
          </table>
        </div>
        <!-- pagination -->
        <div>
        <div class="py-2 text-center">
        <?php if(!isset($_GET["date1"])): ?>
            第<?=$p?>頁, 共<?=$page_count?>頁, 共<?=$total?>筆
          <?php else:?>
            第1頁, 共1頁
          <?php endif;?>
          </div>
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
            <?php if(!isset($_GET["date1"])): ?>
              <?php for($i=1; $i<=$page_count;$i++):?>
                <li class="page-item <?php if($i==$p)echo "active";?>"><a class="page-link " href="shop_list.php?p=<?=$i?>"><?=$i?></a></li>
              <?php endfor;?>
            <?php else:?>
              <li class="page-item">1</a></li>
            <?php endif;?>
            </ul>
          </nav>

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
        <script src="../template/sidebars.js"></script>
</body>

</html>