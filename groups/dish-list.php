<?php
 require_once("../db-connect.php");
 $shopID=$_GET["login"];
$shop_id=$_GET["shop"];

 $sql="SELECT * FROM dish WHERE shop_id='$shop_id'";
 $result = $conn->query($sql);
 $rows = $result->fetch_all(MYSQLI_ASSOC);

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
    .dish-img{
        height:120px;
    }
    .object-cover{
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

      <div class="mb-4 border-bottom border-dark">
        <h1 class="">菜式清單 :</h1>
      </div>
     <!-- list -->
      <div>
        <div class="container w-75">

          <div class="row ">
              <?php foreach($rows as $row): ?>
          <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
                <div class="card">
                <a type="button" class="btn-close btn" aria-label="Close" href="doDeleteDish.php?card=<?=$row["dish_id"]?>"></a>
                    <figure class="dish-img">
                        <img class="object-cover" src="./image/<?=$row["dish_image"]?>" alt="">
                    </figure>
                    <div class="pb-2 px-3">
                    <h3 class="h5"><?=$row["dish_name"]?></h3>
                    <div class="text">描述：<?=$row["dish_description"]?></div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
          </div>
      </div>

      </div>
      <div class="" style="margin-top:100px;margin-left: 800px;margin-bottom: 30px">
        <a class="btn btn-secondary" style="width:100px;" href="dish.php?login=<?=$shopID?>&dish=<?=$shopID?>">返回上架</a>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="../template/sidebars.js"></script>
</body>

</html>