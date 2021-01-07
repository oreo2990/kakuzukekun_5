<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link href="./css/account.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
    integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
<style>div{padding: 10px;font-size:16px;}</style>
<title>アカウント作成</title>
</head>
<body>


<div class="contents-area">

  <div id="login-page">
  <div class="tittle-logo">格付けくん</div>
    <div class="login-container">
      <div class="login-form">
        <div class="login-title">
          <h1>格付けくんアカウントを新規作成</h1>
        </div>
        <form name="form1" action="insert2.php" method="post"> 
            <div class="field1">
              <input autocomplete="off" id="user_id" placeholder="ID" name="lid" type="" required>
            </div>
            <hr>
            <p id="pwsearch">※このパスワードは既に使用されています!!</p>
            <div class="field2">
              <input autocomplete="off" id="user_pw1" placeholder="パスワード" name="lpw1" type="password" required>
              <i id="icon1" class="fas fa-eye-slash"></i>
            </div>
            <div class="field3">
              <input autocomplete="off" id="user_pw2" placeholder="もう一度入力してください" name="lpw2" type="password" required >
              <i id="icon2" class="fas fa-eye-slash"></i>
            </div>
            <p id="error_msg"></p>
            <hr>
            <div class="actions">
              <input type="submit" name="commit" value="格付けくんを始める" class="btn btn-primary login-page-button login-button transition" data-disable-with="ログインしています..." onclick="return confirmPassword();" >
            </div>
        </form>
        
      </div>
    </div>

  </div>
</div>


<script src="./js/jquery-2.1.3min.js"></script>
<script src="./js/account.js"></script>
</body>
</html>


