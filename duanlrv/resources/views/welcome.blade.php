<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PETSHOP.VN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:wght@100;200;300;400;500;600;700&family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- carousel -->
    <link rel="stylesheet" href="{{asset('/font-end/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('/font-end/css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{asset('/font-end/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
</head>
<body class="">
	<header class="container-fluid">
    <div class="col-sm-12 repon-ipad">
      <a class="navbar-brand" href="#"><img src="{{asset('/font-end/images/logo/logow.png')}}" width="250px" height="70px"></a>
    </div>
		<nav class="navbar navbar-expand-lg navbar-lightd text-repon">
	  	<a class="navbar-brand" href="#"><img src="images/logo/logow.png" width="250px" height="70px"></a>
	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  		</button>
        <div class="collapse navbar-collapse khung-timkiem" id="navbarText">
                <ul class="navbar-nav mr-auto">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2 box-search" type="search" placeholder="Tìm kiếm trên petshop.vn" aria-label="Search">
                    <div class="testdrop">
                        <p onclick="hamDropdown()" class="my-2 my-sm-0 timkiem btn">thú cưng <i class="fas fa-angle-down"></i></p>
                        <div class="box-chon">
                                <a href="#">Thú cưng</a>
                                <a href="#">sản phẩm</a>
                        </div>
                    </div>
                    </form>
                </ul>
                <span class="navbar-text">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item khung-li">
                            <a class="nav-link mn-text mt-1" href="#">
                                <i class="far fa-newspaper" style="font-size:17px; color:#FFAE19"></i>
                            </a>
                            <a href="" class="a-tin">Tin tức</a>
                        </li>
                        <li class="nav-item khung-li">
                            <a class="nav-link mn-text mt-1" href="#">
                                <i class="far fa-clipboard" style="font-size:17px; color:#FFAE19; margin-left: 3px;"></i>
                            </a>
                            <a href="" class="a-tin">Đăng bài</a>
                            <ul class="hover-bd">
                                <li><a class="hv-a" href="">Đăng tin thú cưng</a></li>
                                <li><a class="hv-a" href="">Đăng tin sản phẩm</a></li>
                            </ul>
                        </li>
                        @if(auth()->guard('cus')->check())
                        <li class="nav-item khung-li">
                            <a class="nav-link hd-msg mn-text mt-1" href="#">
                                <img src="images/avatar/dog1.jpg" alt="" width="35px" height="35px">
                            </a>
                            <a href="" class="a-tin">Hi {{auth()->guard('cus')->user()->name}}</a>
                            <ul class="hover-user">
                                <li>
                                    <i class="far fa-address-card"></i>
                                    <a class="hv-a" href="{{URL::to('/show-profile')}}">Thông tin tài khoản</a>
                                
                                </li>
                                <li>
                                    <i class="far fa-clone"></i>
                                    <a class="hv-a" href="">Lịch sử giao dịch</a>
                                </li>
                                <li>
                                    <i class="fas fa-paw"></i>
                                    <a class="hv-a" href="">Tin đăng thú cưng</a>
                                </li>
                                <li>
                                    <i class="far fa-clipboard"></i>
                                    <a class="hv-a" href="">Tin đăng sản phẩm</a>
                                </li>
                                <li>
                                    <i class="fas fa-shopping-cart"></i>
                                    <a class="hv-a" href="">Giỏ hàng của bạn</a>
                                </li>
                                <li>
                                    <i class="fas fa-sign-out-alt"></i>
                                    <a class="hv-a" href="{{URL::to('logout')}}">Đăng xuất</a>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li class="nav-item khung-li">
                        <li class="nav-item" >
                            <a class="nav-link navdn active" href="{{URL::to('/login-customer')}}"><i class="far fa-user" style="font-size:17px"></i> Đăng nhập</a>
                        </li>    
                        @endif
                       
                        <!-- <li class="nav-item">
                            <a class="nav-link navdk active" href="#"><i class="fas fa-user-plus" style="font-size:17px"></i> Đăng ký</a>
                        </li> -->
                    </ul>
                </span>
            </div>
        </nav>
    <div class="col-lg-12">
        <ul class="nav menu-title">

            <li class="nav-item mm-chinh">
              <a class="nav-link" href="#">Chó<i class="fas fa-angle-down"></i></a>
              <ul class="hrv-menu">
                <li class="hrv-img">
                    <img src="{{asset('/font-end/images/hinh-menu/dog.8d179361.gif')}}" alt="" width="100%" height="200px">
                </li>
                <ul class="ul-hrcon">
                    @foreach($category as $key => $category)
                    <li><a href="{{URL::to('/danh-muc-san-pham/'.$category->slug)}}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </ul>
            </li>
            
            <li class="nav-item mm-chinh">
              <a class="nav-link" href="#">Mèo<i class="fas fa-angle-down"></i></a>
              <ul class="hrv-menu">
                  <li class="hrv-img">
                      <img src="{{asset('/font-end/images/hinh-menu/cat.862fddc4.gif')}}" alt="" width="100%" height="200px">
                  </li>
                  <ul class="ul-hrcon">
                    @foreach($category_meo as $key => $category_meo)
                    <li><a href="{{URL::to('/danh-muc-san-pham/'.$category_meo->slug)}}">{{$category_meo->name}}</a></li>
                    @endforeach
                  </ul>
              </ul>
            </li>
            <li class="nav-item mm-chinh">
              <a class="nav-link" href="#">Chim cảnh<i class="fas fa-angle-down"></i></a>
              <ul class="hrv-menu">
                <li class="hrv-img">
                    <img src="{{asset('/font-end/images/hinh-menu/bird.01a45ffa.gif')}}" alt="" width="100%" height="200px">
                </li>
                <ul class="ul-hrcon">
                    @foreach($category_chim as $key => $category_chim)
                    <li><a href="{{URL::to('/danh-muc-san-pham/'.$category_chim->slug)}}">{{$category_chim->name}}</a></li>
                    @endforeach
                </ul>
            </ul>
            </li>
            <li class="nav-item mm-chinh">
              <a class="nav-link" href="#">Cá cảnh<i class="fas fa-angle-down"></i></a>
              <ul class="hrv-menu">
                <li class="hrv-img">
                    <img src="{{asset('/font-end/images/hinh-menu/fish.6c4bafb9.gif')}}" alt="" width="100%" height="200px">
                </li>
                <ul class="ul-hrcon">
                    @foreach($category_ca as $key => $category_ca)
                    <li><a href="{{URL::to('/danh-muc-san-pham/'.$category_ca->slug)}}">{{$category_ca->name}}</a></li>
                    @endforeach
                </ul>
            </ul>
            </li>
            <li class="nav-item mm-chinh">
                <a class="nav-link" href="#">thú cưng khác<i class="fas fa-angle-down"></i></a>
                <ul class="hrv-menu">
                    <li class="hrv-img">
                        <img src="{{asset('/font-end/images/hinh-menu/rabbit.46db3c99.gif')}}" alt="" width="100%" height="200px">
                    </li>
                    <ul class="ul-hrcon">
                    @foreach($category_khac as $key => $category_khac)
                    <li><a href="{{URL::to('/danh-muc-san-pham/'.$category_khac->slug)}}">{{$category_khac->name}}</a></li>
                    @endforeach
                    </ul>
                </ul>
              </li>
          </ul>
    </div>
	</header>

    <!-- end header -->
    <!-- slide -->
    @yield('content')
    <!-- footer -->
    <footer class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-sm-4">
                <div class="ft-hinh">
                    <img src="{{asset('/font-end/images/logo/logow.png')}}" alt="" width="200px" height="80px">
                </div>
                <div class="vct">
                    <h3>Về chúng tôi</h3>
                    <ul>
                        <li><a href="">giới thiệu</a></li>
                        <li><a href="">Tuyển dụng</a></li>
                        <li><a href="">quy chế hoạt động</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4">
                <h3>Hỗ trợ khách hàng</h3>
                <ul>
                    <li><a href="">Liên hệ hỗ trợ</a></li>
                    <li><a href="">những câu hỏi thường gặp</a></li>
                    <li><a href="">Chính sách bảo mật</a></li>
                    <li><a href="">Cơ chế giải quyết khiếu nại</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-sm-4">
                <h3>fanpage</h3>
                
            </div>
        </div>
    </footer>
    <section class="container-fluid header-repon">
      <div class="row">
        <div class="box-rp">
          <center><a href="#"><i class="fas fa-paw icon-rp"></i></a></center>
        </div>
        <div class="box-rp">
          <center><a href="#"><i class="fas fa-user-shield icon-rp"></i></a></center>
        </div>
        <div class="box-rp">
          <center class="box-rp-item">
            <a href="#" class="a-dangtin">
            <i class="fas fa-file-alt icon-rp" style="margin-top: 30px;"></i>
            <br> Đăng bài</a>
          </center>
        </div>
        <div class="box-rp">
          <center><a href="#"><i class="fas fa-newspaper icon-rp"></i></a></center>
        </div>
        <div class="box-rp">
          <center><a href="#"><i class="fas fa-align-justify icon-rp"></i></a></center>
        </div>
      </div>
    </section>

</body>
</html>

<script src="{{asset('/font-end/js/dropdown.js')}}"></script>

<script src="{{asset('/font-end/js/jquery.min.js')}}"></script>
<script src="{{asset('/font-end/js/owl.carousel.js')}}"></script>
<!--  -->
<script>
var owl = $('.owl-carousel');
owl.owlCarousel({
    items:1,
    loop:true,
    margin:10,
    autoPlay: true,
    slideSpeed : 1000,
});
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>