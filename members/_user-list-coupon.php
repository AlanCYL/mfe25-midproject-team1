<?php
require_once("../db-connect.php");

unset($_SESSION['page']);
unset($_SESSION['searchId']);

if (!isset($_GET["p"])) {
    $p = 1;
} else {
    $p = $_GET["p"];
}

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    //全部使用者
    $sql = "SELECT user.*, level_name.name AS levelName FROM user 
    JOIN level_name ON user.user_level = level_name.id WHERE valid=1";
    $result = $conn->query($sql);
    $total = $result->num_rows;

    //全部使用者數量去做頁籤
    $per_page = 6;
    $start = ($p - 1) * $per_page;
    $page_count = CEIL($total / $per_page);

    //所有使用者做per_page筆一頁
    $sqlNew = "SELECT user.*, level_name.name AS levelName FROM user 
    JOIN level_name ON user.user_level = level_name.id WHERE valid=1 LIMIT $start, $per_page  ";
} else if (empty($_GET["id"])) {

    //假設沒指定ID時
    header("location:user-list-coupon.php");
} else {
    //搜尋全部特定使用者byID
    $id = $_GET["id"];
    $_SESSION["searchId"] = $id;

    $sql = "SELECT user.*, level_name.name AS levelName FROM user 
    JOIN level_name ON user.user_level = level_name.id WHERE  (user.user_id LIKE '%$id%' OR user.user_name LIKE '%$id%' OR level_name.name LIKE '%$id%' OR user.user_bir LIKE '%-$id%' ) AND user.valid = 1 ";
    $result = $conn->query($sql);
    $total = $result->num_rows;

    //特定全部使用者數量去做頁籤
    $per_page = 6;
    $start = ($p - 1) * $per_page;
    $page_count = CEIL($total / $per_page);

    $sqlNew = "SELECT user.*, level_name.name AS levelName FROM user 
    JOIN level_name ON user.user_level = level_name.id WHERE  (user.user_id LIKE '%$id%' OR user.user_name LIKE '%$id%' OR level_name.name LIKE '%$id%' OR user.user_bir LIKE '%-$id%' ) AND user.valid = 1 LIMIT $start, $per_page ";
}

$resultNew = $conn->query($sqlNew);
$rows = $resultNew->fetch_all(MYSQLI_ASSOC);
$user_count = $resultNew->num_rows;


?>

<div class="container pb-1 ">
    <div class="text-end py-2">
        第 <?= $p ?> 頁, 共 <?php if ($page_count == 0) : echo 1;
                            else : echo $page_count;
                            endif; ?> 頁, 共 <?= $total ?> 筆
    </div>
    <?php $_SESSION["page"]=$p ?>
    <div class="row">
        <div class="col-auto mx-auto py-3">
            <div class="row">
                <?php if (!isset($_GET["id"]) || empty($_GET["id"])) : ?>
                    <div class="col-auto mx-1 py-2 position-relative text-start ">
                        <form class="d-flex " action="">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="搜尋會員相關資訊" name="id">
                            </div>
                            <button class="btn text-info d-inline p-0 mx-1 " type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <div class="col-auto py-2 ">
                        <form class="d-flex" action="">
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="id">
                                <option selected>依會員等級選擇</option>
                                <option value="綠寶石">綠寶石</option>
                                <option value="藍寶石">藍寶石</option>
                                <option value="紅寶石">紅寶石</option>
                                <option value="鑽石">鑽石</option>
                            </select>
                            <button class="btn p-0 mx-1 text-info d-inline" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <div class="col-auto py-2 ">
                        <form class="d-flex" action="">
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="id">
                                <option selected>依會員生日月份選擇</option>
                                <option value="01-">一月</option>
                                <option value="02-">二月</option>
                                <option value="03-">三月</option>
                                <option value="04-">四月</option>
                                <option value="05-">五月</option>
                                <option value="06-">六月</option>
                                <option value="07-">七月</option>
                                <option value="08-">八月</option>
                                <option value="09-">九月</option>
                                <option value="10-">十月</option>
                                <option value="11-">十一月</option>
                                <option value="12-">十二月</option>
                            </select>
                            <button class="btn p-0 mx-1 text-info d-inline " type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
            </div>
        <?php else : ?>
            <div class="row my-3">
                <div class="col-auto">
                    <a href="user-list-coupon.php" class="btn btn-info text-white text-nowrap ">回到所有會員</a>
                </div>
            </div>
        <?php endif; ?>
        </div>
    </div>
    <form action="doCreateCoupon.php" method="post">
        <div class="row">
            <div class="col-lg-8 mx-auto ">
                <table class="table table-bordered">
                    <?php if ($user_count > 0) : ?>
                        <thead>
                            <tr>
                                <th>選擇</th>
                                <th>會員編號</th>
                                <th>會員姓名</th>
                                <th>會員生日</th>
                                <th>會員等級</th>
                                <th></th>
                            </tr>
                        </thead>
                        <form action="">
                            <tbody>
                                <?php
                                foreach ($rows as $row) : ?>
                                    <?php require("level.php"); ?>
                                    <tr>
                                        <td><input type="checkbox" class="checkbox-class" name="userId[]" value="<?= $row["user_id"] ?>"></td>
                                        <td><?= $row["user_id"] ?></td>
                                        <td><?= $row["user_name"] ?></td>
                                        <td><?= $row["user_bir"] ?></td>
                                        <td class="text-end"><?= $row["levelName"] ?></td>
                                        <td class="text-center" ><a class="btn btn-info text-white" href="userCouponHistory.php?id=<?= $row["user_id"]?>">檢視</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <button type="button" class="check-all btn btn-info text-white my-2">選擇全部</button>
                            <?php else : ?>
                                <?= "沒有相符資料" ?>
                            <?php endif; ?>
                        </form>
                </table>
            </div>
        </div>
        <div class="col-lg-8 mx-auto py-2 d-flex justify-content-center">
            <nav aria-label="Page navigation example  ">
                <ul class="pagination">
                    <?php if (!isset($_GET["id"]) || empty($_GET["id"]))  : ?>
                        <?php if ($p > 1) : ?>
                            <li class="page-item ">
                                <a class="page-link" href="user-list-coupon.php?p=<?= $p - 1 ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        <?php endif ?>
                        <li class="page-item"><a class="page-link" href="user-list-coupon.php?p=<?= $p ?> "><?= $p ?></a></li>
                        <?php if ($page_count > $p) : ?>
                            <li class="page-item">
                                <a class="page-link" href="user-list-coupon.php?p=<?= $p + 1 ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        <?php endif ?>
                    <?php else : ?>
                        <?php if ($p > 1) : ?>
                            <li class="page-item ">
                                <a class="page-link" href="user-list-coupon.php?p=<?= $p - 1 ?>&id=<?= $_GET["id"] ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        <?php endif ?>
                        <?php if ($p != 1) : ?>
                            <li class="page-item "><a class="page-link" href="user-list-coupon.php?p=<?= $p ?>&id=<?= $_GET["id"] ?> "><?= $p ?></a></li>
                        <?php endif ?>
                        <?php if ($page_count > $p) : ?>
                            <li class="page-item">
                                <a class="page-link" href="user-list-coupon.php?p=<?= $p + 1 ?>&id=<?= $_GET["id"] ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        <?php endif ?>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
        <?php if ($user_count > 0) : ?>
        <div class="row py-2">
            <div class="col-auto mx-auto py-3">
                <div class="row">
                    <div class="col-auto py-2 mx-auto">
                        <input type="text" class="form-control" placeholder="發送優惠券原因" name="reason">
                    </div>
                    <div class="col-4 py-2 mx-auto">
                        <input type="number" class="form-control" min="0" placeholder="金額(TWD)" name="price">
                    </div>
                    <div class="col-auto py-2 mx-auto">
                        <button class="btn btn-info text-white" type="submit">送出</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </form>
</div>