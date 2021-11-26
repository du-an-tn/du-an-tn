<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('font-end/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('font-end/css/app.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="" id="wrapper">
        <form action="{{URL::to('/check-login')}}" method="POST" class="form-login">
        @csrf
            <h1 class="form-heading">Form đăng nhập</h1>
            <div class="form-group">
                <i class="far fa-user"></i>
                <input type="text" class="form-input" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <i class="far fa-key"></i>
                <input type="password" class="form-input" name="password" placeholder="Mật khẩu">
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <span>
               
                        <label for="">
                            <input type="checkbox" value="1" name="remember">
                            Ghi nho dang nhap
                        </label>
            </span>

            <input type="submit" name="dang-nhap" value="Đăng nhập" class="form-submit">
            <a   href="{{URL::to('/')}}"><-Trang chu</a>
            <div class="register">
            
                <p class="form-footer">Bạn chưa có tài khoản</h1>
                <a  class="btn btn-warning " href="{{URL::to('/register')}}">Đăng kí ngay!</a>
            </div>
                
            </p>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="{{asset('font-end/js/app.js')}}"></script>
</html>