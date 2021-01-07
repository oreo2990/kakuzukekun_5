<?php 
//このファイルDBのデータを修正する

//NO1. 「detail.php」からPOSTデータ取得
$name= $_POST["name"];
$address= $_POST["address"];
$FY2017uriage= $_POST["FY2017uriage"];
$FY2017urisou= $_POST["FY2017urisou"];
$FY2017eiri= $_POST["FY2017eiri"];
$FY2017keitune= $_POST["FY2017keitune"];
$FY2017zyunnri= $_POST["FY2017zyunnri"];
$FY2017sousisan= $_POST["FY2017sousisan"];
$FY2017ryudousisan= $_POST["FY2017ryudousisan"];
$FY2017koteisisan= $_POST["FY2017koteisisan"];
$FY2017ryudouhusai= $_POST["FY2017ryudouhusai"];
$FY2017koteihusai= $_POST["FY2017koteihusai"];
$FY2017zyunnsisan= $_POST["FY2017zyunnsisan"];
$FY2018uriage= $_POST["FY2018uriage"];
$FY2018urisou= $_POST["FY2018urisou"];
$FY2018eiri= $_POST["FY2018eiri"];
$FY2018keitune= $_POST["FY2018keitune"];
$FY2018zyunnri= $_POST["FY2018zyunnri"];
$FY2018sousisan= $_POST["FY2018sousisan"];
$FY2018ryudousisan= $_POST["FY2018ryudousisan"];
$FY2018koteisisan= $_POST["FY2018koteisisan"];
$FY2018ryudouhusai= $_POST["FY2018ryudouhusai"];
$FY2018koteihusai= $_POST["FY2018koteihusai"];
$FY2018zyunnsisan= $_POST["FY2018zyunnsisan"];
$FY2019uriage= $_POST["FY2019uriage"];
$FY2019urisou= $_POST["FY2019urisou"];
$FY2019eiri= $_POST["FY2019eiri"];
$FY2019keitune= $_POST["FY2019keitune"];
$FY2019zyunnri= $_POST["FY2019zyunnri"];
$FY2019sousisan= $_POST["FY2019sousisan"];
$FY2019ryudousisan= $_POST["FY2019ryudousisan"];
$FY2019koteisisan= $_POST["FY2019koteisisan"];
$FY2019ryudouhusai= $_POST["FY2019ryudouhusai"];
$FY2019koteihusai= $_POST["FY2019koteihusai"];
$FY2019zyunnsisan= $_POST["FY2019zyunnsisan"];
$comment= $_POST["comment"];
$tani= $_POST["tani"];
// ↓ここだけ「insert.php」から追加したやつ
$id = $_POST["id"]; 


//NO2. DBへの接続。
    include("function.php");
    $pdo = db_conn();

//NO３．データ登録SQL作成
//part1 stme変数ににinsertを入れる。
// ここのinsertで変数を直接入れるのはダメ、バインド変数を入れると、危険な文字を無効化できる
    $stmt = $pdo->prepare("UPDATE kakuzukeDB_an_table SET name=:name,address=:address,FY2017uriage=:FY2017uriage,FY2017urisou=:FY2017urisou,FY2017eiri=:FY2017eiri,FY2017keitune=:FY2017keitune,FY2017zyunnri=:FY2017zyunnri,FY2017sousisan=:FY2017sousisan,FY2017ryudousisan=:FY2017ryudousisan,FY2017koteisisan=:FY2017koteisisan,FY2017ryudouhusai=:FY2017ryudouhusai,FY2017koteihusai=:FY2017koteihusai,FY2017zyunnsisan=:FY2017zyunnsisan,FY2018uriage=:FY2018uriage,FY2018urisou=:FY2018urisou,FY2018eiri=:FY2018eiri,FY2018keitune=:FY2018keitune,FY2018zyunnri=:FY2018zyunnri,FY2018sousisan=:FY2018sousisan,FY2018ryudousisan=:FY2018ryudousisan,FY2018koteisisan=:FY2018koteisisan,FY2018ryudouhusai=:FY2018ryudouhusai,FY2018koteihusai=:FY2018koteihusai,FY2018zyunnsisan=:FY2018zyunnsisan,FY2019uriage=:FY2019uriage,FY2019urisou=:FY2019urisou,FY2019eiri=:FY2019eiri,FY2019keitune=:FY2019keitune,FY2019zyunnri=:FY2019zyunnri,FY2019sousisan=:FY2019sousisan,FY2019ryudousisan=:FY2019ryudousisan,FY2019koteisisan=:FY2019koteisisan,FY2019ryudouhusai=:FY2019ryudouhusai,FY2019koteihusai=:FY2019koteihusai,FY2019zyunnsisan=:FY2019zyunnsisan,comment=:comment,indate=sysdate(),tani=:tani WHERE id=:id");

//part2 insertの中身を精査し、バインド変数を作成。part1に入れ込む。
    $stmt->bindValue(':name' ,$name,PDO::PARAM_STR); 
    $stmt->bindValue(':address' ,$address,PDO::PARAM_STR); 
    $stmt->bindValue(':FY2017uriage' ,$FY2017uriage,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2017urisou' ,$FY2017urisou,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2017eiri' ,$FY2017eiri,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2017keitune' ,$FY2017keitune,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2017zyunnri' ,$FY2017zyunnri,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2017sousisan' ,$FY2017sousisan,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2017ryudousisan' ,$FY2017ryudousisan,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2017koteisisan' ,$FY2017koteisisan,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2017ryudouhusai' ,$FY2017ryudouhusai,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2017koteihusai' ,$FY2017koteihusai,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2017zyunnsisan' ,$FY2017zyunnsisan,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2018uriage' ,$FY2018uriage,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2018urisou' ,$FY2018urisou,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2018eiri' ,$FY2018eiri,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2018keitune' ,$FY2018keitune,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2018zyunnri' ,$FY2018zyunnri,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2018sousisan' ,$FY2018sousisan,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2018ryudousisan' ,$FY2018ryudousisan,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2018koteisisan' ,$FY2018koteisisan,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2018ryudouhusai' ,$FY2018ryudouhusai,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2018koteihusai' ,$FY2018koteihusai,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2018zyunnsisan' ,$FY2018zyunnsisan,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2019uriage' ,$FY2019uriage,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2019urisou' ,$FY2019urisou,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2019eiri' ,$FY2019eiri,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2019keitune' ,$FY2019keitune,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2019zyunnri' ,$FY2019zyunnri,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2019sousisan' ,$FY2019sousisan,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2019ryudousisan' ,$FY2019ryudousisan,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2019koteisisan' ,$FY2019koteisisan,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2019ryudouhusai' ,$FY2019ryudouhusai,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2019koteihusai' ,$FY2019koteihusai,PDO::PARAM_INT); 
    $stmt->bindValue(':FY2019zyunnsisan' ,$FY2019zyunnsisan,PDO::PARAM_INT); 
    $stmt->bindValue(':comment' ,$comment,PDO::PARAM_STR); 
    $stmt->bindValue(':tani' ,$tani,PDO::PARAM_STR); 
    // ここ「insert.php」から追加したやつ
    $stmt->bindValue(':id', $id, PDO::PARAM_INT); 

//part3 stme変数の中の関数を実行する
// 実行した結果(true or false)が、変数statusに返ってくる
    $status = $stmt->execute();


//NO４．データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    // ここで処理止める。この文章は””のエラー発生時の表示文以外テンプレ
    exit("SQLへのデータ登録失敗(update.phpのNO3の操作)".$error[2]);
}else{
    redirect("index.php");
}

?>