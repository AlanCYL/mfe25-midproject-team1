<!doctype html>
<html lang="en">

<head>
    <title>新會員註冊</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="mb-2">
            <label for="user_name">會員姓名</label>
            <!-- 設定label for可以點了之後到指定id欄位 -->
            <input type="text" id="user_name" class="form-control" name="user_name" required>
        </div>
        <div class="mb-2">
            <label for="identity_card">身分證字號</label>
            <input type="text" class="form-control" name="identity_card" id="identity_card" placeholder="將設為登入帳號">
        </div>
        <div class="mb-2">
            <label for="user_password">會員密碼</label>
            <input type="password" id="user_password" class="form-control" name="password">
        </div>
        <div class="mb-2">
            <label for="user_repassword">再輸入一次密碼</label>
            <input type="password" class="form-control" id="user_repassword" name="user_repassword">
        </div>
        <div class="mb-2">
            <label for="nick_name">暱稱</label>
            <input type="text" id="nick_name" class="form-control" name="nick_name" required>
        </div>
        <div class="mb-2">
            <label for="user_phone">手機號碼</label>
            <div class="row">
                <div class="col">
                    <input type="tel" id="user_phone" class="form-control" name="user_phone" required>
                </div>
            </div>
        </div>
        <div class="mb-2">
            <label for="user_bir">出生年月日</label>
            <div class="row">
                <div class="col">
                    <input type="date" id="user_bir" class="form-control" name="user_bir" required>
                </div>
            </div>
        </div>
        <div class="mb-2">
            <label for="user_mail">電子郵件</label>
            <input type="email" id="user_mail" class="form-control" name="user_mail" required>
        </div>
        <button class="btn btn-info text-white" id="send">註冊</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        let send = document.querySelector("#send");
        let name = document.querySelector("#user_name");
        let identityCard = document.querySelector("#identity_card");
        let password = document.querySelector("#user_password");
        let rePassword = document.querySelector("#user_repassword");
        let nickName = document.querySelector("#nick_name");
        let userPhone = document.querySelector("#user_phone");
        let userBir = document.querySelector("#user_bir");
        let userMail = document.querySelector("#user_mail");

        send.addEventListener("click", function() {
            let nameVal = name.value,
                identityCardVal = identityCard.value,
                passwordVal = password.value,
                rePasswordVal = rePassword.value,
                nickNameVal = nickName.value,
                userPhoneVal = userPhone.value,
                userBirVal = userBir.value,
                userMailVal = userMail.value;
            if (passwordVal !== rePasswordVal) {
                alert("密碼不一致");
                return;
            }
            if (isNaN(userPhoneVal) == true) {
                alert("電話格式有誤");
                return;
            }
            if (identityCardVal.search(/^[A-Z](1|2)\d{8}$/i) == -1) {
                alert('身分證字號基本格式錯誤');
                return;
            }
            
            $.ajax({
                    method: "POST",
                    url: "doCreate.php",
                    dataType: "json",
                    data: {
                        user_name: nameVal,
                        identity_card: identityCardVal,
                        user_password: passwordVal,
                        nick_name: nickName.value,
                        user_phone: userPhone.value,
                        user_bir: userBir.value,
                        user_mail: userMail.value
                    }
                })
                .done(function(response) {
                    console.log(response);
                    let status = response.status;
                    let content = "";
                    switch (status) {
                        case 0:
                            content = response.message;
                            alert(content);
                            break;
                        case 1:
                            location.href = "thanks.php";
                            // content = response.message;
                            // alert(content);
                            break;
                    }
                }).fail(function(jqXHR, textStatus) {
                    console.log("Request failed: " + textStatus);
                });
        })
    </script>



</body>

</html>