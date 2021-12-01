@extends('layouts.admin')
@section('main')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                    <strong class="card-title mt-3">danh sách slide website</strong>
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
                            <th class="avatar">image</th>
                            <th>Danh mục</th>
                            <th>tiêu đề</th>
                            <th>Thông tin</th>
                            <th>Khuyến mãi</th>
                            <th>link</th>
                            <th>ẩn hiện</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @php
                        $i = 1;
                    @endphp
                    <tbody>
                        @foreach($data as $dt)
                            <tr>
                                <td class="serial">{{$i++}}</td>
                                <td class="avatar">
                                    <span><img src="{{asset('uploads')}}/{{$dt->image}}" alt="{{$dt->image}}" height="50px"></span>
                                </td>
                                <td>
                                    <span>{{$dt->danhmuc->name_nav}}</span>
                                </td>
                                <td>
                                    <span>{{$dt->tieu_de}}</span>
                                </td>
                                <td>
                                    <span>{{$dt->thong_tin}}</span>
                                </td>
                                <td>
                                    <span>{{$dt->khuyen_mai}}</span>
                                </td>
                                <td>
                                    <span>{{$dt->link}}</span>
                                </td>
                                <td>
                                    @if($dt->hidden == 0)
                                        <span class="badge badge-danger">Danh mục Ẩn</span>
                                    @else
                                        <span class="badge badge-complete">Danh mục Hiện</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('slide.edit',$dt->id)}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('slide.destroy',$dt->id)}}" class="btn btn-sm btn-danger btndelete"><i class="fa fa-trash"></i></a>
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