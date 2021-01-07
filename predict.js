//モデルのロードのための関数
window.onload = function() {
    load_model();
  }  
  //作成したモデルからモデルを読みこむ(await非同期処理？がミソ)
  async function load_model() {   
    model = await tf.loadModel('./model/model.json');
    }
  //計算実行時の処理
  function Cal1() {
  //計算結果テキストの初期化
    document.frm1.fs5.value = "";
  //テキストから各種パラメータの読み込み(従業員数,現預金,総資産,それぞれ標準化)
    rx = (+frm1.r_x.value-3116.38518518519)/9473.14678640724;
    ry = (+frm1.r_y.value-24388624236.214)/160876150305.331;
    rr = (+frm1.r_r.value-166151064134.156)/681397127754.13;
  //読み込んだパラメータをモデルに読み込ませるためテンソルに入力
    const b = tf.tensor([[rx,ry,rr]]);
  //モデルと使った予測
    var prediction = model.predict(b).dataSync();
  //結果の出力(小数点以下第1位まで出力)
    // rz = Math.round(prediction*10)/10;

    rz = prediction*482216947056.823+154696653359.259;
    frm1.fs5.value = rz;
  }