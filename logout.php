<?php
session_start();

//ログアウトするための処理
$_SESSION = array();
session_destroy();
header('Location:loginform.php');
exit;
?>
