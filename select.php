<?php 
//このファイルでPHPからDBからデータの取得する

// NO1セッションスタート
session_start();

// NO2 「serch.php」からPOSTデータ取得(ここで探す企業の選定)
    $name= $_POST["name"];
    // $CorporateNumber= $_POST["CorporateNumber"];
    // $establishment= $_POST["establishment"];

//NO3.DBへの接続(「function.php」参照)
    include("function.php");
    //セッションチェック 
    sschk();
    $pdo = db_conn();

//NO4．DB内の検索
    //ここの取得方法を変更すれば、特定の情報の取得とか、昇順/降順とかに変更できる
    //$stmtというオブジェクト変数の中に、取得したデータ一式が格納される
    //検討事項！！！！ → ここで複数の検索条件つける！ where以下で  CorporateNumber = $CorporateNumber OR (name LIKE '%$name%') を書いても、思ったように検索できない
    $stmt = $pdo->prepare("SELECT * FROM kakuzukeDB_an_table WHERE name LIKE '%$name%' AND userid=".$_SESSION["userid"]);
    // $stmtに、実行結果が格納される
    $status = $stmt->execute();

//NO5．検索結果のjson化
    $view="";
    if($status==false) {
        //execute（SQL実行時にエラーがある場合）
        $error = $stmt->errorInfo();
        exit("SQLへのデータ取得失敗(select.phpのNO3の操作):".$error[2]);
    }else{
        //jsonとしてデータ取得
        while( $result[] = $stmt->fetch(PDO::FETCH_ASSOC));
        $json = json_encode($result,JSON_UNESCAPED_UNICODE);      
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="./css/select.css?v=2">
<link rel="stylesheet" href="./css/reset.css?v=2">
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


    <div class="reserchresultbox">
        <p class="reserchresult"></p>
    </div>

    <div class="tablebox">
        <table id="list">
            <tr class="60" style="font-weight: 900; border-bottom: solid 1px; border-bottom-color: rgb(177, 174, 174);"><th>社名</th><td>住所</td><td></td><td></td></tr>
        </table>
    </div>
		
	</div>
	<!-- content---------------------------- -->

	<!-- footer---------------------------- -->
	<footer class="footer">
		<div class="footer1">
			<a href="https://github.com/oreo2990" target="_blank" rel="noopener noreferrer"><i class="fa fa-github my-icon" aria-hidden="true"></i></a>
			<a href="https://www.instagram.com/oreo2990/" target="_blank" rel="noopener noreferrer"><i class="fa fa-instagram my-icon" aria-hidden="true"></i></a>
			<a href="https://twitter.com/home" target="_blank" rel="noopener noreferrer"><i class="fa fa-twitter my-icon" aria-hidden="true"></i></a>
			<a href="https://www.facebook.com/tosihiro.niwa/" target="_blank" rel="noopener noreferrer"><i class="fa fa-facebook my-icon" aria-hidden="true"></i></a>
		</div>
		<div class="footer2">
			<p>© 2020 oreo2990</p>
		</div>
	</footer>
	<!-- footer---------------------------- -->


<script>

//NO1 PHPでDBから取得したjsonデータの配列化
    const data =  JSON.parse('<?=$json?>'); 
    // console.log(data); 
    // console.log(data[0]);
    // console.log(data[0].name);
    // console.log(data.length-2)

//NO2 取得したデータの表示
   if("<?=$name?>" == ""){
    document.querySelector(".reserchresult").innerHTML=`『』の検索結果は、0件です。`

   }else{
    for(let i=0; i<data.length-1; i++){
        const name =data[i].name;
        const id =data[i].id;
        const address =data[i].address;
        const html = '<tr class='+id+'><th>'+name+'</th><td>'+address+'</td><td><form action="result.php" method="post"><input style="display:none;" value="'+id+'" name="sendid"><input type="submit" name="button" value="格付"></form></td></tr>'
        document.querySelector("#list").insertAdjacentHTML("beforeend", html);
    };

    // NO3 テキストの表示
    let serchtext = "<?=$name?>";
    document.querySelector(".reserchresult").innerHTML=`『${serchtext}』の検索結果は、${data.length-1}件です。`

   }


</script>



</body>
</html>