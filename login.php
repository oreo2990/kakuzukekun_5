<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link href="./css/login.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
    integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <style>
    div {
      padding: 10px;
      font-size: 16px;
    }
  </style>
  <title>ログイン</title>
</head>

<body>


  <div class="contents-area">

    <div id="login-page">
      <div class="tittle-logo">格付けくん</div>
      <div class="login-container">

        <div class="login-form">

          <div class="login-title">
            <h1>格付けくんアカウントでログイン</h1>
          </div>

          <form name="form1" action="login_act.php" method="post">
            <div class="field">
              <input autocomplete="off" id="user_id" placeholder="ID" name="lid" type="" required>
            </div>
            <hr>
            <div class="field">
              <input autocomplete="off" id="user_pw" placeholder="パスワード" name="lpw" type="password" required>
              <i class="fas fa-eye-slash"></i>
            </div>
            <hr>
            <div class="actions">
              <input type="submit" name="commit" value="ログイン"
                class="btn btn-primary login-page-button login-button transition" data-disable-with="ログインしています...">
            </div>
            <div class="devise-shared-links">
              <a href="/sign_in/navigations">ログインできない方はこちら</a>
            </div>
          </form>

        </div>

      </div>
      <div class="sign-up-link">
        <a href="account.php">まだアカウントをお持ちでない方はこちら</a>
      </div>
    </div>
  </div>

  <script src="./js/jquery-2.1.3min.js"></script>
  <script src="./js/login.js"></script>

</body>
</html>