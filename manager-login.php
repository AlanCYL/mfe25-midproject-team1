
<!doctype html>
<html lang="en">

<head>
  <title>Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.0.2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    .btn-group-lg>.btn,
    .btn-lg {
      background-color: orange;
    }
  </style>
</head>

<body>
  <div class="container ">
    <div class="row justify-content-center m-5">
      <div class="col-lg-4 border rounded border-warning ">
        <h1 class="text-center m-3">後台管理</h1>
        <!-- form -->
        <form action="doMangerLogin.php" method="post">
        <div class="row-3 d-flex justify-content-around m-3">
        <input type="radio" id="shopLogin"
       name="contact" value="shopLogin">
      <label for="shopLogin">店家登入</label>

      <input type="radio" id="managerLogin"
       name="contact" value="managerLogin">
      <label for="managerLogin">管理者登入</label>

        </div>

          <div class="form-group m-3">
            <label for="">帳號：</label>
            <input type="text" id="" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" name="account">
          </div>
          <div class="form-group m-3">
            <label for="">密碼：</label>
            <input type="password" id="" class="form-control mx-sm-3" aria-describedby="passwordHelpInline"
              name="password">
            <small id="passwordHelpInline" class="text-muted">
              Must be 8-20 characters long.
            </small>
          </div>
          <div class="form-group m-3">
            <label for="">再次輸入密碼：</label>
            <input type="password" id="" class="form-control mx-sm-3" aria-describedby="passwordHelpInline"
              name="repassword">
            <small id="passwordHelpInline" class="text-muted">
              Must be 8-20 characters long.
            </small>
          </div>
          <button class="btn btn-warning  mb-3" type="submit">登入 ➠</button>
          </form>
          <a class="btn btn-warning  mb-3" href="./shops/shop_create.php">店家註冊 ➠</a>
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
