<div class="container">
    <div class="row justify-content-center">
        <div class="py-2 justify-content-center ">
            <a href=" user-list.php?<?php if(isset($_SESSION["typePage"])): echo "&type=".$_SESSION['typePage'];  endif;?><?php if(isset($_SESSION["page"])): echo "&p=".$_SESSION['page']; endif;?><?php if(isset($_SESSION["searchId"])): echo "&id=".$_SESSION['searchId']; endif;?>" class="btn text-Secondary  "><i class="fa-solid fa-arrow-rotate-left"></i></a>
        </div>
        <div class="col-lg-5">
            <h3 class="text-nowrap"><?= $row["user_name"] ?>的會員資料</h3>
            <table class="table table-bordered nowrap shadow-sm">
                <tr>
                    <th>會員編號</th>
                    <td><?= $row["user_id"] ?></td>
                </tr>
                <tr>
                    <th>姓名</th>
                    <td><?= $row["user_name"] ?></td>
                </tr>
                <tr>
                    <th>ID</th>
                    <td><?= $row["identity_card"] ?></td>
                </tr>
                <tr>
                    <th>暱稱</th>
                    <td><?= $row["nick_name"] ?></td>
                </tr>
                <tr>
                    <th>出生日期</th>
                    <td><?= $row["user_bir"] ?></td>
                </tr>
                <tr>
                    <th>手機號碼</th>
                    <td><?= $row["user_phone"] ?></td>
                </tr>
                <tr>
                    <th>電子信箱</th>
                    <td><?= $row["user_mail"] ?></td>
                </tr>
                <tr>
                    <th>會員等級</th>
                    <td><?= $row["levelName"] ?></td>
                </tr>
                <tr>
                    <th>創建日期</th>
                    <td><?= $row["user_create_time"] ?></td>
                </tr>
            </table>
            <div class="mb-3">
                <a class="btn btn-info text-white" href="user-edit.php?id=<?= $row["user_id"] ?>">編輯</a>
                <a class="btn btn-danger text-white" href="doDelete.php?id=<?= $row["user_id"] ?>">刪除</a>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="py-2">
                <h3 class="text-nowrap"><?= $row["user_name"] ?>的參團歷史</h3>
            </div>
            <div class="py-2">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link <?php if (!isset($_GET["cate"])) echo "active" ?>" aria-current="page" href="user.php?id=<?= $id ?>">所有歷史</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (isset($_GET["cate"]) && $_GET["cate"] == 1) echo "active" ?>" aria-current="page" href="user.php?id=<?= $id ?>&cate=1">已成團</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (isset($_GET["cate"]) && $_GET["cate"] == 2) echo "active" ?>" aria-current="page" href="user.php?id=<?= $id ?>&cate=2">未成團</a>
                    </li>
                </ul>
            </div>
            <div class="py-2">
                <table class="table table-bordered text-nowrap shadow-sm table-hover">
                    <nav aria-label="Page navigation example">
                    </nav>
                    <?php if ($users_count > 0) : ?>
                        <thead class="table-light">
                            <tr>
                                <th>參團編號</th>
                                <th>店家名稱</th>
                                <th>用餐日期</th>
                                <th>成團與否</th>
                                <th>是否付款</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rowsGroup as $rowGroup) : ?>
                                <tr class="">
                                    <td><?= $rowGroup["groups_id"] ?></td>
                                    <td><?= $rowGroup["shopName"] ?></td>
                                    <td><?= $rowGroup["eating_date"];
                                        ?></td>
                                    <td><?php
                                        if ($rowGroup["least_num"] <= $rowGroup["goal_num"]) {
                                            echo "是";
                                        } else {
                                            echo "否";
                                        }
                                        ?></td>
                                    <td><?php
                                        if ($rowGroup["least_num"] <= $rowGroup["goal_num"]) {
                                            echo "是";
                                        } else {
                                            echo "否";
                                        }
                                        ?></td>
                                    <td><a class="btn btn-info text-white" href="groupHistoryP.php?id=<?= $id ?>&g_id=<?= $rowGroup["groups_id"] ?>">檢視</a></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <?= "沒有相符資料" ?>
                        <?php endif; ?>
                        </tbody>
                </table>
            </div>
            <?php if ($page_count > 1) : ?>
                <div class="py-2 ">
                    <ul class="pagination justify-content-center">
                        <?php if ($p != 1) : ?>
                            <li class="page-item">
                                <a class="page-link" href="user.php?id=<?= $id ?>&p=<?= $p - 1 ?><?php if (isset($_GET["cate"])) echo "&cate=$cate"; ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="page-item "><a class="page-link" href="user.php?id=<?= $id ?>&p=<?= $p ?><?php if (isset($_GET["cate"])) echo "&cate=$cate"; ?>"><?= $p ?></a></li>
                        <?php if ($p < $page_count) : ?>
                            <li class="page-item">
                                <a class="page-link" href="user.php?id=<?= $id ?>&p=<?= $p + 1 ?><?php if (isset($_GET["cate"])) echo "&cate=$cate"; ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>