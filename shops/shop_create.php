<!doctype html>
<html lang="en">

<head>
    <title>店家註冊</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="./style.css">
        <link rel="stylesheet" href="../template/style.css">
    <link href="../template/sidebars.css" rel="stylesheet">
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
    

            <!-- Page Content  -->

            <div id="content">
                <div class="border-bottom mb-3 d-flex justify-content-between">
                    <div class="title">
                        <h1>店家註冊</h1>
                    </div>
                    <div style="margin-right:130px">

                        <img src="./bootstrap-icons-1.8.1/person-circle.svg" alt=""> <span
                            style="margin-right:50px"></span>
                        <img src="./bootstrap-icons-1.8.1/box-arrow-right.svg" alt="">

                    </div>
                </div>


                <div class="container w-50">
                    <!-- form -->
                    <form action="doCreateshop.php" method="post">
                        <div class="mb-3">
                            <label for="shop_name" class="form-label">店家名稱</label>
                            <input type="text" class="form-control" data-val="true" id="shop_name" placeholder="店家名稱
                            " name="shop_name" required >

                        </div>
                        <div class="mb-3">
                            <label for="shop_account" class="form-label">店家帳號</label>
                            <input type="text" class="form-control" data-val="true" id="shop_account" placeholder="請輸入登入e-mail
                            " name="shop_account" required >
                        </div>
                        <div class="mb-3">
                            <label for="shop_password" class="form-label" >店家密碼</label>
                            <input type="password" class="form-control" id="shop_password" name="shop_password" placeholder="請輸入登入密碼
                            " required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="shop_phone" class="form-label" >店家電話</label>
                            <input type="tel" class="form-control" id="shop_phone" placeholder="請輸入店家電話
                            " name="shop_phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="shop_address" class="form-label" >店家地址</label>
                            <input type="text" class="form-control" id="shop_address" placeholder="請輸入店家所在地" name="shop_address"  required>
                        </div>
                        <div class="mb-3">
                            <label for="shop_description" class="form-label" >店家簡介</label>
                            <input type="text" class="form-control" id="shop_description" placeholder="請輸入店家簡介" name="shop_description"  required>
                        </div>
                        <div class="mb-3">
                            <label for="shop_description" class="form-label" >店家類別</label>
                            <div class="mb-3">

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type_id" id="inlineRadio1" value="1"ckecked>
                                    <label class="form-check-label" for="inlineRadio1" >中式</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type_id" id="inlineRadio1" value="2">
                                    <label class="form-check-label" for="inlineRadio1">台式</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type_id" id="inlineRadio1" value="3">
                                    <label class="form-check-label" for="inlineRadio1">港澳</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type_id" value="4">
                                    <label class="form-check-label" for="inlineRadio1">日式</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type_id" value="5">
                                    <label class="form-check-label" for="inlineRadio1">韓式</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type_id" value="6">
                                    <label class="form-check-label" for="inlineRadio1">東南亞</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type_id" value="7">
                                    <label class="form-check-label" for="inlineRadio1">南洋</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type_id" value="8">
                                    <label class="form-check-label" for="inlineRadio1">美式</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type_id" value="9">
                                    <label class="form-check-label" for="inlineRadio1">英式</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type_id" value="10">
                                    <label class="form-check-label" for="inlineRadio1">法式</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type_id"value="11">
                                    <label class="form-check-label" for="inlineRadio1">義式</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="shop_description" class="form-label" >店家服務費</label>
                                <select name="service_id" id="" place>
                                    <option value="1">免服務費</option>
                                    <option value="2">服務費10%</option>
                                </select>
                                
                            </div>
                            <div class="mb-3">
                            <label for="img" class="form-label" >店家logo圖</label>
                            <input type="file" class="form-control" name="img" accept=".jpg, .jpeg, .png, .svg">
                        </div>

                        </div>



                        <div class="my-4" style="margin-left:600px;">
                             <button type="submit" class="btn btn-info">送出</button>
                        </div>

                    </form>


                    
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

        <!-- <script>
            function addGroup(){
            $.ajax({
            	method: "POST",
            	url: "doCreateshop.php",
                data: {
                    shop_name: $('#shop_name').val(),
                    shop_account: $('#shop_account').val(),
                    shop_password: $('#shop_password').val(),
                    shop_phone: $('#shop_phone').val(),
                    shop_address: $('#shop_address').val(),
                    shop_description: $('#shop_description').val(),
                    // price: $('#price').val()
                }
            })
            .done(function( response ) {
                alert(response.message);
                window.location.href = "shop_create.php";
            }).fail(function( jqXHR, textStatus ) {
                console.log( "Request failed: " + textStatus );
            });

        }
        </script> -->
</body>

</html>