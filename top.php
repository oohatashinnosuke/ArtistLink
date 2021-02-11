<?php
session_start();

$userid = $_SESSION['userid'];
require "pass.php";
?>

<!DOCTYPE HTML>
<html>
<head>

  <title>top</title>

  <link rel="stylesheet" href="top.css">

</head>
<body>

  <header>
    <a href="loginform.php" id="title">ARTIST LINK</a>
    <a href="addform.php" id="link1">ADD ARTIST</a>
    <a href="logout.php" id="link2">LOGOUT</a>
  </header>

  <?php

  // DBに接続し、ユーザーidの情報からアーティスト名とリンクの表示処理
  try {
    $dbh = new PDO($dsn, $user, $password);
    $sql = "SELECT * FROM artist WHERE userid = '$userid'";
    $res = $dbh->query($sql);

    foreach( $res as $value ) {

      echo'<a href="editform.php?id='.$value[id].'"id="artistname">'
      .$value[name].'</a><br>' ;

      if(!empty($value[link1])){
        echo'<a href="'.$value[link1].'"target="_blank"class="link">'
        .$value[linkname1].'</a><br>' ;}

        if(!empty($value[link2])){
          echo'<a href="'.$value[link2].'"target="_blank"class="link">'
          .$value[linkname2].'</a><br>';}

          if(!empty($value[link3])){
            echo'<a href="'.$value[link3].'"target="_blank"class="link">'
            .$value[linkname3].'</a><br>';}}
          }
          catch (PDOException $e) {
            echo "error: " . $e->getMessage() . "\n";
            exit();
          }

          ?>
        </body>
        </html>
