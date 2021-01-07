<?php 
//NO１． 「all.php」からidを取得
$id = $_GET["id"];
//echo $id;

//2 DB接続
include("function.php");
$pdo = db_conn();

//3．dbのデータ消去
//prepareはSQLの構文使うやつ
$stmt = $pdo->prepare("DELETE FROM kakuzukeDB_an_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


//4．ページ遷移
$view="";
if($status==false) {
  sql_error($stmt);
}else{
    redirect("all.php");
}

?>