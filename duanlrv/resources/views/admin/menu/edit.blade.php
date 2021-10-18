@extends('layouts.admin')
@section('main')
<div class="content" style="background:#fff;">
    <div class="col-sm-12" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; border-radius:15px">
        <div class="card-header">
            <center><strong class="card-title">form Thêm menu</strong></center>
        </div>
        <form action="{{route('menu.update',$menu->id)}}" method="POST" enctype="multipart/form-data">
         @csrf @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Tên menu</label>
            <input type="text" class="form-control" name="name_nav" id="name" placeholder="Nhập Tên menu">
        </div>
        <div class="form-group" style="display: none;">
            <label for="exampleInputEmail1">Tên slug</label>
            <input type="text" class="form-control" name="slug" id="slug" placeholder="Nhập Tên menu">
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
@stop
@section('js')
<script src="{{asset('adm/assets/js/slug.js')}}"></script>
@stop