@extends('layouts.site')

@section('main')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{route('products')}}">Cửa hàng</a>
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <div class="content">
        @include('Site.contentCart')


    </div>

    <!-- Shopping Cart Section End -->

  
<script>
    
//update cart
    function cartUpdate(event){
        event.preventDefault();
        let urlUpdateCart= $('.update_cart_url').data('url');
        let id =$(this).data('id');
        let quantity = $(this).parents('tr').find('input.quatity').val();
            $.ajax({
            type:"GET",
            url: urlUpdateCart,
            data: {id: id, quantity: quantity},
            success: function (data) {
                $('.content').html(data.contentCart); 
                $('#ajax_cart').html(data.cartquick);   
                alertify.success('Cập nhật thành công!')
                console.log(data);
            },
            error: function () {
                    
                }
                
            });
        }
//Xóa cart
    function deleteCart(event){
        event.preventDefault();
        let urldeleteCart= $('.delete').data('url');
        let id =$(this).data('id');
        alertify.confirm('Bạn có muốn xóa không?', function(result){
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
        alertify.success('Xóa Sản phẩm thành công!') 
        }, function(){ alertify.error('Hủy Xóa sản phẩm')});
    }

    function removeCart(event){
        event.preventDefault();
        // let id =$(this).data('id');
        alertify.confirm('Bạn có muốn xóa giỏ hàng không?', function(result){
            if(result){
                $.ajax({
                    type:"GET",
                    url: '/remove-cart',
                    success: function (data) {
                            $('.content').html(data.contentCart);
                            $('#ajax_cart').html(data.cartquick);   
                            console.log(data);
                    },
                    error: function () {
                        
                    }
                })
            }
        alertify.success('Xóa giỏ hàng thành công!') 
        }, function(){ alertify.error('Hủy Xóa giỏ hàng')});
    }

//các sự kiện
    $(function () {
        $(document).on('click','.cart_update',cartUpdate);
        $(document).on('click','.deleteCart',deleteCart);
        $(document).on('click','.removeCart',removeCart);

        
    });
   
</script>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            alert('sadsadsada');
        });
    </script>
@stop