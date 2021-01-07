<?php 
//NO1 XSS対応（ echoする場所で使用！それ以外はNG ）
    function h($str)
    {
        return htmlspecialchars($str, ENT_QUOTES);
    }

// NO2 DB接続
    function db_conn(){
        try {
          // //ローカルバージョン
          //   $db_name_local = "kakuzukeDB";    //データベース名
          //   $db_host_local = "localhost"; //DBホスト
          //   $db_id_local   = "root";      //アカウント名
          //   $db_pw_local   = "root";      //パスワード
          //   $pdo = new PDO('mysql:dbname='.$db_name_local.';charset=utf8;host='.$db_host_local, $db_id_local, $db_pw_local);
          // サクラバージョン
            $db_name_sakura = "tealimpala23_db";    //データベース名
            $db_host_sakura = "mysql57.tealimpala23.sakura.ne.jp"; //DBホスト
            $db_id_sakura   = "tealimpala23";      //アカウント名
            $db_pw_sakura   = "hooters5323";      //パスワード
            $pdo = new PDO('mysql:dbname='.$db_name_sakura.';charset=utf8;host='.$db_host_sakura, $db_id_sakura, $db_pw_sakura);
          //スコープ対応
            return $pdo;    
        } catch (PDOException $e) {
            exit('DB接続にエラーが発生:'.$e->getMessage());
        }
    }
  
//NO3 リダイレクト関数: redirect($file_name)
  function redirect($file_name){
    header("Location: ".$file_name);
    exit();
  }

//NO4 SessionCheck sessionIDのチェック
function sschk(){
    if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
      exit("Login Error");
  }else{
    //ログイン状態で、ページリロードしても、、session idを再発行してくれる（同じsession id使うと特定される）
    //  session_regenerate_id(true); のtrueは絶対にいれる（説明ページでtrue入っていないやつある時ある）。true外すと、前のファイルが残っていく(textファイルのやつ)。
      session_regenerate_id(true);
      $_SESSION["chk_ssid"] = session_id();
 }
}

  // function db_conn(){
  //     try {
  //       //localバージョン 
  //         $pdo = new PDO('mysql:dbname=kakuzukeDB; charset=utf8; host=localhost','root','root');
  //       // さくらバージョン。 https://secure.sakura.ad.jp/rs/cp/sites/database/list ここでドメイン名とか確認できる。講義動画①の1時間46分から
  //         //$pdo = new PDO('mysql:dbname=tealimpala23_db; charset=utf8; host=mysql57.tealimpala23.sakura.ne.jp','tealimpala23','5323NTnt');
  //       //スコープ対応
  //         return $pdo;    
  //     } catch (PDOException $e) {
  //         exit('DB接続にエラーが発生:'.$e->getMessage());
  //   }
  //   }








?>