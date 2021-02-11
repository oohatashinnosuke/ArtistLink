<?php

require "pass.php";

$id= $_GET[id];

// 登録したアーティストを削除する処理
try {
  $dbh = new PDO($dsn, $user, $password);
  $sql = "DELETE FROM artist WHERE id = $id";
  $res = $dbh->query($sql);
  header('Location:top.php');
  exit;
}
catch (PDOException $e) {
  echo "error: " . $e->getMessage() . "\n";
  exit();
}
?>
