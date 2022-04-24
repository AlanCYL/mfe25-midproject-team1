<?php
session_start();
session_destroy();

echo
" <script> 
alert('隨時期盼您再次使用本後臺管理系統'); 
location.href='manager-login.php';
</script> ";

?>