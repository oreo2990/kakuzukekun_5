<?php
//このファイルでPHPからDBに接続及びデータ登録をする。
//NO1 最初にSESSIONを開始！！ココ大事！！
session_start();


//NO1. 「index.php」からPOSTデータ取得
    $lid= $_POST["lid"];
    $lpw2= $_POST["lpw2"];
    
//NO2. DBへの接続(phpのドキュメントサイト通り)。
        include("function.php");
        $pdo = db_conn();

//NO３．データ登録SQL作成
    //part1 stme変数ににinsertを入れる。
    // ここのinsertで変数を直接入れるのはダメ、バインド変数を入れると、危険な文字を無効化できる
        $stmt = $pdo->prepare("INSERT INTO kakuzukeDB_user_table(name,lid,lpw,kanri_flg,life_flg)VALUES(:lid,:lid,:lpw2,0,0)");

    //part2 insertの中身を精査し、バインド変数を作成。part1に入れ込む。
        $stmt->bindValue(':lid' ,$lid,PDO::PARAM_STR); 
        $stmt->bindValue(':lpw2' ,$lpw2,PDO::PARAM_STR); 

    //part3 stme変数の中の関数を実行する
    // 実行した結果(true or false)が、変数statusに返ってくる
        $status = $stmt->execute();

    // part4 エラー確認
    if($status==false){
        //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
        $error = $stmt->errorInfo();
        if($error[2] == "Duplicate entry '".$lpw2."' for key 'lpw'"){
            redirect("account error.php");
        }else{
            // ここで処理止める。この文章は””のエラー発生時の表示文以外テンプレ
            exit("SQLへのデータ登録失敗(insert2.phpのNO3の操作)".$error[2]);
        }
    }

//NO４．データ登録処理後
    // part1 userDBからデータ取得
    $sql = "SELECT * FROM kakuzukeDB_user_table WHERE lid=:lid AND lpw=:lpw2 AND life_flg=0";
    $stmt = $pdo->prepare($sql); //* PasswordがHash化の場合→条件はlidのみ
    $stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
    $stmt->bindValue(':lpw2', $lpw2, PDO::PARAM_STR);
    $status = $stmt->execute();

    // part2 SQL実行時にエラーがある場合STOP
    if($status==false){
    $error = $stmt->errorInfo();
    exit("SQLへのデータ取得失敗(inset2.phpのNO4の操作):".$error[2]);
    }
    
    // part4. 抽出データ数を取得
    $val = $stmt->fetch();  

    //part5. 該当レコードがあればSESSIONに値を代入
    if( $val["id"] != "" ){
    //Login成功時
    $_SESSION["chk_ssid"]  = session_id();
    $_SESSION["kanri_flg"] = $val['kanri_flg'];
    $_SESSION["name"]      = $val['name'];
    $_SESSION["userid"]      = $val['id'];
    redirect("serch.php");
  }else{
    //Login失敗時(Logout経由)
    redirect("account.php");
  }

?>
