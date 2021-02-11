<?php

require "pass.php";
$username = $_POST['username'];
$pass = $_POST['pass'];

// ユーザー名とパスワードが入力してあるかの確認
if (empty($username) || empty($pass)) {
  $output = 'Please enter a value';
}

// 既に登録済みのユーザー名かどうか確認
else {
  $dbh0 = new PDO($dsn, $user, $password);
  $select = "SELECT * FROM user WHERE username = :username";
  $stmt = $dbh0->prepare($select);
  $stmt->bindValue(':username', $username);
  $stmt->execute();
  $member = $stmt->fetch();
  if ($member['username'] === $username) {
    $output = 'This username is already registered';
  }

  // ユーザー登録とログインフォームに移る処理
  else {
    try {
      $dbh = new PDO($dsn, $user, $password);
      $sql = "INSERT INTO user(username,pass)
      VALUES ('$username','$pass')";
      $res = $dbh->query($sql);
      header('Location:loginform.php');
      exit;
    } catch (PDOException $e) {
      echo "error: " . $e->getMessage() . "\n";
      exit();}}}?>

      <!DOCTYPE html>
      <html>
      <head>

        <title>register</title>

        <link rel="stylesheet" href="LoginRegister.css">

      </head>
      <body>

        <header>
          <a href="loginform.php" id="title">ARTIST LINK</a>
          <a href="aboutus.php" id="link1">ABOUT US</a>
        </header>

        <p id="comment"><?php
        //ユーザー登録できない理由を表示
        echo $output; ?></p>

        <form action='register.php' method='post'id="form1">

          <p>REGISTER</p>

          <p>User Name</p>
          <input type='text' name='username'class="inputform">

          <p>Password</p>
          <input type='text' name='pass'placeholder="・・・・・"class="inputform">
        </br>

        <input type='submit' value='REGISTER'id="button">
      </form>

      <a href="loginform.php" id="link2">LOGIN</a>

    </body>
    </html>
