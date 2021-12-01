@extends('layouts.admin')
@section('css')
 <style>
     .form-trum{
        background-image: linear-gradient( 135deg, #CE9FFC 10%, #7367F0 100%);
         padding:10px 0px;
         border-radius:10px;
         box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
     }
 </style>
@endsection
@section('main')
    <div class="content">
        <div class="card cart-bg">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                    <strong class="card-title mt-3">quản lý đơn hàng</strong>
                    </div>
                    <div class="col-sm-6">
                        <form class="form-inline justify-content-end" action="" method="GET" role="form">
                        <div class="input-group input-group-sm">
                            <input class="form-control" type="search" placeholder="tìm kiếm..." aria-label="Search" name="key">
                            <div class="input-group-append">
                            <button class="btn btn-success" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <x-alert></x-alert>
            <div class="table-stats order-table ov-h">
                <table class="table ">
                    <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th class="avatar">mã đơn hàng</th>
                            <th>Thời gian đặt hàng</th>
                            <th>Trạng thái</th>
                            <th>xem chi tiết</th>
                            <th>Action</th>
                            <!-- <th>Quantity</th> -->
                            <!-- <th>Status</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $dt)
                            <tr>
                                <td>{{$dt->order_id}}</td>
                                <td>
                                    <span>{{$dt->order_code}}</span>
                                </td>
                                <td>
                                    <span>{{$dt->created_at}}</span>
                                </td>
                                <td>
                                    <select class="trangthai badge" style="background-color:#50C7C7">
                                        @foreach($xetduyet as $xd)
                                            <option name="id_status" {{($xd->id == $dt->id_status) ? 'selected':'' }} id="item" data-order_id="{{$dt->order_id}}" value="{{$xd->id}}">{{$xd->name_type}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <a href="{{url('/admin/chi-tiet-don-hang/'.$dt->order_id)}}" class="badge badge-pending">chi tiết <i class="fa fa-mail-reply"></i></a>
                                </td>
                                <td>
                                    <a href="{{route('donhang.destroy',$dt->order_id)}}" class="btn btn-sm btn-danger btndelete"><i class="fa fa-trash"></i> Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <form method="POST" action="" id="form-delete">
                @method('DELETE')
                @csrf
                </form>
            </div> <!-- /.table-stats -->
            <div class="">{{$data->appends(request()->all())->links()}}</div>
        </div>
    </div>
@stop()


@section('js')
<script src="{{asset('adm/assets/js/danhsach.js')}}"></script>


<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

    <script>
        jQuery(document).ready(function($) {
            $('.btndelete').click(function(ev) {
                ev.preventDefault();
                var _href = $(this).attr('href');
                $('form#form-delete').attr('action',_href);
                if(confirm('bạn muốn xóa chứ ?')){
                    $('form#form-delete').submit();
                }
            });
        });
    </script>
    <script>
    jQuery(document).ready(function($) {
        $(document).on('change', '.trangthai', function(){
            var id_status = $(this).val();
            var order_id =$('#item').data('order_id');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:'{{url('/admin/update-trangthai')}}', 
                method:'post',
                data:{order_id:order_id, id_status:id_status, _token: _token},
                success: function(data) 
                {
                    if(data == 'done')
                    {
                        alertify.success('bạn đã thay đổi trạng thái');
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
@stop()