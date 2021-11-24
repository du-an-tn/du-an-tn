@extends('layouts.admin')
@section('layout.css')
 <style>
     .namedm{
         font-size:15px;
         font-weight: bold;
         color: blue;
     }
 </style>
@endsection
@section('main')
<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Danh sách quản lý dịch vụ</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{route('qldichvu.create')}}" active>Thêm cơ sở</a></li>
                                    <li><a href="#" active>Thêm dịch vụ</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="content">
        <div class="card cart-bg">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <strong class="card-title mt-3">Danh sách cơ sở</strong>
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
                <table class="table">
                    <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th class="serial">image</th>
                            <th class="avatar">Tên cơ sở</th>
                            <th>thời gian hoạt động</th>
                            <th>số điện thoại</th>
                            <th>Trạng thái</th>
                            <th>Chi tiết</th>
                            <th style="width:100px;">Action</th>
                            <!-- <th>Quantity</th> -->
                            <!-- <th>Status</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach($data as $dt)
                            <tr>
                                <td class="serial">{{$i++}}</td>
                                <td class="serial"><img src="{{asset('uploads')}}/{{$dt->image}}" alt="{{$dt->image}}" width="300px" height="50px"></td>
                                <td class="avatar">
                                    <span>{{$dt->name_coso}}</span>
                                </td>
                                <td>
                                    <span>{{$dt->time_hoatdong}} - {{$dt->time_ketthuc}}</span>
                                </td>
                                <td class="serial">{{$dt->phone_coso}}</td>
                                <td>
                                    @if($dt->id_status == 1)
                                        <span class="badge badge-complete">thành công</span>
                                    @elseif ($dt->id_status == 2)
                                        <span class="badge badge-warning">đợi xét duyệt</span>
                                    @else
                                        <span class="badge badge-danger">đã hủy</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge badge-pending" data-toggle="modal" data-target=".bd-example-modal-lg{{$dt->id}}">chi tiết <i class="fa fa-mail-reply"></i></span>
                                </td>
                                <td>
                                    <a href="{{route('qldichvu.edit',$dt->id)}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('qldichvu.destroy',$dt->id)}}" class="btn btn-sm btn-danger btndelete"><i class="fa fa-trash"></i></a>
                                </td>
                                <div class="modal fade bd-example-modal-lg{{$dt->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">chi tiết : {{$dt->id}} - {{$dt->name_coso}}</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group form-gr-img">
                                                        <img src="{{asset('uploads/'.$dt->image)}}" alt="" width="100%" height="200px">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="description_t" style="color:#000; min-height:115px; width:366px;">{!! $dt->description !!}</div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group form-trum">
                                                    <div class="col-12">
                                                        <p><span class="text-info">Tên cơ sở : {{$dt->name_coso}}</span></p>
                                                        <p><span class="text-info">Thời gian hoạt động : {{$dt->time_hoatdong}} - {{$dt->time_ketthuc}}</span></p>
                                                        <p><span class="text-info">Số điện thoại : {{$dt->phone_coso}}</span></p>
                                                    </div>
                                                    <hr>
                                                    <div class="col-12">
                                                        <p><span class="text-info">Tỉnh - Thành Phố : <span class="color-red">{{$dt->thanhpho->name_thanhpho}}</span></span></span> </p>
                                                        <p><span class="text-info">Quận huyện : <span class="color-red">{{$dt->quanhuyen->name_quanhuyen}}</span></span></p>
                                                        <p><span class="text-info">Xã Phường : <span class="color-red">{{$dt->xaphuong->name_xaphuong}}</span></span></p>
                                                        <p><span class="text-info">Địa chỉ cụ thể : <span class="color-red">{{$dt->address_cuthe}}</span></span></p>
                                                    </div>

                                                    <hr>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <!-- <button type="button" class="btn btn-primary">lưu</button> -->
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