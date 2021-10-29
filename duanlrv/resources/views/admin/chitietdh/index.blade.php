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
                            <th>Thời gian giao hàng</th>
                            <th>Trạng thái</th>
                            <th>xem chi tiết</th>
                            <th>Action</th>
                            <!-- <th>Quantity</th> -->
                            <!-- <th>Status</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($chitiet as $dt)
                            <tr>
                                <td>{{$dt->id}}</td>
                                <td>
                                    <span>{{$dt->order_code}}</span>
                                </td>
                                <td>
                                    <span>{{$dt->time_order}}</span>
                                </td>
                                <td>
                                    <span>{{$dt->delivery_time}}</span>
                                </td>
                                <td>
                                    @if($dt->status == 1)
                                        <span class="badge badge-complete">thành công</span>
                                    @elseif ($dt->status == 2)
                                        <span class="badge badge-warning">chưa xét duyệt</span>
                                    @else
                                        <span class="badge badge-danger">đã hủy</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge badge-pending" data-toggle="modal" data-target=".bd-example-modal-lg{{$dt->id}}">chi tiết <i class="fa fa-mail-reply"></i></span>
                                </td>
                                <td>
                                    <a href="{{route('donhang.edit',$dt->id)}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('donhang.destroy',$dt->id)}}" class="btn btn-sm btn-danger btndelete"><i class="fa fa-trash"></i></a>
                                </td>
                                <div class="modal fade bd-example-modal-lg{{$dt->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content model-ct">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">chi tiết : {{$dt->id}} - {{$dt->order_code}}</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group form-gr-img">
                                                        <img src="{{asset('uploads/'.$dt->image)}}" alt="" width="100%" height="200px">
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="">ghi chú của khách hàng</label>
                                                    <textarea class="description_t" name="" cols="43" rows="9" disabled>{{$dt->shiping_note}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group form-trum">
                                                        <div class="col-12">
                                                            <p><span class="text-info">Tên sản phẩm<span> {{$dt->title}}</p>
                                                            <p><span class="text-info">số lượng</span> {{$dt->quantity}}</p>
                                                        </div>
                                                        <div class="col-12">
                                                            <p><span class="text-info">Giá :</span> {{number_format($dt->price, 0, '.', '.')}} VNĐ</p>
                                                            <p><span class="text-info">giá giảm :</span>{{number_format($dt->discount, 0, '.', '.')}} VNĐ</p>
                                                            <p><span class="text-info">Thành Tiền :</span> {{$dt->total_money}}</p>
                                                        </div>
                                                        <hr>
                                                        <div class="col-12">
                                                            <p><span class="text-info">Tên người nhận</span> {{$dt->shiping_name}}</p>
                                                            <p><span class="text-info">Địa chỉ</span> {{$dt->shiping_address}}</p>
                                                            <p><span class="text-info">Số điện thoại:</span> {{$dt->shiping_phone}}</p>
                                                            <p><span class="text-info">Email :</span> {{$dt->shiping_email}}</p>                                                        
                                                            <p><span class="text-info">giao hàng :</span> {{$dt->phuongthuc_giaohang}}</p>                                                        
                                                            <p><span class="text-info">thanh toán :</span> {{$dt->phuongthuc_thanhtoan}}</p>                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <form method="POST" action="" id="form-delete">
                @method('DELETE')
                @csrf
                </form>
            </div> <!-- /.table-stats -->
            <div class="">{{$chitiet->appends(request()->all())->links()}}</div>
        </div>
    </div>
@stop()


@section('js')
<script src="{{asset('adm/assets/js/danhsach.js')}}"></script>


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
@stop()