                                            @php 
                                            $count=0;
                                            @endphp  
                                            @if(session('cart'))
                                            @foreach(session('cart') as $id => $CartItem)
                                            @php 
                                             $count += $CartItem['quantity'];
                                             @endphp 
                                            @endforeach
                                            @endif 
                                    <a href="#">
                                    <i class="icon_bag_alt"></i>
                                    <span id="cart_count">{{$count}}</span>
                                </a>
                                <div class="cart-hover delete" data-url="{{route('deleteCart')}}" >
                                    <div class="select-items" >
                                    <table>
                                        <tbody>
                                        @php 
                                        $total = 0;
                                        
                                        @endphp
                                        @if(Session::has('cart')!=null)
                                        @foreach(session('cart') as $id => $CartItem)
                                        @php 
                                        $total += $CartItem['price'] * $CartItem['quantity'];
                                        
                                        @endphp
                                            <tr>
                                                <td class="si-pic"><img src="site/img/products/{{$CartItem['images']}}" width="100px" alt=""></td>
                                                <td class="si-text">
                                                    <div class="product-selected">
                                                        <h6>{{$CartItem['name']}}</h6>
                                                        <p>{{number_format($CartItem['price'])}}?? x {{ $CartItem['quantity']}}</p>
                                                    </div>
                                                </td>
                                                <td class="si-close">
                                                    <i class="ti-close deleteCart" data-id='{{$id}}'></i>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    </div>
                                    <div class="select-total">
                                        <span>T???ng:</span>
                                        <h5>{{number_format($total)}}??</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="{{route('cartViews')}}" class="primary-btn view-card">Xem gi??? h??ng</a>
                                        <a href="#" class="primary-btn checkout-btn">Thanh to??n</a>
                                    </div>
                                </div>
                                <script>
    

//X??a cart
    function deleteCart(event){
        event.preventDefault();
        let urldeleteCart= $('.delete').data('url');
        let id =$(this).data('id');
        alertify.confirm('B???n c?? mu???n x??a kh??ng?', function(result){
            if(result){
                $.ajax({
                    type:"GET",
                    url: urldeleteCart,
                    data: {id: id},
                    success: function (data) {
                            $('.content').html(data.contentCart);
                            $('#ajax_cart').html(data.cartquick);   
                            console.log(data);
                    },
                    error: function () {
                        
                    }
                })
            }
        alertify.success('X??a S???n ph???m th??nh c??ng!') 
        }, function(){ alertify.error('H???y X??a s???n ph???m')});
    }



//c??c s??? ki???n
    $(function () {
        $(document).on('click','.deleteCart',deleteCart);
    });
   
</script>