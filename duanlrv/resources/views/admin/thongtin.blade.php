<?php
  $menune = config('menuadm');
?>
<style>
    .overflowne{
        overflow-y: auto;
        max-height:200px;
        min-width:15rem !important;
    }
    .overflowne::-webkit-scrollbar{
        width: 6px;
        background-color: #F5F5F5;
    }
    .overflowne::-webkit-scrollbar-thumb {
        background-color: #4D4D4D;
        border-radius:10px;
    }
</style>
<style>
    .dropbtn {
    background-color: #04AA6D;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    }

    .dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
    }

    #myInput {
    box-sizing: border-box;
    background-image: url('searchicon.png');
    background-position: 14px 12px;
    background-repeat: no-repeat;
    font-size: 16px;
    padding: 14px 20px 12px 45px;
    width: 100%;
    border: none;
    border-bottom: 1px solid #ddd;
    }

    #myInput:focus {outline: 3px solid #ddd;}

    .dropdown {
    position: relative;
    display: inline-block;
    }

    .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f6f6f6;
    min-width: 80%;
    height:300px;
    overflow: auto;
    border: 1px solid #ddd;
    z-index: 1;
    left:18%;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }
    .dropdown-content::-webkit-scrollbar{
        width: 6px;
        background-color: #F5F5F5;
    }
    .dropdown-content::-webkit-scrollbar-thumb {
        background-color: #4D4D4D;
        border-radius:10px;
    }
    .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    width: 100%;
    }
    .dropdown-content a:hover {
        transition:0.3s;
        color:red;
        background-color: #ddd
    }

    /* .dropdown a:hover {background-color: #ddd;} */

    .show {display: block;}
</style>
<div class="top-right">
                <div class="header-menu">
<div class="dropdown">
</div>

<div class="header-left">
<button onclick="myFunction()" class="search-trigger"><i class="fa fa-search"></i></button>
    <div id="myDropdown" class="dropdown-content">
        <input type="text" placeholder="Tìm kiếm danh sách menu" id="myInput" onkeyup="filterFunction()">
        @foreach($menune as $mn)
        <a href="{{route($mn['routes'])}}"><i class="menu-icon {{$mn['icon']}}"></i> {{$mn['label']}}</a>
        @endforeach
    </div>
    <div class="dropdown for-notification">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-bell"></i>
            <span class="count bg-danger">{{$thongtin->count()}}</span>
        </button>
        <div class="dropdown-menu" aria-labelledby="notification">
            <p class="red">Thông báo đặt lịch</p>
            @if($thongtin)
            @foreach($thongtin as $mn)
            <a class="dropdown-item media" href="#">
                @if($mn->id_status == 1)
                    <i class="fa fa-check" style="color:green"></i>
                @else
                    <i class="fa fa-warning" style="color:red"></i>
                @endif
                <p>{{$mn->nhucau->name_dichvu}}</p>
            </a>
            @endforeach
            @else
                <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    <span class="count bg-danger">0</span>
                </button>
            @endif
        </div>
    </div>

    <div class="dropdown for-message">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-envelope"></i>
            <span class="count bg-primary">{{$donhangcount->count()}}</span>
        </button>
        <div class="dropdown-menu overflowne" aria-labelledby="message">
            <p class="red" style="border-bottom:1px solid">bạn có {{$donhangcount->count()}} đơn hàng</p>
            @if($donhangcount)
                @foreach($donhangcount as $dh)
                <a class="dropdown-item media" href="{{url('/admin/chi-tiet-don-hang/'.$dh->order_id)}}">
                    <span class="photo media-left"><img src="{{asset('uploads')}}/{{$dh->dsuser->avatar}}" alt="{{$dh->dsuser->avatar}}"></span>
                    <div class="message media-body">
                        <span class="name float-left">{{$dh->order_name}}</span>
                        <span class="time float-right">Ngày đặt hàng: {{$dh->order_date}}</span>
                        <p>{{$dh->order_email}}</p>
                    </div>
                </a>
                @endforeach
            @endif
        </div>
    </div>
</div>
@if(Route::has('login'))
@auth
@if(Auth::user()->id_role == 1)
<div class="user-area dropdown float-right">
    <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="user-avatar rounded-circle" src="{{asset('uploads')}}/{{Auth::user()->avatar}}" height="40px" alt="User Avatar">
    </a>
    <div class="user-menu dropdown-menu">
        <a class="nav-link" href="{{route('thongtin')}}"><i class="fa fa- user"></i>Thông tin</a>

        <!-- <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a> -->

        <a class="nav-link" href="{{route('home')}}"><i class="fa fa -cog"></i>Về Trang user</a>

        <a class="nav-link" href="{{ route('logout')}}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        ><i class="fa fa-power -off"></i>Đăng xuất</a>
        <form action="{{ route('logout')}}" method="post" id="logout-form">
            @csrf
        </form>
    </div>
</div>
@endif
@endif
@endif

</div>
</div>

            <script>





function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
</script>