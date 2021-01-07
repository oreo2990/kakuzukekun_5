<?php 
//セッションスタート 
session_start();
// ファイル読み込み
	include("function.php");
// セッションチェック
	sschk();
?>


<!doctype html>
<html>

<head>
	<meta charset="utf-8" />
	<title>格付けくん</title>
	<link rel="stylesheet" href="./css/setumei.css?v=2">
	<link rel="stylesheet" href="./css/reset.css?v=2">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?v=2">
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
		<div class="cp_qa">
			<input id="fa1" type="radio" name="tabs" checked>
			<label for="fa1" class="fa">損益計算書</label>
			<input id="fa2" type="radio" name="tabs">
			<label for="fa2" class="fa">貸借対象表</label>
			<input id="fa3" type="radio" name="tabs">
			<label for="fa3" class="fa">財務分析指標</label>
			<input id="fa4" type="radio" name="tabs">
			<label for="fa4" class="fa">分析とは</label>
			<div id="cp_content1">
				<div class="cp_qain">
					<div class="cp_actab">
						<input id="cp_tabfour051" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour051">損益計算書とは？</label>
						<div class="cp_actab-content">損益計算書は、収益・費用・利益が記載されており、英語の「Profit and Loss Statement」を略して「P/L」とも呼ばれます。決算時に収益から費用を差し引いた利益を知るための書類なので、会社が「費用を何に使って」「どれだけ売上が上がり」「どれくらい儲かったのか」を読み取ることができます。</div>
					</div>
					<div class="cp_actab">
						<input id="cp_tabfour052" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour052">売上とは？</label>
						<div class="cp_actab-content">商品を販売したり、サービスを提供したりといった、会社の本業である営業活動の対価として得られる収益です。原則として商品やサービスを顧客に引き渡した時点で計上されるため、実際に現金が入ってくる時期とはずれが生じます。まだスタートしたばかりの企業や事業では、利益や利益率よりも売上を増やすことに注力する傾向があります。そのため、売上だけを見て経営状態を判断すると、資金繰りの悪化に気付きにくいというリスクがあります。</div>
					</div>
					<div class="cp_actab">
						<input id="cp_tabfour053" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour053">売上総利益とは？</label>
						<div class="cp_actab-content">売上総利益は、自社の核となる商品やサービスによって得ている利益が把握できる項目で、「粗利」とも呼ばれます。売上から売上原価を差し引くことで、売上総利益が算出できます。</div>
					</div>
					<div class="cp_actab">
						<input id="cp_tabfour054" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour054">営業利益とは？</label>
						<div class="cp_actab-content">営業利益とは、本業における営業力によって稼ぎ出した利益のことです。売上総利益から、商品やサービスを販売するために欠かせない経費である「販売費および一般管理費」を差し引くことで、営業利益を求めることができます。</div>
					</div>
					<div class="cp_actab">
						<input id="cp_tabfour055" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour055">経常利益とは？</label>
						<div class="cp_actab-content">会社の本業で得られる営業利益に対し、経常利益は本業以外の収益・費用をまとめたものです。株の売却益や、本業に付随して販売した商品の販売益などがこれに含まれます。営業利益に「営業外収益」を加えて、「営業外費用」を差し引くことで、経常利益を求めることができます。</div>
					</div>
					<div class="cp_actab">
						<input id="cp_tabfour056" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour056">当期純利益とは？</label>
						<div class="cp_actab-content">当該決算期における、最終的な利益のことを「当期利益」といい、「純利益」とも呼ばれます。当期利益が純粋な企業の利益となりますので、この数字がマイナスであれば赤字ということになります。</div>
					</div>
				</div>
			</div>
			<div id="cp_content2">
				<div class="cp_qain">
					<div class="cp_actab">
						<input id="cp_tabfour057" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour057">貸借対照表とは？</label>
						<div class="cp_actab-content">貸借対照表はバランスシート（B/S）とも呼ばれ、企業の一定時点の財政状態を「資産」「負債」「純資産」から見ることができるものです。つまり、決算時（一定時点）、会社はどんな財産（資産）を持っていて、その財産の元になるお金（負債・純資産）はどうやって集めてきたかがわかるようになっています。</div>
					</div>
					<div class="cp_actab">
						<input id="cp_tabfour058" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour058">総資産とは？</label>
						<div class="cp_actab-content">総資産とは、会社が集めたお金をどのような状態で持っているのかを表すもので、これらの資産は1年以内に現金化することが出来る「流動資産」と長期にわたり会社が保有することになる「固定資産」とに分けられています。貸借対照表の資産は、原則として現金化しやすいものから順番に並んでいますので、上の段に「流動資産」、下の段に「固定資産」が表示されています。</div>
					</div>
					<div class="cp_actab">
						<input id="cp_tabfour059" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour059">流動資産とは？</label>
						<div class="cp_actab-content">1年以内に現金化することが出来る資産。現金・預金・受取手形・売掛金・有価証券・棚卸資産など。</div>
					</div>
					<div class="cp_actab">
						<input id="cp_tabfour060" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour060">固定資産とは？</label>
						<div class="cp_actab-content">長期にわたり会社が保有する資産。土地・建物・機械など。また、長期間保持する投資有価証券も含まれます。</div>
					</div>
					<div class="cp_actab">
						<input id="cp_tabfour061" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour061">負債とは？</label>
						<div class="cp_actab-content">負債とは、返さなければならない会社のお金を表すもので、他人資本とも呼ばれます。負債も資産と同じように、1年以内に返さなければいけない「流動負債」と1年を超えて返さなければいけない「固定負債」とに分けられています。貸借対照表の負債は、原則として返済、支払期日の早い順番に並んでいますので、上の段に「流動負債」、下の段に「固定負債」が表示されています</div>
					</div>
					<div class="cp_actab">
						<input id="cp_tabfour062" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour062">流動負債とは？</label>
						<div class="cp_actab-content">1年以内に返さなければいけない負債。支払手形・買掛金・未払金・短期借入金など。</div>
					</div>
					<div class="cp_actab">
						<input id="cp_tabfour063" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour063">固定負債とは？</label>
						<div class="cp_actab-content">1年を超えて返さなければいけない負債。長期借入金・社債など。</div>
					</div>
					<div class="cp_actab">
						<input id="cp_tabfour064" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour064">純資産とは？</label>
						<div class="cp_actab-content">純資産とは株主が会社に入れてくれた資金や利益の積み上げを表すもので、負債と違い返す必要のないお金で、自己資本とも言います。純資産がマイナスであれば債務超過の状態であり、倒産のリスクが高いと判断されます。</div>
					</div>
				</div>
			</div>
			<div id="cp_content3">
				<div class="cp_qain">
					<div class="cp_actab">
						<input id="cp_tabfour065" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour065">売上高総利益率とは？</label>
						<div class="cp_actab-content">粗利率や荒利率とも呼ばれる、売上高に対する売上総利益の比率を表す指標です。企業の大まかな利益率を把握するための、基本的な指標です。</div>
					</div>
					<div class="cp_actab">
						<input id="cp_tabfour066" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour066">流動比率とは？</label>
						<div class="cp_actab-content">流動負債に対する流動資産の割合を示すものです。流動負債はすぐに返済すべき負債で、流動資産はすぐに現金化できる資産であるため、流動比率が高ければ、会社の短期的な返済能力が高いということになります。</div>
					</div>
					<div class="cp_actab">
						<input id="cp_tabfour067" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour067">固定比率とは？</label>
						<div class="cp_actab-content">自己資産に対する固定資産の比率を表す指標です。建物や設備といった固定資産が自己資本の範囲に収まっているかを確認できるため、適切な設備投資を行っているかどうかを判断する指標になります。</div>
					</div>
					<div class="cp_actab">
						<input id="cp_tabfour068" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour068">純資産比率とは？</label>
						<div class="cp_actab-content">総資本に対する自己資本の比率を表す指標です。純資産比率が高ければそれだけ借入金が少なく、健全な経営を行っているといえます。</div>
					</div>
					<div class="cp_actab">
						<input id="cp_tabfour069" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour069">総資産回転率とは？</label>
						<div class="cp_actab-content">売上に対して資本がどれくらい回転しているか、つまり、資本を効率的に運営できているかを確認するものです。この回転率が高ければ、少ない資本で大きい売上を上げているということになります。</div>
					</div>
					<div class="cp_actab">
						<input id="cp_tabfour070" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour070">売上債権回転率とは？</label>
						<div class="cp_actab-content">売上債権がどのくらい滞留しているか、適正金額であるかを確認する指標です。この回転率が高ければ、売上債権を早く回収できるということになります。</div>
					</div>
					<div class="cp_actab">
						<input id="cp_tabfour071" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour071">買入債務回転率とは？</label>
						<div class="cp_actab-content">買入債務回転率は、買入債務がひとつの事業期間で何回転しているかを表す指標です。買入債務回転期間は、買入債務の支払いにいくらの売上が必要か、どれほどの日数がかかるのかを示す指標になります。</div>
					</div>
					<div class="cp_actab">
						<input id="cp_tabfour072" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour072">棚卸資産回転率とは？</label>
						<div class="cp_actab-content">売上に対し在庫量が適正か、商品が効率的に回転しているかを確認する指標です。商品回転期間は、商品が1回転するまでにかかる日数を示す指標です。この期間が短ければ、商品が効率的に回転しているということになります。</div>
					</div>
				</div>
			</div>
			<div id="cp_content4">
				<div class="cp_qain">
					<div class="cp_actab">
						<input id="cp_tabfour073" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour073">財務分析とは？</label>
						<div class="cp_actab-content">貸借対照表や損益計算書等の財務諸表の数字に基づいて、会社の収益性・安全性・生産性・成長性を分析し、業界内や競合他社と比較すること。経営者や取引先、投資家などが財務分析を用いて現状と問題点を把握することで、企業の全体像や問題点などを具体的に把握することができます。</div>
					</div>
					<div class="cp_actab">
						<input id="cp_tabfour074" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour074">収益性分析</label>
						<div class="cp_actab-content">企業がどれだけ利益を上げられているのかを見る分析手法が「収益性分析」です。利益の具体的な額ではなく、その比率を見ていくのが特徴です。</div>
					</div>
					<div class="cp_actab">
						<input id="cp_tabfour075" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour075">安全性分析</label>
						<div class="cp_actab-content">安全性分析は、その企業にどれだけ支払い能力があるのかを分析する手法です。この分析により、その会社の経営状態の安全性（財務的に安全なのかどうか）がわかります。</div>
					</div>
					<div class="cp_actab">
						<input id="cp_tabfour076" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour076">生産性分析</label>
						<div class="cp_actab-content">生産性分析は、従業員や設備など、企業が抱えている経営資源を効率良く活用しているかどうか、そして、それがどれだけ売上や付加価値の創出につながっているかを見る手法です。</div>
					</div>
					<div class="cp_actab">
						<input id="cp_tabfour077" type="checkbox" name="tabs">
						<div class="cp_plus">+</div>
						<label for="cp_tabfour077">成長性分析</label>
						<div class="cp_actab-content">成長性分析は、それまで企業がどのように成長してきたか、そして将来の成長の可能性はどうかを見る手法です。増収増益をしている会社の場合、成長しているといえるので、増収率や増益率を見ることが重要となります。</div>
					</div>
				</div>
			</div>
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