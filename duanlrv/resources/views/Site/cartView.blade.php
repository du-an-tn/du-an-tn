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
                // $.get('contentCart',function (contentCart) {
                    $('.content').html(data.contentCart);
                    	
                    // $( ".content" ).load( "ajax/test.html" );
                    // window.location.render();
                // })
                    // $('.content').html(data.contentCart);
                    console.log(data);
                
            },
            error: function () {
                
            }
        })
    }
    $(function () {
        $(document).on('click','.cart_update',cartUpdate);
       
    });
</script>
@endsection