<?php
require_once("../db-connect.php");
if(!isset($_GET["p"])){
    $p=1;
  }else{
    $p=$_GET["p"];
  }

  if(!isset($_GET["types"])){
    $types="1";
  }else{
    $types=$_GET["types"];
  }

  switch($types){
    case "1":
        $order="ASC";
        break;
    case "2":
        $order="DESC";
        break;

    default:
        $order="id ASC";
  }

$shopID=$_GET["login"];
$type= (isset($_GET['type']) && !empty($_GET['type']))?$_GET["type"]:"all";
if($type=='all') {
    $sql="SELECT * FROM groups JOIN shop ON groups.shop_id=shop.shop_id WHERE shop.shop_id='$shopID'";
}
// 開團中
else if($type=='start'){
    $sql="SELECT * FROM `groups` JOIN shop ON groups.shop_id=shop.shop_id
    WHERE now() > `groups_start_time` and  now() <`groups_end_time` and groups.shop_id='$shopID'";
}
// 已用餐，歷史訂單
else if($type=='history'){
    $sql="SELECT * FROM groups JOIN shop ON groups.shop_id=shop.shop_id WHERE shop.shop_id='$shopID'";
}
// 已成團，成團人數超過最小限制
else if($type=='group'){
    $sql="SELECT * FROM `groups` JOIN user_and_groups ON groups.groups_id=user_and_groups.groups_id WHERE groups.least_num <
    (SELECT COUNT(user_and_groups.groups_id) FROM user_and_groups WHERE groups_id = user_and_groups.groups_id) and groups.shop_id='$shopID'";
}
// 未成團
else if($type=='ungroup'){
    $sql="SELECT DISTINCT groups.groups_id, groups.* FROM `groups` JOIN user_and_groups ON groups.groups_id=user_and_groups.groups_id WHERE groups.least_num > (SELECT COUNT(user_and_groups.groups_id) FROM user_and_groups WHERE groups.groups_id = user_and_groups.groups_id) and now() > `eating_date` and groups.shop_id='$shopID'";
}else{
    $sql="SELECT * FROM groups JOIN shop ON groups.shop_id=shop.shop_id WHERE shop.shop_id='$shopID'";

}
$result=$conn->query($sql);
$row=$result->fetch_assoc();

$groups_count=$result->num_rows;

$per_page=5;
$page_count=CEIL($groups_count/$per_page);

$start=($p-1)*$per_page;

if($type=='all') {
    $sql="SELECT DISTINCT groups.groups_id, groups.*  FROM groups JOIN shop ON groups.shop_id=shop.shop_id WHERE shop.shop_id='$shopID' ORDER BY groups_id $order LIMIT $start,$per_page";
}
// 開團中
else if($type=='start'){
    $sql="SELECT DISTINCT groups.groups_id, groups.*  FROM `groups` JOIN shop ON groups.shop_id=shop.shop_id
    WHERE now() >= `groups_start_time` AND  now() <=`groups_end_time` AND groups.shop_id='$shopID' ORDER BY groups_id $order LIMIT $start,$per_page";
}
// 已用餐，歷史訂單
else if($type=='history'){
    $sql="SELECT DISTINCT groups.groups_id, groups.*  FROM groups JOIN shop ON groups.shop_id=shop.shop_id WHERE now() >`eating_date` AND shop.shop_id='$shopID' ORDER BY groups_id $order LIMIT $start,$per_page";
}
// 已成團，成團人數超過最小限制
else if($type=='group'){
    $sql="SELECT DISTINCT groups.groups_id, groups.*  FROM `groups` JOIN user_and_groups ON groups.groups_id=user_and_groups.groups_id WHERE groups.least_num <
    (SELECT COUNT(user_and_groups.groups_id) FROM user_and_groups WHERE groups.groups_id = user_and_groups.groups_id) and groups.shop_id='$shopID'";
}
// 未成團
else if($type=='ungroup'){
    $sql="SELECT DISTINCT groups.groups_id, groups.* FROM `groups` JOIN user_and_groups ON groups.groups_id=user_and_groups.groups_id WHERE groups.least_num > (SELECT COUNT(user_and_groups.groups_id) FROM user_and_groups WHERE groups.groups_id = user_and_groups.groups_id) and now() > `eating_date` and groups.shop_id='$shopID' ORDER BY groups_id $order LIMIT $start,$per_page ";
}else{
    $sql="SELECT DISTINCT groups.groups_id, groups.*  FROM groups JOIN shop ON groups.shop_id=shop.shop_id WHERE shop.shop_id='$shopID' ORDER BY groups_id $order LIMIT $start,$per_page";

}

$result=$conn->query($sql);
$rows=$result->fetch_all(MYSQLI_ASSOC);


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
    <div>
        <i class="btn btn-light btn-cute fa-solid fa-arrows-left-right border-start-none" id="toggle"></i>
        </div>
      <!-- Page Content  -->

      <div id="content">

        <div class="d-flex justify-content-between mb-4">
          <div>
            <h2 class="mb-4">商家所有開團清單</h2>
            <!-- search -->
            <div class="input-group">
              <div class="form-outline">
                <input id="search-focus" type="search" id="form1" class="form-control" placeholder="Search" />
              </div>
              <a href="" class="btn btn-outline-secondary input-group-text">
                <img src="./bootstrap-icons-1.8.1/search.svg" class="" alt="">
              </a>
            </div>
          </div>
          <div>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend2" style="height: 100%;"><img
                    src="./bootstrap-icons-1.8.1/funnel.svg">排序：</span>
              </div>

              <date_interval_create_from_date_string>
              <a class="btn btn-outline-info " href="group-list.php?login=<?=$shopID?>&p=<?=$p?>&types=1"><img src="./bootstrap-icons-1.8.1/sort-down-alt.svg" alt=""></a>
        <a class="btn btn-outline-info" href="group-list.php?login=<?=$shopID?>&p=<?=$p?>&types=2"><img src="./bootstrap-icons-1.8.1/sort-up.svg" alt=""></a>


              </ㄎ>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-between ">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link <?php if($type=='all') echo "active"?>" aria-current="page" href="group-list.php?login=<?=$shopID?>&type=all">全部開團</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($type=='start') echo "active"?>" href="group-list.php?login=<?=$shopID?>&type=start">開團中</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($type=='ungroup') echo "active"?>" href="group-list.php?login=<?=$shopID?>&type=ungroup">未成團</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($type=='group') echo "active"?>"href="group-list.php?login=<?=$shopID?>&type=group">已成團</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($type=='history') echo "active"?>" href="group-list.php?login=<?=$shopID?>&type=history">歷史訂單</a>
            </li>
          </ul>
          <a class="btn  btn-outline-secondary" href="group-open.php?login=<?=$shopID?>&open=<?=$shopID?>">上架開團</a>
        </div>
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <table class="table table-hover border border-1">
            <thead class=" p-3 mb-2 ">
              <tr>
                <th>開團編號</th>
                <th>開團時間</th>
                <th>截止時間</th>
                <th>用餐時間</th>
                <th>最少成團人數</th>
                <th>價格</th>
                <!-- <th>是否成團</th> -->
                <th>檢視</th>
                <th>刪除</th>
              </tr>
            </thead>
            <tbody>
            <?php if($groups_count>0): ?>
                <?php foreach($rows as $row): ?>
              <tr>
                <td><a href="#"><?=$row["groups_id"]?></a></td>
                <td><?=$row["groups_start_time"]?></td>
                <td><?=$row["groups_end_time"]?></td>
                <td><?=$row["eating_date"]?> &nbsp; <?=$row["eating_time"]?></td>
                <td><?=$row["least_num"]?></td>
                <td><?=$row["price"]?></td>
                <td><a href="group-open-list.php?login=<?=$shopID?>&list=<?=$row["groups_id"]?>" class="btn-link"> 檢視</a></td>
                <td><a href="doDelete.php?login=<?=$shopID?>&list=<?=$row["groups_id"]?>" class="btn-link"> 刪除</a></td>

            </tr>

              <?php endforeach; ?>
                  <?php else: ?>
                    <?="no data."?>
                    <?php endif; ?>
            </tbody>
          </table>
        </div>



        <!-- pagination -->
        <div class="py-2">
            <nav aria-label="Page navigation example">
             <ul class="pagination">
               <!-- 動態產生頁碼數字 -->
               <?php for ($i=1;$i<=$page_count;$i++): ?>
                  <li class="page-item <?php if($i==$p)echo "active"; ?>"><a class="page-link" href="group-list.php?login=<?=$shopID?>&p=<?=$i?>"><?=$i?></a></li>
               <?php endfor; ?>


              </ul>
            </nav>
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