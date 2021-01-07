<?php  
//セッションスタート 
	session_start();
// ファイル読み込み
	include("function.php");
// セッションチェック
	sschk();
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="./css/predict.css?v=2">
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
		<!-- formのnameは消したたらダメ！ -->
		<form name="frm1">
			<div class="content1">
				<p>条件を入力してください</p>
			</div>

			<div class="content2"> 
				<!-- ここのnameは消したたらダメ！ -->
				従業員数<input class="box9" type="text" name="r_x" size="5" value="0" style="width: 200px;">(人),
				現預金<input class="box9" type="text" name="r_y" size="3" value="0" style="width: 200px;">(円),
				総資産<input class="box9" type="text" name="r_r" size="2" value="0" style="width: 200px;">(円)  
			</div>
		
			<div class="content3">
				<button type="button" class="btn-push" name="buttoncalc" onclick="Cal1()">計算実行</button>
			</div>
		
			<div class="content4">
				<p>計算結果</p>
			</div>

			<div class="content5">
				<!-- ここのnameは消したたらダメ！ -->
				予測売上<input class="box9" style="width: 300px; height: 30px; font-size: 30px; text-align: center;" type="text" name="fs5" size="5" value="?">(円)
			</div>	
		</form>
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


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@0.13.5"></script>
<script src="./js/predict.js"></script>


</body>
</html>