<?php 
//このファイルでPHPからDBからデータの取得する

//NO1. SESSION開始！！
session_start();
//user id 確認
//echo $_SESSION["userid"];
//WHERE userid =  $_SESSION["userid"]

//NO2.DBへの接続(「function.php」参照)
    include("function.php");
    // セッションチェック
    sschk();
    $pdo = db_conn();

//NO3．DB内の検索
    $stmt = $pdo->prepare("SELECT * FROM kakuzukeDB_an_table WHERE userid=".$_SESSION["userid"]);
    $status = $stmt->execute();

//NO4．検索結果のjson化
    $view="";
    if($status==false) {
        //execute（SQL実行時にエラーがある場合）
        $error = $stmt->errorInfo();
        exit("SQLへのデータ取得失敗(all.phpのNO2の操作):".$error[2]);
    }else{
        // 
        while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){
            // $rは連想配列
            $view .='<tr class='.$r["id"].'>';
            $view .='<th>'.$r["name"].'</th>';
            $view .='<td>'.$r["address"].'</td>';
            //ここで「detail.php」にidをGETデータとして送信する。
            $view .='<td><a class="modify" href="detail.php?id='.$r["id"].'">修正</a></td>';
            $view .= "　";
             //ここで「delete.php」にidをGETデータとして送信する。
             // 管理職なら表示
            // if($_SESSION["kanri_flg"]=="1"){
            //     $view .='<td><a href="delete.php?id='.$r["id"].'">削除</a></td>';
            // }
            $view .='<td><a class="delete" href="delete.php?id='.$r["id"].'">削除</a></td>';  
            $view .='</tr>';
          }
    }
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/all.css?v=2">
    <link rel="stylesheet" href="./css/reset.css?v=2" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?v=2">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>格付けくん</title>
</head>

<body>
    <!-- header---------------------------- -->
    <header class="header">
        <h1>格付けくん</h1>
        <nav>
            <ul>
                <p><?=$_SESSION["name"]?>さんがログイン中</p>
                <li><a href="logout.php">ログアウト</a></li>
            </ul>
        </nav>
    </header>
    <!-- header---------------------------- -->


    <!-- glovalNavigation------------------- -->
    <div class="glovalNavigation">
        <nav>
            <ul>
                <li><a href="serch.php">格付検索</a></li>
                <li><a href="index.php">格付先登録</a></li>
                <li><a href="all.php">登録先一覧管理</a></li>
                <li><a href="setumei.php">語句説明</a></li>
                <li><a href="predict.php">業績予測</a></li>
            </ul>
        </nav>
    </div>
    <!-- glovalNavigation------------------- -->


    <!-- content---------------------------- -->
    <div class="content">
        <div class="tablebox">
            <table id="list">
            <tr class="60" style="font-weight: 900; border-bottom: solid 1px; border-bottom-color: rgb(177, 174, 174);"><th>社名</th><td>住所</td><td></td><td></td></tr>
                <?=$view?>
            </table>
        </div>
    </div>
    <!-- content---------------------------- -->


    <!-- footer---------------------------- -->
    <footer class="footer">
        <div class="footer1">
            <a href="https://github.com/oreo2990" target="_blank" rel="noopener noreferrer"><i
                    class="fa fa-github my-icon" aria-hidden="true"></i></a>
            <a href="https://www.instagram.com/oreo2990/" target="_blank" rel="noopener noreferrer"><i
                    class="fa fa-instagram my-icon" aria-hidden="true"></i></a>
            <a href="https://twitter.com/home" target="_blank" rel="noopener noreferrer"><i
                    class="fa fa-twitter my-icon" aria-hidden="true"></i></a>
            <a href="https://www.facebook.com/tosihiro.niwa/" target="_blank" rel="noopener noreferrer"><i
                    class="fa fa-facebook my-icon" aria-hidden="true"></i></a>
        </div>
        <div class="footer2">
            <p>© 2020 oreo2990</p>
        </div>
    </footer>
    <!-- footer---------------------------- -->

</body>

</html>