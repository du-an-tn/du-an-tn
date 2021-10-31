@extends('layouts.admin')
@section('main')
<div class="content" style="background:#fff;">
    <div class="col-sm-12" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; border-radius:15px">
        <div class="card-header">
            <center><strong class="card-title">form Thêm menu</strong></center>
        </div>
        <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
         @csrf @method('PUT')
         <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Tên danh mục</label>
                    <input type="text" class="form-control" value="{{$category->name}}" name="name_category" id="name" placeholder="Nhập Tên danh mục">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>__chọn menu__</label>
                    <select class="form-control" name="id_nav">
                    @foreach($menu as $mn)
                    <option value="{{$mn->id}}">{{$mn->name_nav}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group" style="display: none;">
            <label for="exampleInputEmail1">Tên slug</label>
            <input type="text" class="form-control" value="{{$category->slug}}" name="slug" id="slug" placeholder="Nhập Tên menu">
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-success btn-sm form-control"><i class="fa fa-magic"></i>&nbsp; submit</button>
        </div>
        <br>
        </form>
    </div>
</div>
@stop
@section('js')
<script src="{{asset('adm/assets/js/slug.js')}}"></script>
@stop