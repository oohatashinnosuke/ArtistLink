<?php
session_start();

require "pass.php";
$username = $_POST['username'];
$pass = $_POST['pass'];

// ユーザー名とパスワードが入力してあるかの確認
if (empty($username) || empty($pass)) {
  $output = 'Please enter a value';
}

// ログインするための処理
else {
  try {
    $dbh = new PDO($dsn, $user, $password);
    $select = "SELECT * FROM user WHERE username = '$username' AND pass = '$pass'";
    $res    = $dbh->query($select);
    $res->execute();
  } catch (PDOException $e) {
    echo 'error: ' . $e->getMessage();
    exit();
  }
  if ($res->rowCount() < 1) {
    $output = 'Incorrect email or password';
  }

  // DBのユーザーid情報をセッションに保存しトップページに移る処理
  else {
    $row = $res->fetch();
    $_SESSION['userid']   = $row['userid'];
    header('Location:top.php');
    exit;
  }
}
?>

<!DOCTYPE html>
<html>
<head>

  <title>login</title>

  <link rel="stylesheet" href="LoginRegister.css">

</head>
<body>

  <header>
    <a href="loginform.php" id="title">ARTIST LINK</a>
    <a href="aboutus.php" id="link1">ABOUT US</a>
  </header>

  <p id="comment"><?php
  //ログインできない理由を表示
  echo $output; ?></p>

  <form action='login.php' method='post'id="form1">

    <p>LOGIN</p>

    <p>User Name</p>
    <input type='text' name='username'class="inputform">

    <p>Password</p>
    <input type='text' name='pass'placeholder="・・・・・"class="inputform">
  </br>

  <input type='submit' value='SIGN IN'id="button">
</form>

<a href="registerform.php" id="link2">REGISTER</a>

</body>
</html>
