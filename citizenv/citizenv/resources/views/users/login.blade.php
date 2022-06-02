<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống điều tra dân số - Đăng nhập</title>
    <link rel="stylesheet" href='{{asset('template/css/stylelogin.css')}}'>
</head>
<body>
    <div id="danso">
        <div class="login">
            <div class="login-left">
            <img class="img-login" src="{{asset('template/images/imglogodanso.png')}}" alt="">
            </div>
            <div class="login-right">
              <form action="/login" method="POST" class="form" id="form-2">
                <h3 class="heading">HỆ THỐNG ĐIỀU TRA DÂN SỐ</h3>
                <div class="spacer"></div>
        
                <div class="form-group">
                  <label for="username" class="form-label">Tài khoản</label>
                  <input id="username" name="username" type="text" placeholder="Username" class="form-control">
                  <span class="form-message"></span>
                </div>
        
                <div class="form-group">
                  <label for="password" class="form-label">Mật khẩu</label>
                  <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
                  <span class="form-message"></span>
                </div>
        
                <!-- <button type="submit" class="form-submit">Đăng nhập</button> -->
                <input type="submit" class="form-submit" value="Đăng nhập">
                @include('alert')
                @csrf
              </form>
            </div>

            
      
          </div>
    </div>
    
      <!-- <script src="{{asset('template/js/validator.js')}}"></script>
      <script> -->
  
        // document.addEventListener('DOMContentLoaded', function () {
          
        //   Validator({
        //     form: '#form-2',
        //     formGroupSelector: '.form-group',
        //     errorSelector: '.form-message',
        //     rules: [
        //     //   Validator.isNumberic('#id'),
        //       Validator.minLength('#password', 1),
        //     ],
        //     onSubmit: function (data) {
        //       // Call API
        //       console.log(data);
              
        //     }
        //   });
        // });
  
      <!-- </script> -->
</body>
</html>