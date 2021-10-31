@extends('layouts.admin')
@section('css')
 <style>
     .pagination{
         padding: 0;
     }
 </style>
@endsection
@section('main')
    <div class="content">
        <div class="card cart-bg">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                    <strong class="card-title mt-3">danh sách mã giảm giá</strong>
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
                            <th class="avatar">mã giảm giá</th>
                            <th>code mã giảm giá</th>
                            <th>số lượng</th>
                            <th>tình trạng coupon</th>
                            <th>ngày bắt đầu</th>
                            <th>ngày kết thúc</th>
                            <th>trạng thái</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as  $dt)
                            <tr>
                                <td class="serial">{{$dt->coupon_id}}</td>
                                <td class="avatar">
                                    <span>{{$dt->coupon_name}}</span>
                                </td>
                                <td class="avatar">
                                    <span>{{$dt->coupon_code}}</span>
                                </td>
                                <td class="avatar">
                                    <span>{{$dt->coupon_number}}</span>
                                </td>
                                <td>
                                    <span>
                                        @if($dt->coupon_condition == 1)
                                         giảm %
                                        @else
                                         giảm tiền
                                        @endif
                                    </span>
                                </td>
                                <td>
                                    <span>{{$dt->coupon_date_start}}</span>
                                </td>
                                <td>
                                    <span>{{$dt->coupon_date_end}}</span>
                                </td>
                                <td>
                                    @if($dt->id_status == 0)
                                    <a href="{{URL::to('/active-category-product/'.$dt->id)}}"><span class="badge badge-danger">Ẩn</span></a>
                                    @else
                                    <a href="{{URL::to('/unactive-category-product/'.$dt->id)}}"><span class="badge badge-complete">Hiện</span></a>
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-sm btn-danger btndelete"><i class="fa fa-trash"></i></a>
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