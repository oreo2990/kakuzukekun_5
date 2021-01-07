// パスワードアイコン----------------
$('.fas').on('click',function(){
    $(this).toggleClass('fa-eye-slash');
    $(this).toggleClass('fa-eye');
  });
  
  let i = 0;
  $("#icon1").on('click',function(){
    i += 1;
    if(i%2 != 0 ){
      $('#user_pw1').attr('type','text');
    }else{
      $('#user_pw1').attr('type','password');
    }
  });

  let w = 0;
  $("#icon2").on('click',function(){
    w += 1;
    if(w%2 != 0 ){
      $('#user_pw2').attr('type','text');
    }else{
      $('#user_pw2').attr('type','password');
    }
  });

// パスワードアイコン-------------------
function confirmPassword() {
  const password = document.getElementById("lpw1").value;
  const confirmPassword = document.getElementById("lpw2").value;
  const errorMsg = document.getElementById("error_msg");
  if(newPassword === confirmPassword){
    errorMsg.innerText = "";
    errorMsg.classList.remove('error_msg');
    return true;
  }else{
    errorMsg.innerText = "パスワードが一致しません";
    errorMsg.classList.add('error_msg');
    return false;
  }
  }
// パスワードの2重確認の処理----------------
  