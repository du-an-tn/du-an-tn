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
    <div class="col-md-12">
        <form action="">
            @csrf
        <div class="form-group">
            <label><strong>quản lý danh sách</strong></label>
            <select name="sort" id="sort" class="form-control">
                <option value="{{Request::url()}}">Tất cả danh sách</option>
                <option value="{{Request::url()}}?sort_by=quan-tri">quản trị</option>
                <option value="{{Request::url()}}?sort_by=user">user</option>
            </select>
        </div>
        </form>
    </div>
        <div class="card cart-bg">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                    <strong class="card-title mt-3">quản lý account</strong>
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
                            <th class="avatar">name</th>
                            <th>phone</th>
                            <th>vai trò</th>
                            <th>xem chi tiết</th>
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
                                <td class="avatar">
                                    <span>{{$dt->name}}</span>
                                </td>
                                <td>
                                    <span>{{$dt->phone}}</span>
                                </td>
                                <td>
                                    @if($dt->id_role == 1)
                                        <span class="badge badge-complete">quản trị</span>
                                    @else
                                        <span class="badge badge-warning">user</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge badge-pending" data-toggle="modal" data-target=".bd-example-modal-lg{{$dt->id}}">chi tiết <i class="fa fa-mail-reply"></i></span>
                                </td>
                                <td>
                                    <a href="{{route('qlsanpham.edit',$dt->id)}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('qlsanpham.destroy',$dt->id)}}" class="btn btn-sm btn-danger btndelete"><i class="fa fa-trash"></i></a>
                                </td>
                                <div class="modal fade bd-example-modal-lg{{$dt->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content model-ct">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">chi tiết : {{$dt->id}} - {{$dt->name}}</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group form-gr-img">
                                                        <img src="{{asset('uploads/'.$dt->avatar)}}" alt="" width="100%" height="200px">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group form-trum">
                                                    <div class="col-12">
                                                        <p><span class="text-info">Tên nhân vật :</span> {{$dt->name}}</p>
                                                        <p><span class="text-info">email :</span> {{$dt->email}}</p>
                                                        <p><span class="text-info">số điện thoại :</span> {{$dt->phone}}</p>
                                                    </div>
                                                    <div class="col-12">
                                                        <p><span class="text-info">địa chỉ :</span> {{$dt->address}}</p>
                                                        <p>
                                                            <span class="text-info">Vai trò :</span>
                                                            @if($dt->id_role == 1)
                                                                quản trị
                                                            @else 
                                                                user
                                                            @endif
                                                        </p>
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