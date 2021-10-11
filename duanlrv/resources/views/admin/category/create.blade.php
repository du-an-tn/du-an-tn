@extends('layouts.admin')
@section('main')
<div class="content" style="background:#fff;">
    <div class="col-sm-12" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; border-radius:15px">
        <div class="card-header">
            <center><strong class="card-title">form Thêm danh mục</strong></center>
        </div>
        <form action="{{route('category.store')}}" method="POST" role="form">
         @csrf
         <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Tên danh mục</label>
                    <input type="text" class="form-control" name="name_category" id="name" placeholder="Nhập Tên danh mục">
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
            <label>Tên slug</label>
            <input type="text" class="form-control" name="slug" id="slug" placeholder="Nhập slug">
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="hidden" id="radio0" value="0">
            <label class="form-check-label" for="inlineRadio1">Ẩn</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="hidden" id="radio1" value="1">
            <label class="form-check-label" >Hiện</label>
        </div>
        <br>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-success btn-sm form-control"><i class="fa fa-magic"></i>&nbsp; submit</button>
        </div>
        <br>
        </form>
    </div>
</div>
@stop()

@section('js')
<script src="{{asset('adm/assets/js/slug.js')}}"></script>
@stop