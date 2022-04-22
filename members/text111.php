<pre>
<?php

require_once("../db-connect.php");

// $id=1;

$sql=" SELECT name FROM test WHERE id='$id' ";

$result = $conn->query($sql);
$rows = $result->fetch_assoc();

// var_dump($rows);
// var_dump($rows["name"]);


$pattern="/,/";
$output=preg_split($pattern, $rows["name"]);
// print_r($output);
// print_r(count($output));
// echo "<br>";

// echo $output[0];
// echo $output[1];
// echo $output[2];
// echo $output[3];

// echo "<br>";



for($i=0;$i<count($output);$i++){
    $sql1="SELECT name FROM level_name WHERE id='$output[$i]' ";
    $result1 = $conn->query($sql1);
    $rows1 = $result1->fetch_assoc();
    echo "$rows1[name]<br>";
}


?>
</pre>