<?php
//NO1 最初にSESSIONを開始！！ココ大事！！
session_start();

//NO2 「login.php」から値を受け取る
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//NO3.  DB接続
include("function.php");
$pdo = db_conn();

//4. userDBからデータ取得
$sql = "SELECT * FROM kakuzukeDB_user_table WHERE lid=:lid AND lpw=:lpw AND life_flg=0";
$stmt = $pdo->prepare($sql); //* PasswordがHash化の場合→条件はlidのみ
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR); //* PasswordがHash化する場合はコメントする
$status = $stmt->execute();

//5. SQL実行時にエラーがある場合STOP
if($status==false){
    $error = $stmt->errorInfo();
    exit("SQLへのデータ取得失敗(login.phpのNO4の操作):".$error[2]);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();         //1レコードだけ取得する方法
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()

//5. 該当レコードがあればSESSIONに値を代入
//if(password_verify($lpw, $val["lpw"])){ //* PasswordがHash化の場合はこっちのIFを使う
if( $val["id"] != "" ){
  //Login成功時
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];
  $_SESSION["userid"]      = $val['id'];
  redirect("serch.php");
}else{
  //Login失敗時(Logout経由)
  redirect("login.php");
}

exit();

?>