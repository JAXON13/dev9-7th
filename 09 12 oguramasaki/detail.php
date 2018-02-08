<?php
session_start();
include("functions.php");

chkSsid();
//index.php（登録フォームの画面ソースコードを全コピーして、このファイルをまるっと上書き保存）
$id = $_GET["id"];



//1.  DB接続します
$pdo = db_con();
  
  //２．データ登録SQL作成
  $stmt = $pdo->prepare("SELECT * FROM gs_an_table WHERE id=:id");
  $stmt->bindValue(":id",$id,PDO::PARAM_INT);
  $status = $stmt->execute();
  
  //３．データ表示
  $view="";
  if($status==false){
    //execute（SQL実行時にエラーがある場合）
    error_db_Info($stmt);
  }else{
    $row = $stmt->fetch();
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>POSTデータ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <?php if($_SESSION["kanri_flg"]=="0"){ ?>
      <a class="navbar-brand" href="index.php">データ登録</a>
      <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
      <?php }?>
      <?php if($_SESSION["kanri_flg"]=="1"){ ?>
     <div class="navbar-header"><a class="navbar-brand" href="henkou.php">データ一変更</a></div>
     <div class="navbar-header"><a class="navbar-brand" href="sakujo.php">データ一を削除する</a></div>
     <?php }?>
     <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
   </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>フリーアンケート</legend>
     <label>名前：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
     <label>Email：<input type="text" name="email" value="<?=$row["email"]?>"></label><br>
     <label><textArea name="naiyou" rows="4" cols="40"><?=$row["naiyou"]?></textArea></label><br>
     <input type="submit" value="送信">
     <input type="hidden" name="id" value="<?=$id?>">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>

