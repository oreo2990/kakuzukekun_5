$('.fas').on('click',function(){
    $(this).toggleClass('fa-eye-slash');
    $(this).toggleClass('fa-eye');
  });
  
  $(document).on('click','.fa-eye',function(){
    $('#user_pw').attr('type','text');
  });
  
  $(document).on('click','.fa-eye-slash',function(){
    $('#user_pw').attr('type','password');
  });