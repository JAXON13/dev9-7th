<?php
//index.php（登録フォームの画面ソースコードを全コピーして、このファイルをまるっと上書き保存）
include("functions.php");

$id = $_GET["id"];

//1.  DB接続します
$pdo = db_con();


  
  //２．データ登録SQL作成
  $stmt = $pdo->prepare("DELETE FROM gs_an_table WHERE id=:id");
  $stmt->bindValue(":id",$id,PDO::PARAM_INT);
  $status = $stmt->execute();
  
  //３．データ表示
  $view="";
  if($status==false){
    //execute（SQL実行時にエラーがある場合）
    error_db_Info($stmt);
  }else{
      header("Location: sakujo.php");
      exit();
  }
?>