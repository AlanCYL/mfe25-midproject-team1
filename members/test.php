<pre>
<?php

require_once("../db-connect.php");

//算所有group_id數量
$sqlOld="SELECT groups_id FROM groups"; 
$resultOld = $conn->query($sqlOld);
$rowsOld = $resultOld->fetch_all(MYSQLI_ASSOC);

foreach($rowsOld as $rowOld){
    echo $rowOld["groups_id"];
    $sql="INSERT ";
};
exit;


$countOld = $resultOld->num_rows;


foreach($rowsOld as $rowOld){
    $groupIdOld = $rowOld["groups_id"];
}


//算所有established數量
$sqlNew="SELECT established.*, groups.* FROM established 
JOIN groups ON established.id = groups.groups_id
";
$resultNew = $conn->query($sqlNew);
$countNew = $resultNew->num_rows;
$rowsNew = $resultNew->fetch_all(MYSQLI_ASSOC);

if($countOld != $countNew){
    $diff = $countOld-$countNew;
    for($i=0;$i<$diff;$i++){
        $sqlAdd="INSERT  "
    }
}else{

}

$sql="SELECT groups_id FROM groups WHERE goal_num >= least_num";

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

foreach($rows as $row){
    $groupId = $row["groups_id"];
}



?>
</pre>