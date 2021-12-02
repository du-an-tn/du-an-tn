@extends('layouts.site')
@section('main')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
        <form action="{{URL::to('/save_checkout')}}" method="POST" class="checkout-form" formenctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="#" class="content-btn">Click Here To Login</a>
                        </div>

                        <h4>Chi tiết thanh toán</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="fir">họ và Tên<span>*</span></label>
                                <input type="text" id="fir" name="order_name">
                            </div>
                           
                         
                    <div class="col-sm-12" >
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                    <label for="fir">Tỉnh - Thành phố<span>*</span></label>
                                        <select class="form-control choose input-sm city" name="id_thanhpho" id="city">
                                            <option value="">-----{{__('Tỉnh - Thành phố')}}-----</option>
                                            @foreach($thanhpho as $t)
                                            <option class="op-text" name="id_thanhpho" value="{{$t->matp}}">{{$t->name_thanhpho}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="">Quận - Huyện</label>
                                        <select class="form-control input-sm choose province" name="id_quanhuyen" id="province">
                                            <option class="op-text" >-----{{__('Chọn quận huyện')}}-----</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="">Xã - phường</label>
                                        <select class="form-control input-sm wards" name="id_xaphuong" id="wards">
                                            <option class="op-text">-----{{__('Chọn xã phường')}}-----</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="">Địa chỉ</label>
                                        <input type="text" class="form-control" name="order_address"  placeholder="địa chỉ cụ thể (địa chỉ nhà)" >
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <label for="email">Email <span>*</span></label>
                                <input type="text" id="email" name="order_email">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Số điện thoại<span>*</span></label>
                                <input type="text" id="phone" name="order_phone">
                            </div>
                            <div class="col-lg-12">
                                <label for="ghichu">Ghi chú<span>*</span></label>
                                <textarea name="order_note" id="ghichu" cols="95" rows="10"></textarea>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <input type="text" placeholder="Enter Your Coupon Code">
                        </div>
                        <div class="place-order">

                            <h4>Đon hàng</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Sản phẩm <span></span></li>
                                    @php 
                            $total = 0;
                            @endphp
                            @if(Session::has('cart')!=null)
                            @foreach($carts as $id => $CartItem)
                            @php 
                            $total += $CartItem['price'] * $CartItem['quantity'];
                            @endphp
                            <li class="fw-normal">{{$CartItem['name']}} x {{$CartItem['quantity']}} <span>{{number_format($CartItem['quantity'] * $CartItem['price']) }}đ</span></li>

                                @endforeach
                                
                                @endif
                              <!-- end cart -->
                              <li> <span class="mt-3">Tổng:   {{ number_format($total) }} </span></li>
                            </ul>
                            <input type="hidden" name="tong_tien" value="{{ number_format($total) }}" readonly>
                            
                                <!-- <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            chuyển khoản
                                            
                                            <span class="checkmark"></span>
                                        </label>
                                        <input type="radio" checked> 
                                        

                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Paypal
                                            <input type="checkbox" id="pc-paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                </div> -->
                                <div class="form-check">
                                    <!-- <input class="form-check-input radio" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                      Chuyển khoản
                                    </label> -->
                                    <h4  for="flexRadioDefault2">
                                        Phương thức thanh toán
                                    </h4>
                                  </div>
                                  <div class="form-check" style="margin-left: 30px;">
                                    <input class="form-check-input radio" type="radio" name="phuongthuc_thanhtoan" id="flexRadioDefault2" value="1" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                      Thanh toán khi nhận hàng
                                    </label>
                                  </div>
                                  <div class="form-check" style="margin-left: 30px;">
                                    <input class="form-check-input radio" type="radio" name="phuongthuc_thanhtoan" id="flexRadioDefault1" value="2">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Thanh toán online
                                    </label>
                                    <h4  for="flexRadioDefault2">
                                        Phương thức giao hàng
                                    </h4>
                                  </div>
                                  <div class="form-check" style="margin-left: 30px;">
                                    <input class="form-check-input radio" type="radio" name="phuongthuc_giaohang" id="ptgh" value="1" checked>
                                    <label class="form-check-label" for="flexRadioDefault">
                                      viettel
                                    </label>
                                   
                                  </div>
                                  <div class="form-check" style="margin-left: 30px;">
                                    <input class="form-check-input radio" type="radio" name="phuongthuc_giaohang" id="ptgh" value="1" checked>
                                    <label class="form-check-label" for="flexRadioDefault">
                                      viettel
                                    </label>
                                   
                                  </div>
                                  <div class="form-check" style="margin-left: 30px;">
                                    <input class="form-check-input radio" type="radio" name="phuongthuc_giaohang" id="ptgh" value="1" checked >
                                    <label class="form-check-label" for="flexRadioDefault">
                                      viettel
                                    </label>
                                   
                                  </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Thanh toán</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
  
    <script type="">
    jQuery(document).ready(function($) {

    $('.choose').on('change', function() {
        var action = $(this).attr('id');
        var ma_id = $(this).val();
        var _token = $('input[name="_token"]').val();

        var result = '';

        if (action == 'city') {
            result = 'province';
        }
        else {
            result = 'wards';
        }
        $.ajax({
            url: '{{url('/select-thanhpho')}}',
            method: 'post',
            data: {action: action, ma_id: ma_id, _token: _token},
            success: function(data) {
                $('#' + result).html(data);
            }
        });
    });
});
</script>
@endsection