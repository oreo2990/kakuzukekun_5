<?php 
//NO1 セッションスタート
session_start();
// NO2 「serch.php」からPOSTデータ取得(ここで探す企業の選定)
    $sendid= $_POST["sendid"];

//NO3.DBへの接続(「function.php」参照)
    include("function.php");
    // セッションチェック
    sschk();
    $pdo = db_conn();

//NO4．DB内の検索
    //$stmt = $pdo->prepare("SELECT * FROM kakuzukeDB_an_table WHERE name LIKE '%お茶っ葉カンパニー%'");
    $stmt = $pdo->prepare("SELECT * FROM kakuzukeDB_an_table WHERE id = $sendid");
    $status = $stmt->execute();

//NO5．検索結果のjson化
    $view="";
    if($status==false) {
        //execute（SQL実行時にエラーがある場合）
        $error = $stmt->errorInfo();
        exit("SQLへのデータ取得失敗(result.phpのNO3の操作):".$error[2]);
    }else{
        //jsonとしてデータ取得
        while( $result[] = $stmt->fetch(PDO::FETCH_ASSOC));
        $json = json_encode($result);        
    }
?>

<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="./css/result.css?v=2">
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

    <div id="header2">
      <p id="rating"></p>
    </div>

    <div class="bunsekicomment">
      <p id="comment"></p>
    </div>

    <div id="canvasbox">
      <div id="canvas1">
        <canvas id="myLineChart"></canvas>
      </div>
      <div id="canvas2">
        <canvas id="myBarChart"></canvas>
      </div>
    </div>
  </div>
  <!-- content---------------------------- -->

  <!-- footer---------------------------- -->
  <footer class="footer">
    <div class="footer1">
      <a href="https://github.com/oreo2990" target="_blank" rel="noopener noreferrer"><i class="fa fa-github my-icon"
          aria-hidden="true"></i></a>
      <a href="https://www.instagram.com/oreo2990/" target="_blank" rel="noopener noreferrer"><i
          class="fa fa-instagram my-icon" aria-hidden="true"></i></a>
      <a href="https://twitter.com/home" target="_blank" rel="noopener noreferrer"><i class="fa fa-twitter my-icon"
          aria-hidden="true"></i></a>
      <a href="https://www.facebook.com/tosihiro.niwa/" target="_blank" rel="noopener noreferrer"><i
          class="fa fa-facebook my-icon" aria-hidden="true"></i></a>
    </div>
    <div class="footer2">
      <p>© 2020 oreo2990</p>
    </div>
  </footer>
  <!-- footer---------------------------- -->


  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
  <script>
    //NO1 PHPでDBから取得したjsonデータの配列化
    const data = JSON.parse('<?=$json?>');
    // console.log(data); 
    // console.log(data[0]);
    // console.log(data[0].name);
    // console.log(data[0].tani);
    // console.log(data[0].FY2017uriage);
    // console.log(data[0].FY2018uriage);
    // console.log(data[0].FY2019uriage);
    console.log(data[0].id);

    let tani = data[0].tani;

    //NO2 PL折れ線グラフ----------------------------------
    var ctx = document.getElementById("myLineChart");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['FY2017', 'FY2018', 'FY2019'],
        datasets: [
          {
            label: '売上高',
            data: [data[0].FY2017uriage, data[0].FY2018uriage, data[0].FY2019uriage],
            borderColor: "rgba(255,0,0,1)",
            backgroundColor: "rgba(0,0,0,0)" //これがないと線の下に影みたいなんができてしまう。
          },
          {
            label: '売上総利益',
            data: [data[0].FY2017urisou, data[0].FY2018urisou, data[0].FY2019urisou],
            borderColor: "rgba(0,0,255,1)",
            backgroundColor: "rgba(0,0,0,0)"
          },
          {
            label: '営業利益',
            data: [data[0].FY2017eiri, data[0].FY2018eiri, data[0].FY2019eiri],
            borderColor: "rgba(34,139,34,1)",
            backgroundColor: "rgba(0,0,0,0)"
          },
          {
            label: '経常利益',
            data: [data[0].FY2017keitune, data[0].FY2018keitune, data[0].FY2019keitune],
            borderColor: "rgba(255,140,0,1)",
            backgroundColor: "rgba(0,0,0,0)"
          },
          {
            label: '当期純利益',
            data: [data[0].FY2017zyunnri, data[0].FY2018zyunnri, data[0].FY2019zyunnri],
            borderColor: "rgba(178,34,34,1)",
            backgroundColor: "rgba(0,0,0,0)"
          }
        ],
      },
      options: {
        title: {
          display: true,
          text: '損益計算書(PL)概要'
        },
        scales: {
          yAxes: [{
            scaleLabel: {
              display: true,                 // 表示の有無
              labelString: tani,
              //fontFamily: "sans-serif",
              //fontColor: "blue",          
              //fontFamily: "sans-serif",
              //fontSize: 16                   // フォントサイズ
            },
            ticks: {
              suggestedMax: 1000,
              suggestedMin: 0,
              stepSize: 1000,
              // callback: function(value, index, values){
              //   return  value +  '百万円'
              // }
            }
          }]
        },
      }
    });

    //NO3 BS棒グラフ----------------------------------
    var ctx = document.getElementById("myBarChart");
    var myBarChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['FY2017', 'FY2018', 'FY2019'],
        datasets: [{
          label: "純資産比率",
          type: 'line',
          data: [data[0].FY2017zyunnsisan / data[0].FY2017sousisan * 100, data[0].FY2018zyunnsisan / data[0].FY2018sousisan * 100, data[0].FY2019zyunnsisan / data[0].FY2019sousisan * 100],
          borderColor: "rgba(0,0,51,1)",
          backgroundColor: "rgba(0,0,0,0)",
          pointBorderColor: "rgba(0,0,51,1)",
          pointRadius: 5,
          yAxisID: 'right-y-axis'
        },
        {
          label: '総資産',
          data: [data[0].FY2017sousisan, data[0].FY2018sousisan, data[0].FY2019sousisan],
          backgroundColor: "rgba(255,0,0,1)",
          yAxisID: 'left-y-axis'
        }, {
          label: '流動資産',
          data: [data[0].FY2017ryudousisan, data[0].FY2018ryudousisan, data[0].FY2019ryudousisan],
          backgroundColor: "rgba(0,0,255,1)",
          yAxisID: 'left-y-axis'
        }, {
          label: '固定資産',
          data: [data[0].FY2017koteihusai, data[0].FY2018koteihusai, data[0].FY2019koteihusai],
          backgroundColor: "rgba(34,139,34,1)",
          yAxisID: 'left-y-axis'
        }, {
          label: '流動負債',
          data: [data[0].FY2017ryudouhusai, data[0].FY2018ryudouhusai, data[0].FY2019ryudouhusai],
          backgroundColor: "rgba(255,140,0,1)",
          yAxisID: 'left-y-axis'
        }, {
          label: '固定負債',
          data: [data[0].FY2017koteihusai, data[0].FY2018koteihusai, data[0].FY2019koteihusai],
          backgroundColor: "rgba(178,34,34,1)",
          yAxisID: 'left-y-axis'
        }, {
          label: '純資産',
          data: [data[0].FY2017zyunnsisan, data[0].FY2018zyunnsisan, data[0].FY2019zyunnsisan],
          backgroundColor: "rgba(255,183,76,1)",
          yAxisID: 'left-y-axis'
        }
        ]
      },
      options: {
        title: {
          display: true,
          text: '貸借対照表(BS)概要'
        },
        scales: {
          yAxes: [{
            id: 'left-y-axis',
            position: 'left',
            scaleLabel: {
              display: true,
              labelString: tani
            },
            ticks: {
              suggestedMax: 1000,
              suggestedMin: 0,
              stepSize: 1000
            }
          }
            , {
            id: 'right-y-axis',
            position: 'right',
            scaleLabel: {
              display: true,
              labelString: '%'
            },
            ticks: {
              suggestedMax: 30,
              suggestedMin: 0,
              stepSize: 10.0
            },
            // グリッドラインを消す
            gridLines: {
              drawOnChartArea: false,
            },
          }
          ]
        },
      }
    });

    //NO4 格付計算----------------------------------
    //part1 純利益
    let zyunri3nen = (data[0].FY2017zyunnri + data[0].FY2018zyunnri + data[0].FY2019zyunnri) / 3;
    let zyunriscore = "";
    if (zyunri3nen >= 0) {
      zyunriscore = 2;
    } else {
      zyunriscore = 1;
    }

    //part2 流動比率
    let ryudouhiritu3nen = ((data[0].FY2017ryudousisan / data[0].FY2017ryudouhusai * 100)
      + (data[0].FY2018ryudousisan / data[0].FY2018ryudouhusai * 100)
      + (data[0].FY2019ryudousisan / data[0].FY2019ryudouhusai * 100)) / 3;
    //console.log(ryudouhiritu3nen);
    let ryudouhirituscore = "";
    if (ryudouhiritu3nen >= 150) {
      ryudouhirituscore = 3;
    } else if (100 <= ryudouhiritu3nen && ryudouhiritu3nen < 150) {
      ryudouhirituscore = 2;
    } else {
      ryudouhirituscore = 1;
    }
    //console.log(ryudouhirituscore);

    //part3 純資産比率
    let zyunsisanhiritu3nen = ((data[0].FY2017zyunnsisan / data[0].FY2017sousisan * 100)
      + (data[0].FY2018zyunnsisan / data[0].FY2018sousisan * 100)
      + (data[0].FY2019zyunnsisan / data[0].FY2019sousisan * 100)) / 3;
    //console.log(zyunsisanhiritu3nen);
    let zyunsisanhirituscore = "";
    if (zyunsisanhiritu3nen >= 30) {
      zyunsisanhirituscore = 3;
    } else if (5 <= zyunsisanhiritu3nen && zyunsisanhiritu3nen < 20) {
      zyunsisanhirituscore = 2;
    } else {
      zyunsisanhirituscore = 1;
    }
    //console.log(zyunsisanhirituscore);

    //part4 格付け決定
    let totalscore = zyunriscore + ryudouhirituscore + zyunsisanhirituscore;
    //console.log(totalscore);
    let rating = "";
    if (totalscore >= 7) {
      rating = "A";
    } else if (totalscore >= 5 && totalscore <= 6) {
      rating = "B";
    } else {
      rating = "C";
    }
    //console.log(rating);

    //part5 
    let name = data[0].name;
    //console.log(name);
    document.querySelector("#rating").innerHTML = `${name}の格付けは<span>「${rating}」</span>です`

    //NO5 担当評価コメント挿入----------------------------------
    let comment = data[0].comment;
    //console.log(name);
    document.querySelector("#comment").innerHTML = `担当評価コメント<br><span class="coment">${comment}</span>`


  </script>
</body>

</html>