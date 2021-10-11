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
    <div class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                    <strong class="card-title mt-3">quản lý thú cưng</strong>
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
                            <th class="avatar">Tên bài đăng</th>
                            <th>slug</th>
                            <th>Trạng thái bài đăng</th>
                            <th>xem chi tiết</th>
                            <th>Action</th>
                            <!-- <th>Quantity</th> -->
                            <!-- <th>Status</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $dt)
                            <tr>
                                <td class="serial">{{$dt->id}}</td>
                                <td class="avatar">
                                    <span>{{$dt->title}}</span>
                                </td>
                                <td>
                                    <span>{{$dt->slug}}</span>
                                </td>
                                <td>
                                    @if($dt->id_trang_thai == 1)
                                        <span class="badge badge-complete">thành công</span>
                                    @elseif ($dt->id_trang_thai == 2)
                                        <span class="badge badge-warning">chưa xét duyệt</span>
                                    @else
                                        <span class="badge badge-danger">đã hủy</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge badge-warning" data-toggle="modal" data-target=".bd-example-modal-lg{{$dt->id}}">chi tiết <i class="fa fa-mail-reply"></i></span>
                                </td>
                                <td>
                                    <a href="{{route('qlthucung.edit',$dt->id)}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('qlthucung.destroy',$dt->id)}}" class="btn btn-sm btn-danger btndelete"><i class="fa fa-trash"></i></a>
                                </td>
                                <div class="modal fade bd-example-modal-lg{{$dt->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">chi tiết : {{$dt->id}} - {{$dt->title}}</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <img src="" alt="" width="100%" height="150px">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <p><span style="color:blue">Danh mục đăng :</span> {{$dt->typepost->name_type}}</p>
                                                            <p><span style="color:blue">Thuộc menu :</span> {{$dt->navmenu->name_nav}}</p>
                                                            <p><span style="color:blue">loại :</span> {{$dt->category->name_category}}</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p><span style="color:blue">người đăng :</span> {{$dt->price}}</p>
                                                            <p><span style="color:blue">thời gian đăng :</span> {{$dt->time}} ngày</p>
                                                            <p><span style="color:blue">lượt xem :</span> {{$dt->view}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <textarea name="" cols="40" rows="6" disabled>{{$dt->description}}</textarea>
                                                    <div class="row">
                                                    <div class="col-6">
                                                        <p><span style="color:blue">Giá :</span> {{$dt->price}}</p>
                                                        <p><span style="color:blue">giá giảm :</span> {{$dt->navmenu->name_nav}}</p>
                                                        <p><span style="color:blue">trạng thái đăng :</span> {{$dt->trangthai->name_type}}</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><span style="color:blue">Tình trạng :</span> {{$dt->status}}</p>
                                                        <p><span style="color:blue">Độ tuổi :</span> {{$dt->navmenu->age}}</p>
                                                        <p><span style="color:blue">Giống:</span> {{$dt->category->name_category}}</p>
                                                    </div>
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