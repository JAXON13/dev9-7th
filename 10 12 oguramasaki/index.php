<?php
session_start();

//0.外部ファイル読み込み
include("functions.php");
//SESSION Chek
chkSsid();
?>




<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>POSTデータ登録</title>
  <link href="css/main.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
     <?php if($_SESSION["kanri_flg"]=="0"){ ?>
      <a class="navbar-brand" href="index.php">データ登録</a>
      <a class="navbar-brand" href="select.php">データ一覧</a>
      <?php }?>
      <?php if($_SESSION["kanri_flg"]=="1"){ ?>
     <a class="navbar-brand" href="henkou.php">データ一変更</a>
     <a class="navbar-brand" href="sakujo.php">データ一を削除する</a>
     <?php }?>
     <a class="navbar-brand" href="logout.php">ログアウト</a>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert2.php" enctype="multipart/form-data">
  <div class="jumbotron">
   <fieldset>
    <legend>毎回の食事を登録</legend>
     <label>日付：<input type="text" name="name"></label><br>
     <label>食事メニュー：<input type="text" name="email"></label><br>
     <label>糖質量<textArea name="naiyou" rows="4" cols="40"></textArea></label><br>
     <input type="file" name="upfile"><br>
     <input type="submit" value="送信">
     <input type="hidden" name="id" value="<?=$id?>">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
