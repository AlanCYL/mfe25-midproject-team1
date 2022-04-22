<?php

$id=$row["user_id"];

$sqlGoal = "SELECT user_and_groups.*, groups.*, groups.groups_name AS shopName FROM user_and_groups
JOIN groups ON user_and_groups.groups_id = groups.groups_id
WHERE user_and_groups.user_id=$id AND groups.least_num <= groups.goal_num
";

$resultGoal = $conn->query($sqlGoal);
$rowsGroup = $resultGoal->fetch_all(MYSQLI_ASSOC);
$goal_count = $resultGoal->num_rows;

if( $goal_count >=0 ){
    $sqlLevelUp="UPDATE user SET user_level = 1 WHERE user_id='$id'";
    
    if($conn->query($sqlLevelUp) === FALSE){
        $conn->error;
        header("location:404.php");
    };
};


if( $goal_count >=1 ){
    $sqlLevelUp="UPDATE user SET user_level = 2 WHERE user_id='$id'";
    
    if($conn->query($sqlLevelUp) === FALSE){
        $conn->error;
        header("location:404.php");
    };
};

if( $goal_count >=2 ){
    $sqlLevelUp="UPDATE user SET user_level = 3 WHERE user_id='$id'";
    
    if($conn->query($sqlLevelUp) === FALSE){
        $conn->error;
        header("location:404.php");
    };
};

if( $goal_count >=3 ){
    $sqlLevelUp="UPDATE user SET user_level = 4 WHERE user_id='$id'";
    
    if($conn->query($sqlLevelUp) === FALSE){
        $conn->error;
        header("location:404.php");
    };
};


?>