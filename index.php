<?php  
//セッションスタート 
	session_start();
// ファイル読み込み
	include("function.php");
// セッションチェック
	sschk();
?>

<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./css/index.css?v=2">
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
		<!-- 以下、form入力- -->
		<!-- ここのactionで「insert.php」に飛んでいく。methodは送信方法。-->
		<!-- 「insert.php」にて、mysqlにデータを飛ばす -->
		<form action="insert.php" method="post">
			<div class="corpinfobox">
				<div class="corpinfo">
					<label>企業名:</label><input type="text" style="width:250px;" name="name">
					<label>住所:</label><input type="text" style="width:300px;" name="address">
					<label>単位:</label><select name="tani" id="tani">
						<option value="千円">千円</option>
						<option value="百万円">百万円</option>
						<option value="十億">十億</option>
					</select>
				</div>
			</div>

			<div class="inputarea">
				<div class="FY2017">
					<div>
						<p>FY2017</p>
					</div>
					<ul>
						<li><label>売上高:</label><input type="number" name="FY2017uriage"></li>
						<li><label>売上総利益:</label><input type="number" name="FY2017urisou"></li>
						<li><label>営業利益:</label><input type="number" name="FY2017eiri"></li>
						<li><label>経常利益:</label><input type="number" name="FY2017keitune"></li>
						<li><label>当期純利益:</label><input type="number" name="FY2017zyunnri"></li>
						<li><label>総資産:</label><input type="number" name="FY2017sousisan"></li>
						<li><label>流動資産:</label><input type="number" name="FY2017ryudousisan"></li>
						<li><label>固定資産:</label><input type="number" name="FY2017koteisisan"></li>
						<li><label>流動負債:</label><input type="number" name="FY2017ryudouhusai"></li>
						<li><label>固定負債:</label><input type="number" name="FY2017koteihusai"></li>
						<li><label>純資産:</label><input type="number" name="FY2017zyunnsisan"></li>
					</ul>
				</div>
				<div class="FY2018">
					<p>FY2018</p>
					<ul>
						<li><label>売上高:</label></label><input type="number" name="FY2018uriage"></li>
						<li><label>売上総利益:</label><input type="number" name="FY2018urisou"></li>
						<li><label>営業利益:</label><input type="number" name="FY2018eiri"></li>
						<li><label>経常利益:</label><input type="number" name="FY2018keitune"></li>
						<li><label>当期純利益:</label><input type="number" name="FY2018zyunnri"></li>
						<li><label>総資産:</label><input type="number" name="FY2018sousisan"></li>
						<li><label>流動資産:</label><input type="number" name="FY2018ryudousisan"></li>
						<li><label>固定資産:</label><input type="number" name="FY2018koteisisan"></li>
						<li><label>流動負債:</label><input type="number" name="FY2018ryudouhusai"></li>
						<li><label>固定負債:</label><input type="number" name="FY2018koteihusai"></li>
						<li><label>純資産:</label><input type="number" name="FY2018zyunnsisan"></li>
					</ul>
				</div>
				<div class="FY2019">
					<p>FY2019</p>
					<ul>
						<li><label>売上高:</label></label><input type="number" name="FY2019uriage"></li>
						<li><label>売上総利益:</label><input type="number" name="FY2019urisou"></li>
						<li><label>営業利益:</label><input type="number" name="FY2019eiri"></li>
						<li><label>経常利益:</label><input type="number" name="FY2019keitune"></li>
						<li><label>当期純利益:</label><input type="number" name="FY2019zyunnri"></li>
						<li><label>総資産:</label><input type="number" name="FY2019sousisan"></li>
						<li><label>流動資産:</label><input type="number" name="FY2019ryudousisan"></li>
						<li><label>固定資産:</label><input type="number" name="FY2019koteisisan"></li>
						<li><label>流動負債:</label><input type="number" name="FY2019ryudouhusai"></li>
						<li><label>固定負債:</label><input type="number" name="FY2019koteihusai"></li>
						<li><label>純資産:</label><input type="number" name="FY2019zyunnsisan"></li>
					</ul>
				</div>
			</div>

			<div class="textbox">
				<p>担当評価コメント</p>
			</div>


			<div class="textbox">
				<textarea cols="60" rows="8" type="text" name="comment"></textarea>
			</div>
			<input type="hidden" name="userid" value="<?=$_SESSION["userid"]?>">
			<div class="sendbutton">
				<input type="submit" name="button" value="データ登録">
			</div>

		</form>
		<!-- 以上、form入力- -->

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