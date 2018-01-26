<?php 
//フォームのデータ受け取り
$title = $_POST["title"];
$detail = $_POST["detail"];
$link = $_POST["link"];


//DB定義
const DB = "localhost";
const DB_ID = "root";
const DB_PW = "root";
const DB_NAME = "gs_db";

//PDOでデータベース接続
try {
    $pdo = new PDO('mysql:host=localhost;dbname=gs_db;charset=utf8','root','');
}catch (PDOException $e) {
    exit( 'DbConnectError:' . $e->getMessage());
}

// 実行したいSQL文
$sql = "INSERT INTO gs_an_table0 (id,title,link,detail,time)VALUES(NULL,:title,:link,:detail,sysdate())";

//MySQLで実行したいSQLセット。プリペアーステートメントで後から値は入れる
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title',$title,PDO::PARAM_STR);
$stmt->bindVAlue(':detail',$detail,PDO::PARAM_STR);
$stmt->bindVAlue(':link',$link,PDO::PARAM_STR);

//実際に実行
$flag = $stmt->execute();


//実行完了した場合はentry.phpにリダイレクト
//失敗した場合はエラーメッセージ表示
if($flag==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
    header('Location: index.php');
    exit();
}

?>