@extends('layouts.admin')
@section('main')
<div class="content" style="background:#fff;">
    <div class="col-sm-12" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; border-radius:15px">
        <div class="card-header">
            <center><strong class="card-title">form Thêm menu</strong></center>
        </div>
        <form action="{{route('slide.store')}}" method="POST" role="form" enctype="multipart/form-data">
         @csrf
         <div class="form-group">
            <label for="danhmucne">chọn danh mục</label>
            <select class="form-control" id="danhmucne" name="danh_muc">
            <option value="" selected>-- chọn danh mục -- </option>
            @foreach($danhmuc as $dm)
            <option value="{{$dm->id}}">{{$dm->name_nav}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Tên tiêu đề</label>
            <input type="text" class="form-control" name="tieu_de" placeholder="Nhập tên tiêu đề">
        </div>
        <div class="form-group">
            <label>thông tin</label>
            <input type="text" class="form-control" name="thong_tin" placeholder="Nhập thông tin">
        </div>
        <div class="form-group">
            <label>khuyến mãi</label>
            <input type="text" class="form-control" name="khuyen_mai" placeholder="Nhập khuyến mãi">
        </div>
        <div class="form-group">
            <label>link giảm giá</label>
            <input type="text" class="form-control" name="link" placeholder="Nhập link khuyến mãi">
        </div>
        <div class="form-group">
            <label>Hình ảnh (*)</label>
            <div class="input-group mt-1">
                <input type="text" id="image" name="image" class="form-control" placeholder="nhập hình ảnh sản phẩm">
                <div class="input-group-append">
                    <button class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-lg" type="button"><i class="fa fa-folder"></i></button>
                </div>
            </div>
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






<!-- modal thêm hình -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="max-width:96% !important;">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">danh sách hình ảnh</h5>
        </div>
        <div class="modal-body">
        <iframe src="{{url('/file/dialog.php?field_id=image')}}" width="100%" height="500px" style="over-flow-y:auto" frameborder="0"></iframe>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
@stop()




@section('js')
<script src="{{asset('adm/assets/js/slug.js')}}"></script>
@stop