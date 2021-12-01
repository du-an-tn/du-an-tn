@extends('layouts.admin')
@section('main')
    <div class="content">
        <div class="row">
            <div class="cart cart-header col-sm-12">
                <strong>cập nhật thông tin account Admin</strong>
            </div>
            <div class="col-md-8 card" style="padding:5px 10px">
                <form action="{{route('updateaccount')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group" style="display:none">
                        <label for="idne">Name id</label>
                        <input type="text" value="{{Auth::user()->id}}" data-id="{{Auth::user()->id}}" class="form-control" id="idne">
                    </div>
                    <div class="form-group">
                        <label for="namene">Name User</label>
                        <input type="text" value="{{Auth::user()->name}}" data-name="{{Auth::user()->name}}" class="form-control" id="namene">
                    </div>
                    <div class="form-group">
                        <label for="emailne">Email User</label>
                        <input type="email" value="{{Auth::user()->email}}" data-email="{{Auth::user()->email}}" class="form-control" id="emailne">
                    </div>
                    <div class="form-group">
                        <label for="phonene">Phone User</label>
                        <input type="text" value="{{Auth::user()->phone}}" data-phone="{{Auth::user()->phone}}" class="form-control" id="phonene">
                    </div>
                    <div class="form-group">
                        <label for="addressne">address User</label>
                        <textarea class="form-control" data-address="{{Auth::user()->address}}" id="addressne" rows="3">{!!Auth::user()->address!!}</textarea>
                    </div>
                    <button id="submitajax" class="btn btn-info">Lưu thông tin</button>
                </form>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title mb-3">Profile {{Auth::user()->name}}</strong>
                    </div>
                    <div class="card-body">
                        <div class="mx-auto d-block">
                            <img class="rounded-circle mx-auto d-block" src="{{asset('uploads')}}/{{Auth::user()->avatar}}" width="100px" height="100px" alt="Card image cap">
                            <h5 class="text-sm-center mt-2 mb-1">{{Auth::user()->name}}</h5>
                            <div class="location text-sm-center"><i class="fa fa-map-marker"></i> {{Auth::user()->address}}</div>
                            <div class="text-sm-center">Email: {{Auth::user()->email}}</div>    
                            <div class="text-sm-center">Phone: {{Auth::user()->phone}}</div>
                        </div>
                        <hr>
                        <div class="card-text">
                            <!-- <a href="#"><i class="fa fa-facebook pr-1"></i></a>
                            <a href="#"><i class="fa fa-twitter pr-1"></i></a>
                            <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
                            <a href="#"><i class="fa fa-pinterest pr-1"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop()
@section('js')    <script>
    jQuery(document).ready(function($) {
        // $('.edit_name').dblclick(function(){
        //    var test = $(this).attr('contenteditable');
        //    if (test == 'false') {
        //         $(this).attr('contenteditable','true');
        //     }
        //     else {
        //         $(this).attr('contenteditable','false');
        //     }
        // });
        $(document).on('click','#submitajax', function(){
            var id = $(this).data('id');
            var name = $(this).data('name');
            var email = $(this).data('email');
            var phone = $(this).data('phone');
            var address = $(this).data('address');
            var _token = $('input[name="_token"]').val();
            if(id == ''){
                alertify.warning('id không được rỗng !!!');
            }else if(name == ''){
                alertify.warning('name không được rỗng !!!');
            }else if(email == ''){
                alertify.warning('email không được rỗng !!!');
            }else if(phone == ''){
                alertify.warning('phone không được rỗng !!!');
            }else if(address == ''){
                alertify.warning('address không được rỗng !!!');
            }
            $.ajax({
                url:'{{url('/admin/updateaccount')}}', 
                method:'post',
                data:{
                    id: id,name: name,email: email,phone: phone,address: address,_token:_token,
                },
                success: function(data) 
                {
                    if(data == 'done')
                    {
                        $(".content").load();
                        alertify.success('cập nhật thành công !');
                    }
                    else
                    {
                        alertify.error('gặp lỗi rồi !');

                    }
                }
            });
        });
    });
    </script>
@stop
