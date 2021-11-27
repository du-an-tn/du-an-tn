<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pet Shop</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('Site/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('Site/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('Site/css/themify-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('Site/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('Site/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('Site/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('Site/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('Site/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('Site/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
</head>
<style>

</style>
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <!-- <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        hello.colorlib@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +65 11.188.888
                    </div>
                </div>
                <div class="ht-right">
                    <a href="#" class="login-panel"><i class="fa fa-user"></i>Login</a>
                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="{{ asset('site/img/flag-1.jpg') }}" data-imagecss="flag yt"
                                data-title="English">English</option>
                            <option value='yu' data-image="{{ asset('site/img/flag-2.jpg') }}" data-imagecss="flag yu"
                                data-title="Bangladesh">German </option>
                        </select>
                    </div>
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="{{ asset('site/img/logo1.png') }}" width="100px" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <!-- <button type="button" class="category-btn">All Categories</button> -->
                            <div class="input-group">
                                <input type="text" placeholder="Tôi có thể giúp được gì cho bạn?">
                                <button type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                             </li>
                                            @php 
                                            $count=0;
                                            @endphp  
                                            @if(session('cart'))
                                            @foreach(session('cart') as $CartItem)
                                            @php 
                                             $count += $CartItem['quantity'];
                                             @endphp 
                                            @endforeach
                                            @endif 
                            <li class="cart-icon" id='ajax_cart'>
                           
                                @include('site.cartquick')
                               
                            <li class="cart-icon">
                                <a href="#">
                                    <i class="icon_bag_alt"></i>
                                    <span id="cart_count">{{$count}}</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items" id='ajax_cart'>
                                        <table>
                                            <tbody>
                                            @php 
                                            $total = 0;
                                            $count=0;
                                            @endphp
                                            @if(session('cart'))
                                            @foreach(session('cart') as $CartItem)
                                            @php 
                                            $total += $CartItem['price'] * $CartItem['quantity'];
                                            $count += $CartItem['quantity'];
                                            @endphp
                                                <tr>
                                                    <td class="si-pic"><img src="site/img/products/{{$CartItem['images']}}" width="100px" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <h6>{{$CartItem['name']}}</h6>
                                                            <p>{{number_format($CartItem['price'])}}đ x {{ $CartItem['quantity']}}</p>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                            
                                        </table>
                                        
                                    </div>
                                    <div class="select-total">
                                        <span>Tổng:</span>
                                        <h5>{{number_format($total)}}đ</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="{{route('cartViews')}}" class="primary-btn view-card">Xem giỏ hàng</a>
                                        <a href="#" class="primary-btn checkout-btn">Thanh toán</a>
                                    </div>
                                </div>
                            </li>
                            <li class=""><a href="{{URL::to('/login-customer')}}" class="login-panel abc"><i class="fa fa-user"></i>Đăng nhập</a></li>

                            <li class=""><a href="#" class="login-panel abc"><i class="fa fa-user"></i>Đăng nhập</a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <!-- <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>Tất cả danh mục</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="#">Women’s Clothing</a></li>
                            <li><a href="#">Men’s Clothing</a></li>
                            <li><a href="#">Underwear</a></li>
                            <li><a href="#">Kid's Clothing</a></li>
                            <li><a href="#">Brand Fashion</a></li>
                            <li><a href="#">Accessories/Shoes</a></li>
                            <li><a href="#">Luxury Brands</a></li>
                            <li><a href="#">Brand Outdoor Apparel</a></li>
                        </ul>
                    </div>
                </div> -->
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="active"><a href="{{route('home')}}">Trang chủ</a></li>
                        <li><a href="./shop.html">Giới thiệu</a></li>
                        <li><a href="{{route('products')}}">Cửa hàng</a>
                            <ul class="dropdown">
                            @foreach ($categoryNav as $key => $cate)
                                <li><a href="{{URL::to('/danh-muc-san-pham/'.$cate->id)}}">{{$cate->name_nav}}</a></li>
                                
                            @endforeach
                            </ul>
                        </li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                                <li><a href="./shopping-cart.html">Shopping Cart</a></li>
                                <li><a href="./check-out.html">Checkout</a></li>
                                <li><a href="./faq.html">Faq</a></li>
                                <li><a href="./register.html">Register</a></li>
                                <li><a href="./login.html">Login</a></li>
                            </ul>
                    </li>
                        <li><a href="./blog.html">Tin Tức</a></li>
                        <li><a href="./contact.html">Liên Hệ</a></li>
                        <!-- <li><a href="#">Cửa hàng</a></li>-->
                        <li><a href="./contact.html">Dịch vụ</a></li> 
                        
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- main -->
    @yield('main')
    <!-- end main -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="{{ asset('site/img/logo1.png') }}" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello.colorlib@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Serivius</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                            <li><a href="#">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Join Our Newsletter Now</h5>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Enter Your Mail">
                            <button type="button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('Site/js/jquery-3.3.1.min.js') }}"></script>
    <!-- <script src="{{ asset('Site/js/bootstrap.min.js.map') }}"></script>
    <script src="{{ asset('Site/js/bootstrap.min.css.map') }}"></script> -->
    <script src="{{ asset('Site/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Site/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('Site/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('Site/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('Site/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('Site/js/jquery.dd.min.js') }}"></script>
    <script src="{{ asset('Site/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('Site/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('Site/js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <!-- JavaScript -->
    <!-- <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script> -->
    <script src="{{ asset('Site/js/alert.min.js') }}"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>


</body>

</html>
<script>
    
//cart
function addToCart(event){

event.preventDefault();
let urlCart= $(this).data('url');
$.ajax(
  {
    type: "GET",
    url: urlCart,
    dataType: 'json',
    success: function(data){
        $('#ajax_cart').html(data.cartquick);
        console.log(data);
        alertify.success('Đã thêm vào giỏ hàng!') 
    },
    error: function(){

    }
      
  })
}
$(function(){
$('.add_to_cart').on('click', addToCart);
});


</script>

<script>
    $(document).ready(function(){
        $('.send-comment').click(function{
            var comment_name = 
        });
    });
</script>

@yield('js')
</body>

</html>

