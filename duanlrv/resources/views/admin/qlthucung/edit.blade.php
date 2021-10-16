@extends('layouts.admin')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<style>
 .form-nhap{
     background: linear-gradient(45deg, #020024 0%, #09793f 35%, #00d4ff 100%);
     color: rgb(252, 211, 77);
     font-weight: bold;
 }
 .form-text{
     background-color: rgba(165, 165, 165, 0.35);
     width: 100%;
     border: 1px solid #fff;
     padding:5px 0;
     border-radius: 5px;
     color: #fff;
     padding-left: 10px;
 }
 .form-text::placeholder{
     padding-left: 10px;
     color: rgb(252, 211, 77);
     opacity: 1;
 }
 .op-text{
     background-color: rgba(0, 0, 0, 0.35);
 }
</style>
@stop()
@section('main')
<div class="content" style="background:#fff;">
    <div class="col-sm-12 form-nhap" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; border-radius:15px">
        <div class="card-header">
            <center><strong class="card-title"><h3>Nhập thú cưng</h3></strong></center>
        </div>
        <form action="{{route('qlthucung.update',$qlthucung->id)}}" method="POST" enctype="multipart/form-data">
         @csrf @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Tên thú cưng *</label>
            <input type="text" class="form-text" name="title" id="name" value="{{$qlthucung->title}}" placeholder="Nhập Tên thú cưng...">
        </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">slug thú cưng</label>
            <input type="text" class="form-text" name="slug" id="slug" value="{{$qlthucung->slug}}" placeholder="Nhập Tên menu...">
        </div>
        <div class="form-group col-md-6">
                <label for="exampleFormControlFile1">images {{$qlthucung->image}}</label>
                <input type="file" class="form-text" name="file_upload" placeholder="chưa có tệp nào được chọn...">
        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">giá sản phẩm *</label>
        <input type="text" class="form-text" name="price" value="{{$qlthucung->price}}" placeholder="nhập giá sản phẩm...">
    </div>
    <div class="form-group">
        <label for="inputAddress2">giá giảm (nếu có)</label>
        <input type="text" class="form-text" name="discount" value="{{$qlthucung->discount}}" placeholder="nhập giá giảm...">
    </div>
    <div class="form-row">
            <div class="form-group col-md-6">
                <label>Danh mục đăng tin</label>
                <select class="form-text" name="id_category">

                    @foreach($danhmuc as $muc)
                    <option class="op-text" value="{{$muc->id}}">{{$muc->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="inputZip">Độ tuổi</label>
                <input type="text" class="form-text" name="age" value="{{$qlthucung->age}}" placeholder="nhập độ tuổi..." >
            </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Tình trạng sức khỏe</label>
            <input type="text" class="form-text" name="status" value="{{$qlthucung->status}}" placeholder="nhập tình trạng sức khỏe...">
        </div>
        <!-- <div class="form-group col-md-4">
            <label>Xét duyệt trạng thái</label>
            <select class="form-text" name="id_trang_thai">
                @foreach($xetduyet as $xet)
                <option class="op-text" value="{{$xet->id}}">{{$xet->name_type}}</option>
                @endforeach
            </select>
        </div> -->
        <div class="form-group col-md-6">
            <label>Giống thú cưng</label>
            <input type="text" class="form-text" name="render" value="{{$qlthucung->render}}" placeholder="chó,mèo..." >
        </div>
    </div>
    <div class="form-group col-md-12" style="background-color: #fff; color: #000;">
        <label>Nhập mô tả</label>
        <textarea class="form-control" name="description" id="content" rows="10">{{$qlthucung->description}}</textarea> 
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
            <button type="submit" class="btn btn-warning btn-sm form-control"><i class="fa fa-magic"></i>&nbsp; submit</button>
        </div>
        <br>
        </form>
    </div>
</div>
@stop
@section('js')
<script src="{{asset('adm/assets/js/slug.js')}}"></script>

  <!--summernote-->
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>  
<script>
    jQuery(document).ready(function($) {
        // Summernote
        $('#content').summernote({
            height:200,
        });
    });
</script>
@stop()