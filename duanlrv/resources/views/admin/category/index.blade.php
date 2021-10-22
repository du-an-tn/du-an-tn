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
    <div class="col-md-12">
        <form action="">
            @csrf
        <div class="form-group">
            <label><strong>quản lý danh sách</strong></label>
            <select name="sort" id="sort" class="form-control">
                <option value="{{Request::url()}}">Tất cả danh sách</option>
            @foreach($danhmuc as $loc)
            <option value="{{Request::url()}}?sort_by={{$loc->slug}}">{{$loc->name_nav}}</option>
            @endforeach
            </select>
        </div>
        </form>
    </div>
        <div class="card cart-bg">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                    <strong class="card-title mt-3">danh sách category</strong>
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
                            <th class="avatar">Tên menu</th>
                            <th>thuộc menu</th>
                            <th>slug</th>
                            <th>trạng thái</th>
                            <th>Action</th>
                            <!-- <th>Quantity</th>
                            <th>Status</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as  $dt)
                            <tr>
                                <td class="serial">{{$dt->id}}</td>
                                <td class="avatar">
                                    <span>{{$dt->name}}</span>
                                </td>
                                <td>
                                    <span>{{$dt->cat->name_nav}}</span>
                                </td>
                                <td>
                                    <span>{{$dt->slug}}</span>
                                </td>
                                <td>
                                    @if($dt->hidden == 0)
                                    <a href="{{URL::to('/active-category-product/'.$dt->id)}}"><span class="badge badge-danger">Danh mục Ẩn</span></a>
                                    @else
                                    <a href="{{URL::to('/unactive-category-product/'.$dt->id)}}"><span class="badge badge-complete">Danh mục Hiện</span></a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('category.edit',$dt->id)}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('category.destroy',$dt->id)}}" class="btn btn-sm btn-danger btndelete"><i class="fa fa-trash"></i></a>
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