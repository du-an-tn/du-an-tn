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
                                    <li><a data-toggle="modal" data-target="#exampleModal" active>Thêm dịch vụ</a></li>
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
                        <strong class="card-title mt-3">Danh sách dịch vụ</strong>
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
                            <th class="serial">Tên dịch vụ</th>
                            <th>Trạng thái</th>
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
                                    <span>{{$dt->name_dichvu}}</span>
                                </td>
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
                                    <a href="{{route('qldichvu.edit',$dt->id)}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('qldichvu.destroy',$dt->id)}}" class="btn btn-sm btn-danger btndelete"><i class="fa fa-trash"></i></a>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <center><strong class="modal-title" id="exampleModalLabel">form thêm dịch vụ cơ sở</strong></center>
        <form action="{{route('chitietdichvu.store')}}" id="formne" method="POST" enctype="multipart/form-data">
            @csrf
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label>nhập tên dịch vụ</label>
                <input type="text"  name="name_dichvu" id="name_dichvu" class="form-control" placeholder="tên dịch vụ">
            </div>
            <div class="form-group">
                <label>trạng thái</label>
                <select class="form-control" name="id_status" id="id_status">
                    <option value='1'>Thành công</option>
                    <option value='2'>Đợi xét duyệt</option>
                    <option value='3'>Đã Hủy</option>
                </select>
            </div>
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
            <button type="button" class="btn btn-primary" id="submitajax">Lưu</button>
        </div>
      </form>
    </div>
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
        $(document).on('click', '#submitajax', function(){
            var name = $('#name_dichvu').val();
            var trangthai = $('#id_status').val();
            var dis = $(this).data('dismiss');
            var _token = $('input[name="_token"]').val();  
            $.ajax({
                url:'{{url('/admin/chitietdichvu')}}', 
                method:'post',
                data:{
                    name: name,trangthai: trangthai,dis:dis,_token:_token,
                },
                success: function(data) 
                {
                    if(data == 'done')
                    {
                        $(".content").load("{{url('/admin/chitietdichvu')}}");
                        alertify.success('thành công !');
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