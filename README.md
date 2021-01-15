# 企業分析ツール「格付けくん」（完成形）を作成しました（制作期間合計約7日）。→記載中（機械学習のところ、反省点を記載する！）

ページ構成は、①ログイン画面、②アカウント作成画面、③格付検索画面、④格付検索の結果画面、⑤分析結果画面、⑥PL、BSの数値入力/登録画面、⑦mySQL登録情報の修正/削除画面、⑧財務分析関連の語句説明画面、⑨業績予測画面の9ページとなっています。

プログラミングを学び始めて2ヶ月の成果物です。これまで学んできたHTML、CSS、JS、PHPに加えてPythonを用いて機械学習（教師あり学習の回帰）にチャレンジしました。


http://tealimpala23.sakura.ne.jp/kakuzukeDB_4_NIWA_24/login.php

Id = niwa,pass = niwaでデータが入った状態で確認できます。

###### ①ログイン画面
![](pic1.png "screenshot1")


###### ②アカウント作成画面
![](pic2.png "screenshot2")


###### ③格付検索画面
![](pic3.png "screenshot3")


###### ④格付検索の結果画面
![](pic4.png "screenshot4")


###### ⑤分析結果画面
![](pic5.png "screenshot5")


###### ⑥PL、BSの数値入力/登録画面
![](pic6.png "screenshot6")


###### ⑦mySQL登録情報の修正/削除画面
![](pic7.png "screenshot7")


###### ⑧財務分析関連の語句説明画面
![](pic8.png "screenshot8")


###### ⑨業績予測画面
![](pic9.png "screenshot9")



## 使用技術
PHP、mysql、chart.JS、Python、Keras、scikit learn、TensorFlow.js


## 工夫した点
- ログイン/ログアウト機能の実装

- アカウント作成画面で、登録済みのパスワードは入力不可となっています。

- 直近3期のPL、BS入力値を、mysqlに保存、保存したデータを、「企業名」で検索し、企業格付けを確認できます。

- 企業格付けでは、chart.jsを用いて、PL、BSを図式化しています。また、入力値に対して、直近3期の純利益平均、流動比率平均、純資産平均からスコアリングを行い、対象企業を「A」から「C」の3ランクに振り分けました（デプロイすることを目的にしていた為、所属業界の特性等は考慮していない、非常に簡易的な財務分析です）。

- mysqlに保存したデータは、修正及び削除が可能です。

- 財務分析の経験がない方の為に、語句説明画面で、財務三表や分析方法の説明をしています。

- 機械学習（教師あり学習の回帰分析）を実施しました。
　2019年度の上場企業2430社の従業員数、現金、総資産、売上のデータを準備。Google Colabortory、Keras、scitlearnを用いて、〜〜を作成。この時、
　
 活性化関数は、RMSprop（勾配の大きさに応じて 学習率を調整 するようにして、振動を抑制したよ）。損失関数は、mean_squared_error（平均二乗誤差、これが0に近ければ近いほど、良い）。


ソフトバンク株式会社 2021年度2Q(9月30日時点)
従業員数37821(3万7千人)
現金1747005000000(1兆7千億円)
総資産10490827000000(10兆5千億円)

売上予測　4,900,000百万円(4兆9千億円 )

予測値　　　　　84,106,463,700(841億円)
平均絶対誤差　　331,149,108,461(3311億円)　→テストデータでの実際の値と予測値の差の絶対値を平均したものです

- フッターには、私のSNSアカウントのリンクを載せています。

##　特に注力した点
新しい技術を早くキャッチアップし、実装することに重きをおいて作成しました。7日間の中で、機械学習を勉強。
