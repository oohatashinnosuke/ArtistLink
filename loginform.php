<?php
session_start();

//ログインしている場合はトップページに移る処理
if (isset($_SESSION['userid'])):
  header('Location:top.php');
  exit;
  ?>

  <?php
  //ログインしていない場合は入力フォームに移る処理
  else : ?>

  <!DOCTYPE html>
  <html>
  <head>

    <title>loginpage</title>

    <link rel="stylesheet" href="LoginRegister.css">

  </head>
  <body>

    <header>
      <a href="loginform.php" id="title">ARTIST LINK</a>
      <a href="aboutus.php" id="link1">ABOUT US</a>
    </header>

    <form action='login.php' method='post'id="form2">

      <p>LOGIN</p>

      <p>User Name</p>
      <input type='text' name='username'class="inputform">

      <p>Password</p>
      <input type='text' name='pass'placeholder="・・・・・"class="inputform">
    </br>

    <input type='submit' value='SIGN IN'id="button">
  </form>

  <a href="registerform.php" id="link2">REGISTER</a>

<?php endif; ?>

</body>
</html>
