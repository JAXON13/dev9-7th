<?php
session_start();

include("functions.php");

chkSsid();
//1.  DB接続します
$pdo = db_con();



//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_an_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  queryError($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= $result["name"]."[".$result["indate"]."]";
    $view .='</a>';
    $view .= ' '; 
    $view .='</p>';
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>登録情報一覧</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <?php if($_SESSION["kanri_flg"]=="0"){ ?>
        <a class="navbar-brand" href="index.php">データ登録</a>
        <a class="navbar-brand" href="select.php">データ一覧</a>
        <?php }?>
        <?php if($_SESSION["kanri_flg"]=="1"){ ?>
       <a class="navbar-brand" href="henkou.php">データ変更</a>
       <a class="navbar-brand" href="sakujo.php">データを削除する</a>
       <?php }?>
       <a class="navbar-brand" href="logout.php">ログアウト</a>
       </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
  </div>
</div>
<!-- Main[End] -->

</body>
</html>
