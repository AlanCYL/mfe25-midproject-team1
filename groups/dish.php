<?php
$shopID=1;
$shop_id=$_GET["dish"];

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
        <link rel="stylesheet" href="/template/style.css">
  <link rel="stylesheet" href="/template/sidebars.css">
  <link rel="stylesheet" href="/template/sidebars.js">
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
              <li><a href="group-list.php" class="link-dark rounded">開團清單</a></li>
              <li><a href="group-open.php?open=<?=$shopID?>" class="link-dark rounded">上架開團</a></li>
              <li><a href="dish-list.php?shop=<?=$shopID?>" class="link-dark rounded">菜式清單</a></li>
              <li><a href="dish.php?dish=<?=$shopID?>" class="link-dark rounded">上架菜式</a></li>
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
                <h1 class="">新增菜式 :</h1>
            </div>
                <div >
                <div class="my-3 w-50 mx-auto">
                <input type="hidden" name="shop_id" id="shop_id" value="<?=$shopID?>">
                    </div>
                    <div class="my-3 w-50 mx-auto">
                        <label for="dish_name" class="form-label">菜式名稱 :</label>
                        <input type="text" class="form-control" id="dish_name" name="dish_name" required />
                    </div>
                    <div class="my-3 w-50 mx-auto">
                        <label for="dish_description" class="form-label">菜式介紹 :</label>
                        <div class="form-group">
                            <textarea class="form-control" id="dish_description" rows="3" name="dish_description"></textarea>
                        </div>
                    </div>
                    <div class="my-3 w-50 mx-auto">
                        <label for="dish_image" class="form-label">上傳圖片 :</label>
                    </div>
                    <div class="mb-4 w-50 mx-auto">
                        <div class="input-group">
                            <div class="form-outline">
                                <input type="file" class="form-control w-" name="dish_image" id="dish_image"
                                    accept=".jpg, .jpeg, .png, .webp, .svg">
                            </div>
                        </div>

                    </div>

                </div>
                <div class="" style="margin-top:90px;margin-left: 700px;margin-bottom: 30px">
                    <button class="btn btn-secondary" style="width:100px;" type="submit" onclick="createDish()">送出</button>
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
        //      document.getElementById("dish_image").addEventListener("change", function($event) {
        //   const file = $event.target.files[0];
        //   if (!file) { return; }
        function createDish (){
            const formData = new FormData();
            formData.append('shop_id',  $('#shop_id').val());
            formData.append('dish_name',  $('#dish_name').val());
            formData.append('dish_description',  $('#dish_description').val());
            formData.append('dish_image',  $('#dish_image')[0].files[0]);
            $.ajax({
                method: "POST",
                url: "doDish.php",
                data: formData,
                contentType: false,
                processData: false,
            })
            .done(function( response ) {
                alert(response.message);
            }).fail(function( jqXHR, textStatus ) {
                console.log( "Request failed: " + textStatus );
            });

            }
        </script>
    </body>

</html>