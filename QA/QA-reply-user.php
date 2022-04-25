<?php require_once("../db-connect.php") ?>
<?php

$id = $_GET["id"];
$content_id = $_GET["qa_content_id"];


require_once("../db-connect.php");
$sql = "SELECT * 
FROM qa_content
JOIN qa ON qa_content.QA_id = qa.id
LEFT JOIN qa_reply on qa_content.QA_content_id = qa_reply.QA_content_id
WHERE qa_content.QA_id = '$id'
ORDER BY qa_content.QA_content_id DESC";

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
//var_dump($rows);

?>
<!doctype html>
<html lang="en">

<head>
    <title>後台管理系統(平台)</title>
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

        .btn-check:active+.btn-info,
        .btn-check:checked+.btn-info,
        .btn-info.active,
        .btn-info:active,
        .show>.btn-info.dropdown-toggle {
            color: white;
            background-color: gray;
            border-color: gray;
        }

        .page-item.active .page-link,
        .btn-info {
            z-index: 3;
            color: #fff;
            background-color: #51A8DD;
            border-color: #51A8DD;
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
        <!-- Page Content  -->
        <div id="content">
            <div class="d-flex justify-content-end mb-4 border-bottom border-secondary container-fluid ">
                <!-- 可以放header -->

                <i class="fa-solid fa-user mx-2 py-1"></i>
                <h4>Admin</h4><a class="mx-3" href="../manager-logout.php">
                    <i class="fa-solid fa-right-from-bracket"></i></a>

            </div>
            <div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <div class="py-2">
                                <a class="btn btn-info text-white" href="QA-list-user.php">回列表</a>
                            </div>
                            <?php foreach ($rows as $row) : ?>
                                <div class="card">
                                    <div class="card__avatar"></div>
                                    <div class="card__body">
                                        <div class="card__info">
                                            <span class="card__author"><?= $row["QA_content_from_who"] ?>:</span>
                                        </div>
                                        <p class="card__content"><?= $row["QA_content_text"] ?></p>
                                        <p class="text-end"><?= $row["QA_content_create_time"] ?></p>
                                    </div>
                                </div>
                                <div class="board__hr"></div>
                                <div class="card" name="reply">
                                    <div class="card__avatar"></div>
                                    <div class="card__body">
                                        <div class="card__info">
                                            <span class="card__author">
                                                <?php if (NULL !== $row["QA_reply"]) : ?>
                                                    <?php echo 'Admin:'; ?>
                                                <?php else : ?>
                                                    <?php echo ''; ?>
                                                <?php endif; ?>
                                            </span>
                                        </div>
                                        <p class="card__content"><?= $row["QA_reply"] ?></p>
                                        <p class="text-end"><?= $row["QA_reply_time"] ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="board__hr"></div>
                            <div class="reply">
                                <div class="container">
                                    <form id="adminReply" name="adminReply" method="post" action="DoPost.php">
                                        <div class="form-group">
                                            <label for="adminReply" class="col-ms-6 control-label">回覆內容：</label>
                                            <div class="col-ms-6">
                                                <textarea class="form-control" rows="8" id="adminReply" name="adminReply"></textarea>
                                            </div>
                                        </div>
                                        <div class="button py-2">
                                            <input type="submit" name="" id="button" value="回覆" class="btn btn-info" />
                                        </div>
                                        <input type="hidden" name="id" value="<?= $id ?>">
                                        <input type="hidden" name="QA_content_id" value="<?= $content_id ?>">
                                    </form>
                                </div>
                            </div>
                        </div>
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