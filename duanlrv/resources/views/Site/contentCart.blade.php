
<section class="shopping-cart spad delete" data-url="{{route('deleteCart')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table class="update_cart_url" data-url="{{route('updateCart')}}" >
                            <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th class="p-name">Sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    @php 
                                    $count=0;
                                    @endphp  
                                    @if(session('cart')==true)
                                    @foreach(session('cart') as $CartItem)
                                    @php 
                                    $count += $CartItem['quantity'];
                                    @endphp 
                                    @endforeach
                                    @endif 
                                    <th><a href="#" class="removeCart">Xóa Giỏ Hàng</a> ({{$count}})</th>
                                </tr>
                            </thead>
                            <!-- cart -->
                            @php 
                            $total = 0;
                            @endphp
                            @if(Session::has('cart')!=null)
                            @foreach($carts as $id => $CartItem)
                            @php 
                            $total += $CartItem['price'] * $CartItem['quantity'];
                            @endphp
                            <tbody>
                                <tr>
                                    <td class="cart-pic first-row"><img src="Site/img/products/{{$CartItem['images']}}" width="150px"alt=""></td>
                                    <td class="cart-title first-row">
                                        <h5>{{$CartItem['name']}}</h5>
                                    </td>
                                    <td class="p-price first-row">{{number_format($CartItem['price'])}}đ</td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="number" value="{{$CartItem['quantity']}}" min="1" class="quatity">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">{{number_format($CartItem['quantity'] * $CartItem['price']) }}đ</td>
                                    <td class="close-td first-row"><a href="#" class="cart_update" data-id='{{ $id }}' onclick="">cập nhật</a></td>
                                    <td class="close-td first-row"><i data-id='{{ $id }}' class="ti-close deleteCart"></i></td>
                                </tr>
                            </tbody>
                                @endforeach
                                
                                @endif
                              <!-- end cart -->
                                
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="{{route('products')}}" class="primary-btn continue-shop">Mua tiếp</a>
                                <a href="#" class="primary-btn up-cart">Cập nhật giỏ hàng</a>
                            </div>
                            <div class="discount-coupon">
                                <h6>Mã giảm giá</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Nhập mã giảm giá">
                                    <button type="submit" class="site-btn coupon-btn">Giảm ngay</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Tổng  <span> {{ number_format($total) }}</span></li>
                                    <li class="cart-total">Thanh toán <span>{{ number_format($total) }}</span></li>
                                </ul>
                                <a href="{{route('checkout')}}" class="proceed-btn">Thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
