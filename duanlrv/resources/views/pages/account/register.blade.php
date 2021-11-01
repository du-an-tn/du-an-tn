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
        <form action="{{URL::to('/check-register')}}" class="form-login" method="POST" >
        @csrf
            <h1 class="form-heading">Form đăng kí</h1>
            <div class="form-group">

                <input type="text" name="name" class="form-input" placeholder="Tên của bạn là gì?">
            </div>
            <div class="form-group">
                
                <input type="text" name="email" class="form-input" placeholder="Nhập địa chỉ Email">
            </div>
            <div class="form-group">
                
                <input type="text" name="phone" class="form-input" placeholder="SDT">
            </div>
            <div class="form-group">
             
                <input type="password" name="password" class="form-input" placeholder="Nhập mật khẩu">
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            
            <div class="form-group">
             
                <input type="password" name="confirm_password" class="form-input" placeholder="Nhập lại mật khẩu">
                <div id="eye1">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            
            <input type="submit" name="dang-ki" value="Đăng Kí" class="form-submit">
            
            
            </p>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="{{asset('font-end/js/app.js')}}"></script>
</html>