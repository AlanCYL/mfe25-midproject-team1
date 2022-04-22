<?php
session_start();
session_destroy();

header("location: create-user.php");
?>