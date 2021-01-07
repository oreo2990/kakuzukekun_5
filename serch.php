<?php 
//セッションスタート 
session_start();
// ファイル読み込み
	include("function.php");
// セッションチェック
	sschk();
	// echo $_SESSION["name"];
	// echo $_SESSION["userid"];
	// echo "aa";
?>

<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./css/serch.css?v=2">
	<link rel="stylesheet" href="./css/reset.css?v=2" />
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?v=2">
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

		<!-- 以下、form入力------------------------------------------------- -->
		<!-- ここのactionで「select.php」に飛んでいく。methodは送信方法。-->
		<div class="corpinfobox">
			<form action="select.php" method="post">
				
				<div class="serchbox1">
					<div class="serchbox2">
						<input type="text"  name="name" placeholder="企業名">
					</div>
				</div>
					
				<div class="sendbutton">
					<input class="btn" type="submit" name="button" value="検索">
				</div>

			</form>
		</div>
		<!-- 以上、form入力----------------------------------------------- -->

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