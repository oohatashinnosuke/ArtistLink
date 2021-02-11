<?php
session_start();

$userid = $_SESSION['userid'];
$name = $_POST['name'];
$linkname1 = $_POST['linkname1'];
$link1 = $_POST['link1'];
$linkname2 = $_POST['linkname2'];
$link2 = $_POST['link2'];
$linkname3 = $_POST['linkname3'];
$link3 = $_POST['link3'];

// アーティストの名前が入力されているか確認
if(empty($name)){$output = 'Please enter the artist name';}

// リンク名とリンクの両方入力されているか確認
else{
  if(empty($linkname1)&&!empty($link1)||!empty($linkname1)&&empty($link1)
  ||empty($linkname2)&&!empty($link2)||!empty($linkname2)&&empty($link2)
  ||empty($linkname3)&&!empty($link3)||!empty($linkname3)&&empty($link3))
  {$output ='Please enter the linkname and link';}

  // アーティストが50以上登録されていないか確認
  else{
    require "pass.php";
    $dbh0 = new PDO($dsn , $user , $password);
    $sql = 'SELECT id FROM artist ';
    $stmt = $dbh0->query($sql);
    $stmt->execute();
    $count=$stmt->rowCount();
    if(50<$count){$output ='You can only register up to 50';}

    // アーティスト名やリンクの登録処理
    else{
      try {
        $dbh = new PDO($dsn, $user, $password);
        $sql = "INSERT INTO artist(userid,
          name,linkname1,link1,linkname2,link2,linkname3,link3
        ) VALUES ('$userid','$name','$linkname1','$link1',
          '$linkname2','$link2','$linkname3','$link3'
        )";
        $res = $dbh->query($sql);
        header('Location:top.php');
        exit;
      }
      catch (PDOException $e) {
        echo "error: " . $e->getMessage() . "\n";
        exit();
      }}}}
      ?>

      <!DOCTYPE html>
      <html>
      <head>

        <title>add</title>

        <link rel="stylesheet" href="AddEdit.css">

      </head>
      <body>

        <header>
          <a href="loginform.php" id="title">ARTIST LINK</a>
        </header>

        <p id="comment"><?php
        //アーティスト名やリンクを登録できない理由を表示
        echo $output; ?></p>

        <form action='add.php' method='post'id="form1">

          <p>ADD ARTIST</p>

          <p>Name</p>
          <input type='text' name='name'class="inputform">

          <p>Linkname1</p>
          <input type='text' name='linkname1'class="inputform">

          <p>Link1</p>
          <input type='text' name='link1'class="inputform">

          <p>Linkname2</p>
          <input type='text' name='linkname2'class="inputform">

          <p>Link2</p>
          <input type='text' name='link2'class="inputform">

          <p>Linkname3</p>
          <input type='text' name='linkname3'class="inputform">

          <p>Link3</p>
          <input type='text' name='link3'class="inputform">
        </br>

        <input type='submit' value='ADD'id="button">
      </form>

    </body>
    </html>
