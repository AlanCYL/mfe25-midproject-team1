<?php
require_once("../db-connect.php");

if (!isset($_GET["p"])) {
  $p = 1;
} else {
  $p = $_GET["p"];
}
if (!isset($_GET["type"])) {
  $type = "1";
} else {
  $type = $_GET["type"];
}
switch ($type) {
  case "1":
    $order = "id ASC";
    break;
  case "2":
    $order = "id DESC";
    break;
  case "3":
    $order = "QA_content_create_time ASC";
    break;
  case "4":
    $order = "QA_content_create_time DESC";
    break;
}


$sql = "SELECT * FROM qa 
WHERE valid= 1";
$result = $conn->query($sql);
$total = $result->num_rows;

$per_page = 5;
$page_count = CEIL($total / $per_page);

$start = ($p - 1) * $per_page;
$sql = "SELECT *FROM qa 
JOIN qa_content ON qa_content.QA_id = qa.id
WHERE valid=1
ORDER BY $order LIMIT $start,$per_page";


$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
//echo "QA count: ".$result->num_rows;

$QA_count = $result->num_rows;
// if($QA_count>0){
//     while($row = $result->fetch_assoc()) {
//         echo $row["QA_id"].", 會員是 ".$row["user_id"].", 標題是 ".$row["QA_title"];
//         echo "<br>";}
//   }
//   else{
//     echo "no data.";
//   }


?>

<!doctype html>
<html lang="en">

<head>
  <title>QA-list</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.0.2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link href="sidebars.css" rel="stylesheet">
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

    .dish-img {
      height: 120px;
    }

    .object-cover {
      width: 100%;
      height: 100%;
      object-fit: cover;
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
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
            商家管理
          </button>
          <div class="collapse" id="home-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="../shops/shop_list.php" class="link-dark rounded">店家清單</a></li>
              <li><a href="../shops/shop_groups_list.php" class="link-dark rounded">開團清單</a></li>
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
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#cs-collapse" aria-expanded="true">
            客服管理
          </button>
          <div class="collapse show" id="cs-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="QA-list-user.php" class="link-dark rounded">意見反應</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </nav>
    <div>
      <i class="btn btn-light btn-cute fa-solid fa-arrows-left-right border-start-none" id="toggle"></i>
    </div>
    <div id="content">
      <div class="d-flex justify-content-end mb-4 border-bottom border-secondary container-fluid ">
        <!-- 可以放header -->

        <i class="fa-solid fa-user mx-2 py-1"></i>
        <h4>Admin</h4><a class="mx-3" href="../manager-logout.php">
          <i class="fa-solid fa-right-from-bracket"></i></a>
      </div>
      <div>
        <div class="container">
          <div class="py-4 text-start">
            <a class="btn btn-info text-white 
                  <?php if ($type == 1) echo "active" ?>
                  " href="QA-list-user.php?p=<?= $p ?>&type=1">依序號正序</a>
            <a class="btn btn-info text-white 
                  <?php if ($type == 2) echo "active" ?>
                  " href="QA-list-user.php?p=<?= $p ?>&type=2">依序號反序</a>
            <a class="btn btn-info text-white 
                  <?php if ($type == 1) echo "active" ?>
                  " href="QA-list-user.php?p=<?= $p ?>&type=3">依時間正序</a>
            <a class="btn btn-info text-white 
                  <?php if ($type == 2) echo "active" ?>
                  " href="QA-list-user.php?p=<?= $p ?>&type=4">依時間反序</a>
          </div>
          <div class="py-2 text-end">
            第 <?= $p ?> 頁, 共 <?= $page_count ?> 頁 ,共 <?= $total ?> 筆
          </div>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>問題編號</th>
                <th>會員編號</th>
                <th>創建時間</th>
                <th>問題標題</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php if ($QA_count > 0) : ?>
                  <?php foreach ($rows as $row) : ?>
                    <td><?= $row["QA_id"] ?></td>
                    <td><?= $row["user_id"] ?></td>
                    <td><?= $row["QA_content_create_time"] ?></td>
                    <td><?= $row["QA_type"] ?></td>
                    <td>
                      <a class="btn btn-info text-white" href="QA-reply-user.php?id=<?= $row["QA_id"] ?>&qa_content_id=<?= $row["QA_content_id"] ?>">回覆訊息</a>

                      <a class="btn btn-danger" href="doDelete.php?id=<?= $row["id"] ?>">刪除</a>
                    </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <?= "no date" ?>
          <?php endif; ?>
            </tbody>
          </table>
          <div class="py-2">
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $page_count; $i++) : ?>
                  <li class="page-item <?php
                                        if ($i == $p) echo "active";
                                        ?>"><a class="page-link" href="QA-list-user.php?p=<?= $i ?>&type=<?= $type ?>"><?= $i ?></a></li>
                <?php endfor; ?>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="sidebars.js"></script>
</body>

</html>