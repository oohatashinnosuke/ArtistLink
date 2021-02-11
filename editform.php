<!DOCTYPE HTML>
<html>
<head>

  <title>editform</title>

  <link rel="stylesheet" href="AddEdit.css">

</head>
<body>

  <header>
    <a href="loginform.php" id="title">ARTIST LINK</a>
  </header>

  <?php

  require "pass.php";

  $id= $_GET[id];

  // 登録したアーティスト名やリンクの情報を受け取る処理
  try {
    $dbh = new PDO($dsn, $user, $password);
    $sql = "SELECT * FROM artist WHERE id = '$id'";
    $res = $dbh->query($sql);
    foreach( $res as $value ) {
      $name=$value[name];$linkname1=$value[linkname1];$link1=$value[link1];
      $linkname2=$value[linkname2];$link2=$value[link2];
      $linkname3=$value[linkname3];$link3=$value[link3];
    }}
    catch (PDOException $e) {
      echo "error: " . $e->getMessage() . "\n";
      exit();
    }
    ?>

    <form action='edit.php' method='post'id="form2">

      <p>EDIT</p>

      <p>Name</p>
      <input type='text' name='name'
      value="<?php if(!empty($name)){echo $name;} ?>"class="inputform">

      <p>Linkname1</p>
      <input type='text' name='linkname1'
      value="<?php if(!empty($linkname1)){echo $linkname1;} ?>"class="inputform">

      <p>Link1</p>
      <input type='text' name='link1'
      value="<?php if(!empty($link1)){echo $link1;} ?>"class="inputform">

      <p>Linkname2</p>
      <input type='text' name='linkname2'
      value="<?php if(!empty($linkname2)){echo$linkname2;} ?>"class="inputform">

      <p>Link2</p>
      <input type='text' name='link2'
      value="<?php if(!empty($link2)){echo$link2;} ?>"class="inputform">

      <p>Linkname3</p>
      <input type='text' name='linkname3'
      value="<?php if(!empty($linkname3)){echo $linkname3;} ?>"class="inputform">

      <p>Link3</p>
      <input type='text' name='link3'
      value="<?php if(!empty($link3)){echo $link3;} ?>"class="inputform">
    </br>

    <input type="hidden" name="id" value="<?php echo $id;?>" >

    <input type='submit' value='ADD'id="button">
  </form>

  <?php
  print '<a href="delete.php?id='. $id .'" id="link2">DELETE ARTIST</a>'
  ?>

</body>
</html>
