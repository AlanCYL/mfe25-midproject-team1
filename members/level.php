<?php

$levelId=$row["user_id"];

$sqlGoal = "SELECT user_and_groups.*, groups.* FROM user_and_groups
JOIN groups ON user_and_groups.groups_id = groups.groups_id
WHERE user_and_groups.user_id=$levelId AND groups.least_num <= groups.goal_num
";

$resultGoal = $conn->query($sqlGoal);
$rowsGroup = $resultGoal->fetch_all(MYSQLI_ASSOC);
$goal_count = $resultGoal->num_rows;

if( $goal_count >=0 ){
    $sqlLevelUp="UPDATE user SET user_level = 1 WHERE user_id='$levelId'";
    
    if($conn->query($sqlLevelUp) === FALSE){
        $conn->error;
        header("location:404.php");
    };
};


if( $goal_count >=2 ){
    $sqlLevelUp="UPDATE user SET user_level = 2 WHERE user_id='$levelId'";
    
    if($conn->query($sqlLevelUp) === FALSE){
        $conn->error;
        header("location:404.php");
    };
};

if( $goal_count >=3 ){
    $sqlLevelUp="UPDATE user SET user_level = 3 WHERE user_id='$levelId'";
    
    if($conn->query($sqlLevelUp) === FALSE){
        $conn->error;
        header("location:404.php");
    };
};

if( $goal_count >=4 ){
    $sqlLevelUp="UPDATE user SET user_level = 4 WHERE user_id='$levelId'";
    
    if($conn->query($sqlLevelUp) === FALSE){
        $conn->error;
        header("location:404.php");
    };
};


?>