<?php
require_once("../db-connect.php");
if(!isset($_GET["p"])){
  $p="1";
}else{
  $p=$_GET["p"];
}

//設定分頁 抓共幾筆資料
$sql = "SELECT * FROM shop"; //抓到全部資料
$result=$conn->query($sql); 
$total=$result->num_rows;  //用num_rows的方式知道有幾筆資料
//-----------------------------------------------------------------

$per_page=6;  //一頁幾筆帶入變數
$page_count=CEIL($total/$per_page); //(總共幾筆資料) 除 (一頁要得頁數) 用CEIL去無條件進位(只要有資料就要跳下一頁)

$start=($p-1)*4; 


// $sql = "SELECT * FROM shop 
// ORDER BY shop.shop_id ASC
// LIMIT $start,$per_page ";


$user_count=$result->num_rows;


if(isset($_GET["date"])){
  $date=$_GET["date"];
  $sql = "SELECT * FROM shop 
  WHERE shop.shop_create_time ='$date'
  ORDER BY shop.shop_id ASC
  LIMIT $start,$per_page
  ";  
  
  }
  else if(isset($_GET["date1"]) && isset($_GET["date2"])){
  $date1=$_GET["date1"];
  $date2=$_GET["date2"];
  $sql = "SELECT * FROM shop 
  WHERE shop.shop_create_time BETWEEN '$date1' AND '$date2'
  ORDER BY shop.shop_id ASC
  LIMIT $start,$per_page

  ";
  
  }
  else{
  $sql = "SELECT * FROM shop 
  ORDER BY shop.shop_id ASC
  LIMIT $start,$per_page
  ";  
  }

  $result = $conn->query($sql);
  $rows = $result->fetch_all(MYSQLI_ASSOC);



?>



<!doctype html>
<html lang="en">

<head>
  <title>店家清單</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.0.2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/295e1e8edc.js" crossorigin="anonymous"></script>
  <style>
    body {
      font-family: "Poppins", sans-serif;
      background: #fffdfd;
    }

    p {
      font-family: "Poppins", sans-serif;
      font-size: 1.1em;
      font-weight: 300;
      line-height: 1.7em;
      color: #999;
    }

    a,
    a:hover,
    a:focus {
      color: inherit;
      text-decoration: none;
      transition: all 0.3s;
    }

    .navbar {
      padding: 15px 10px;
      background: #fff;
      border: none;
      border-radius: 0;
      margin-bottom: 40px;
      box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .navbar- {
      box-shadow: none;
      outline: none !important;
      border: none;
    }

    .line {
      width: 100%;
      height: 1px;
      border-bottom: 1px dashed #ddd;
      margin: 40px 0;
    }

    /* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

    .wrapper {
      display: flex;
      width: 100%;
      align-items: stretch;
    }

    #sidebar {
      min-width: 250px;
      max-width: 250px;
      background: #f8f9fa;
      color: #000;
      border-right: 1px solid #ddd;
      transition: all 0.3s;
    }

    #sidebar.active {
      margin-left: -250px;
    }

    #sidebar .sidebar-header {
      padding: 10px;
      background: #f8f9fa;
    }

    #sidebar ul.components {
      padding: 20px 0;
      border-bottom: 1px solid #47748b;
    }

    #sidebar ul p {
      color: #fff;
      padding: 10px;
    }

    #sidebar ul li a {
      padding: 10px;
      font-size: 1.1em;
      display: block;
    }

    #sidebar ul li a:hover {
      color: #000;
      background: #ddd;
    }

    #sidebar ul li.active>a,
    a[aria-expanded="true"] {
      color: #000;
    }

    a[data-toggle="collapse"] {
      position: relative;
    }

    .dropdown-toggle::after {
      display: block;
      position: absolute;
      top: 50%;
      right: 20px;
      transform: translateY(-50%);
    }

    ul ul a {
      font-size: 0.9em !important;
      padding-left: 30px !important;
      background: #f8f9fa;
    }

    ul.CTAs {
      padding: 20px;
    }

    ul.CTAs a {
      text-align: center;
      font-size: 0.9em !important;
      display: block;
      border-radius: 5px;
      margin-bottom: 5px;
    }

    a.download {
      background: #fff;
      color: #f8f9fa;
    }

    a.article,
    a.article:hover {
      background: #f8f9fa !important;
      color: #fff !important;
    }

    .list-unstyled {
      margin-top: 10px;
    }

    .list-unstyled li {
      font-weight: 500;
      color: #333;
      margin: 0 10px;
      font-size: 14px;
    }

    .list-unstyled h5 {
      color: #6c757d;
      font-size: 14px;
    }

    /* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

    #content {
      width: 100%;
      padding: 20px;
      min-height: 100vh;
      transition: all 0.3s;

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

        <ul class="list-unstyled">
          <li class="active">
            <h5 class="mx-2">店家</h5>
          </li>
          <li>
            <a href="#">開團</a>
          </li>
          <li>
            <a href="#">基本資料</a>
          </li>
          <li class="mt-2">
            <h5 class="mx-2">會員</h5>
          </li>
          <li>
            <a href="#">開團</a>
          </li>

          <li>
            <a href="#">Portfolio</a>
          </li>
          <li>
            <a href="#">Contact</a>
          </li>
        </ul>
      </nav>
      <!-- Page Content  -->

      <div id="content">

        <div class="d-flex justify-content-between mb-4">
          <div>
            <h2 class="mb-4">所有店家清單</h2>
            <!-- search -->
            <div class="input-group">
              <div class="form-outline">
                <input id="search-focus" type="search" id="form1" class="form-control" placeholder="Search" />
              </div>
              <a href="" class="btn btn-outline-secondary input-group-text">
              <i class="fa-solid fa-magnifying-glass"></i>
              </a>
            </div>
          </div>
          <div>
            <div class="input-group">
              <form action="">
              <div class="row justify-content-end">
                  <div class="col-auto">
                    <h5 for="" class="form-control-label">開店時間:</h5>
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
                    <button type="submit" class="btn btn-info">查詢</button>                      
                  </div>
                  </div>
              </div>
              </form>
          </div>
        </div>
        <div class="d-flex justify-content-between ">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="shop_list.php">全部店家</a>
            </li>
          </ul>
        </div>
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <table class="table table-hover border border-1">
            <thead class=" p-3 mb-2 ">
              <tr>
                <th>商家編號</th>
                <th>商家店名</th>
                <th>商家email</th>
                <th>商家電話</th>
                <th>開團數量</th>
                <th>開店時間</th>
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
                <td>3</td>
                <td><?=$row["shop_create_time"]?></td>
                <td><a href="shop_detail.php?shop_id=<?=$row["shop_id"]?>" class="btn btn-info text-white">檢視</a></td>
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
            第<?=$p?>頁, 共<?=$page_count?>頁, 共<?=$total?>筆
          </div>
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              
              <?php for($i=1; $i<=$page_count;$i++):?>
                <li class="page-item <?php if($i==$p)echo "active";?>"><a class="page-link " href="shop_list.php?p=<?=$i?>"><?=$i?></a></li>
              <?php endfor;?>
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
</body>

</html>