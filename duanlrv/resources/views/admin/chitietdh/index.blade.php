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
                    <div class="col-sm-12">
                    <center><strong class="card-title mt-3">Thông tin vận chuyển</strong></center>
                    </div>
                </div>
            </div>
            <x-alert></x-alert>
            <div class="table-stats order-table ov-h">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>ghi chú</th>
                            <th>hình thức thanh toán</th>
                            <th>hình thức giao hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($chitiet as $dt)
                            <tr>
                                <td>
                                    <span>{{$dt->shiping_name}}</span>
                                </td>
                                <td>
                                    <span>{{$dt->shiping_phone}}</span>
                                </td>
                                <td>
                                    <span>{{$dt->shiping_email}}</span>
                                </td>
                                <td>
                                    <span>{{$dt->shiping_address}}</span>
                                </td>
                                <td>
                                    <span>{{$dt->shiping_note}}</span>
                                </td>
                                <td>
                                    @if($dt->phuongthuc_thanhtoan = 1)
                                        <span>chuyển khoản</span>
                                    @else
                                        <span>thanh toán trực tiếp</span>
                                    @endif
                                </td>
                                <td>
                                    @if($dt->phuongthuc_giaohang = 1)
                                        <span>Giao hàng nhanh</span>
                                    @elseif($dt->phuongthuc_giaohang = 2)
                                        <span>Giao hàng tiết kiệm</span>
                                    @elseif($dt->phuongthuc_giaohang = 3)
                                        <span>VIETEL POST</span>
                                    @else
                                        <span>ninja Vận</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- /.table-stats -->
        </div>

        <div class="card cart-bg">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                    <strong class="card-title mt-3">danh sách đơn hàng</strong>
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
            <div class="table-stats order-table ov-h">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>mã đơn hàng</th>
                            <th>coupon</th>
                            <th>Tên sản phẩm</th>
                            <th>giá sản phẩm</th>
                            <th>số lượng</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                      $i = 1;
                      $total = 0;  
                    @endphp

                        @foreach($sanpham as $hd)

                        @php
                                $subtotal = $hd->product_price*$hd->product_quantity;
                                $total += $subtotal;
                        @endphp
                            <tr>
                                <td>{{$i++}}</td>
                                <td>
                                    <span>{{$hd->order_code}}</span>
                                </td>
                                <td>
                                    <span>
                                        @if($hd->product_coupon != null)
                                            {{$hd->product_coupon}}
                                        @else
                                            không có coupon
                                        @endif
                                    </span>
                                </td>
                                <td>
                                    <span>{{$hd->product_name}}</span>
                                </td>
                                <td>
                                    <span>{{number_format($hd->product_price, 0, '.', '.')}} VNĐ</span>
                                </td>
                                <td>
                                    <span>{{$hd->product_quantity}}</span>
                                </td>
                                <td>
                                    <span>{{number_format($hd->product_price * $hd->product_quantity, 0, '.', '.')}}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-sm-6">
                    <div class="form-group">
                        <strong>Tổng tiền thanh toán: <span style="color:#fff">{{number_format($total, 0, '.', '.')}} VNĐ</span></strong>
                    </div>
                </div>
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