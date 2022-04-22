<?php
require_once("../db-connect.php");


$sql="SELECT * FROM dish  JOIN groups_and_dish ON dish.dish_id=groups_and_dish.dish_id";
$result=$conn->query($sql);
$rows = $result->fetch_assoc();
var_dump($rows) ;

?>