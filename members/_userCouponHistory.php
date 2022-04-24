<?php

$id = $_GET["id"];

$sql = "SELECT user.*, level_name.name AS levelName FROM user 
JOIN level_name ON user.user_level = level_name.id WHERE user_id='$id' AND valid=1 ";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (!$row) {
    header("location: 404.php");
}

if(!isset($_GET["cate"])){

$sqlCoupon = "SELECT user_and_coupon.*, coupon.* FROM user_and_coupon 
JOIN coupon ON user_and_coupon.coupon_id = coupon.id 
WHERE user_and_coupon.user_id = '$id' ";

}else if(isset($_GET["cate"]) && $_GET["cate"] == 1 ){

$sqlCoupon = "SELECT user_and_coupon.*, coupon.* FROM user_and_coupon 
JOIN coupon ON user_and_coupon.coupon_id = coupon.id 
WHERE user_and_coupon.user_id = '$id' AND user_and_coupon.valid = '1' ";

}else if(isset($_GET["cate"]) && $_GET["cate"] == 0){

$sqlCoupon = "SELECT user_and_coupon.*, coupon.* FROM user_and_coupon 
JOIN coupon ON user_and_coupon.coupon_id = coupon.id 
WHERE user_and_coupon.user_id = '$id' AND user_and_coupon.valid = '0' ";  

}



$resultCoupon = $conn->query($sqlCoupon);
$rowsCoupon = $resultCoupon->fetch_all(MYSQLI_ASSOC);
$coupon_count = $resultCoupon->num_rows;



// if (!$rowCoupon) {
//     header("location: 404.php");
// }

?>

<div class="container">
    <div class="py-2 justify-content-center ">
        <a href="user-list-coupon.php" class="btn text-Secondary  "><i class="fa-solid fa-arrow-rotate-left"></i></a>
    </div>
    <div class="row">
        <div class="py-2">
            <table class="table table-bordered text-nowrap">
                <thead>
                    <tr class="text-center">
                        <th>會員編號</th>
                        <th>會員姓名</th>
                        <th>會員生日</th>
                        <th>會員等級</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td><?= $row["user_id"] ?></td>
                        <td><?= $row["user_name"] ?></td>
                        <td><?= $row["user_bir"] ?></td>
                        <td><?= $row["levelName"] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
    <div class="py-2">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link <?php if (!isset($_GET["cate"])) echo "active" ?>" aria-current="page" href="userCouponHistory.php?id=<?=$id?>">所有優惠券歷史</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (isset($_GET["cate"]) && $_GET["cate"] == 1) echo "active" ?>" aria-current="page" href="userCouponHistory.php?id=<?=$id?>&cate=1">仍有效</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (isset($_GET["cate"]) && $_GET["cate"] == 0) echo "active" ?>" aria-current="page" href="userCouponHistory.php?id=<?=$id?>&cate=0">已失效</a>
                    </li>
                </ul>
            </div>
        <?php if($coupon_count > 0):?>
        <table class="table table-bordered text-nowrap">
            <thead>
                <tr class="text-center">
                    <th>優惠券編號</th>
                    <th>優惠券原因</th>
                    <th>價值(TWD)</th>
                    <th>是否有效</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rowsCoupon as $rowCoupon) : ?>
                    <tr class="text-center">
                        <td><?= $rowCoupon["coupon_id"] ?></td>
                        <td><?= $rowCoupon["reason"] ?></td>
                        <td><?= $rowCoupon["price"] ?></td>
                        <td><?php if ($rowCoupon["valid"] = 1) : echo "是";
                            else : echo "否";
                            endif; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: echo " 查無相關資料 "; ?>
        <?php endif; ?>
    </div>
</div>