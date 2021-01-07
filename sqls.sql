-- ここに記載するのは、他のファイルと連携していない。ここに書いた文をphpmyadminの「sql」画面で入力すると、実行できる。


-- NO1 テーブルにデータの追加
    -- sysdate()はsqlの関数
    -- phpmyadminから直接入力用
    INSERT INTO kakuzukeDB_an_table(name,email,address,CorporateNumber,status,establishment,FY2017uriage,FY2017urisou,FY2017eiri,FY2017keitune,FY2017zyunnri,FY2017sousisan,FY2017ryudousisan,FY2017koteisisan,FY2017ryudouhusai,FY2017koteihusai,FY2017zyunnsisan,FY2018uriage,FY2018urisou,FY2018eiri,FY2018keitune,FY2018zyunnri,FY2018sousisan,FY2018ryudousisan,FY2018koteisisan,FY2018ryudouhusai,FY2018koteihusai,FY2018zyunnsisan,FY2019uriage,FY2019urisou,FY2019eiri,FY2019keitune,FY2019zyunnri,FY2019sousisan,FY2019ryudousisan,FY2019koteisisan,FY2019ryudouhusai,FY2019koteihusai,FY2019zyunnsisan,comment,indate,tani) VALUES('niwa2','tttttt','ttttt','11111111','上場','1919','100','100','100','100','100','100','100','100','100','100','100','100','100','100','100','100','100','100','100','100','100','100','100','100','100','100','100','100','100','100','100','100','100','まあまあいい',sysdate(),'百万円');
    
    -- ファイルから入力用(バインド変数使う)
    INSERT INTO kakuzukeDB_an_table(name,email,address,CorporateNumber,status,establishment,FY2017uriage,FY2017urisou,FY2017eiri,FY2017keitune,FY2017zyunnri,FY2017sousisan,FY2017ryudousisan,FY2017koteisisan,FY2017ryudouhusai,FY2017koteihusai,FY2017zyunnsisan,FY2018uriage,FY2018urisou,FY2018eiri,FY2018keitune,FY2018zyunnri,FY2018sousisan,FY2018ryudousisan,FY2018koteisisan,FY2018ryudouhusai,FY2018koteihusai,FY2018zyunnsisan,FY2019uriage,FY2019urisou,FY2019eiri,FY2019keitune,FY2019zyunnri,FY2019sousisan,FY2019ryudousisan,FY2019koteisisan,FY2019ryudouhusai,FY2019koteihusai,FY2019zyunnsisan,comment,indate,tani) VALUES(:name,:email,:address,:CorporateNumber,:status,:establishment,:FY2017uriage,:FY2017urisou,:FY2017eiri,:FY2017keitune,:FY2017zyunnri,:FY2017sousisan,:FY2017ryudousisan,:FY2017koteisisan,:FY2017ryudouhusai,:FY2017koteihusai,:FY2017zyunnsisan,:FY2018uriage,:FY2018urisou,:FY2018eiri,:FY2018keitune,:FY2018zyunnri,:FY2018sousisan,:FY2018ryudousisan,:FY2018koteisisan,:FY2018ryudouhusai,:FY2018koteihusai,:FY2018zyunnsisan,:FY2019uriage,:FY2019urisou,:FY2019eiri,:FY2019keitune,:FY2019zyunnri,:FY2019sousisan,:FY2019ryudousisan,:FY2019koteisisan,:FY2019ryudouhusai,:FY2019koteihusai,:FY2019zyunnsisan,:comment,sysdate(),:tani);



-- NO2 テーブルからデータを取得
    -- 基本的には、「SELECT 表示するカラム FROM テーブル名;」
    -- テーブルの全データを取得するとき
    SELECT * FROM kakuzukeDB_an_table;

    -- カラム単体指定(この場合はname)
    SELECT name FROM kakuzukeDB_an_table;

    -- カラム複数指定(この場合はnameとemail)
    SELECT name,email FROM kakuzukeDB_an_table;

    -- 条件付きのデータ抽出。WHERE以下が特定の条件。ここで、条件の複数指定、曖昧検索、データのソート、表示件数の制限とかができる。
    --名前指定。
    SELECT * FROM kakuzukeDB_an_table WHERE name = 'ベローチェ';
    --id指定。
    SELECT * FROM kakuzukeDB_an_table WHERE id = 5;
    SELECT * FROM kakuzukeDB_an_table WHERE id >= 5 AND id<=8;
    --曖昧検索。
    SELECT * FROM kakuzukeDB_an_table WHERE name LIKE '%食品%';
    --ソート。DESCで降順になる
    SELECT * FROM kakuzukeDB_an_table ORDER BY indate DESC;
    --ソート。DESCで昇順になる
    SELECT * FROM kakuzukeDB_an_table ORDER BY indate ASC;
    --ソート＆表示件数制限。
    SELECT * FROM kakuzukeDB_an_table ORDER BY indate DESC LIMIT 4;


-- その他 メモ
    name
    address
    FY2017uriage
    FY2017urisou
    FY2017eiri
    FY2017keitune
    FY2017zyunnri
    FY2017sousisan
    FY2017ryudousisan
    FY2017koteisisan
    FY2017ryudouhusai
    FY2017koteihusai
    FY2017zyunnsisan
    FY2018uriage
    FY2018urisou
    FY2018eiri
    FY2018keitune
    FY2018zyunnri
    FY2018sousisan
    FY2018ryudousisan
    FY2018koteisisan
    FY2018ryudouhusai
    FY2018koteihusai
    FY2018zyunnsisan
    FY2019uriage
    FY2019urisou
    FY2019eiri
    FY2019keitune
    FY2019zyunnri
    FY2019sousisan
    FY2019ryudousisan
    FY2019koteisisan
    FY2019ryudouhusai
    FY2019koteihusai
    FY2019zyunnsisan
    comment
    indate
    tani

$res["name"].",".$res["email"].",".$res["address"].",".$res["CorporateNumber"].",".$res["status"].",".$res["establishment"].",".$res["FY2017uriage"].",".$res["FY2017urisou"].",".$res["FY2017eiri"].",".$res["FY2017keitune"].",".$res["FY2017zyunnri"].",".$res["FY2017sousisan"].",".$res["FY2017ryudousisan"].",".$res["FY2017koteisisan"].",".$res["FY2017ryudouhusai"].",".$res["FY2017koteihusai"].",".$res["FY2017zyunnsisan"].",".$res["FY2018uriage"].",".$res["FY2018urisou"].",".$res["FY2018eiri"].",".$res["FY2018keitune"].",".$res["FY2018zyunnri"].",".$res["FY2018sousisan"].",".$res["FY2018ryudousisan"].",".$res["FY2018koteisisan"].",".$res["FY2018ryudouhusai"].",".$res["FY2018koteihusai"].",".$res["FY2018zyunnsisan"].",".$res["FY2019uriage"].",".$res["FY2019urisou"].",".$res["FY2019eiri"].",".$res["FY2019keitune"].",".$res["FY2019zyunnri"].",".$res["FY2019sousisan"].",".$res["FY2019ryudousisan"].",".$res["FY2019koteisisan"].",".$res["FY2019ryudouhusai"].",".$res["FY2019koteihusai"].",".$res["FY2019zyunnsisan"].",".$res["comment"].",".$res["indate"].",".$res["tani"]
   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    