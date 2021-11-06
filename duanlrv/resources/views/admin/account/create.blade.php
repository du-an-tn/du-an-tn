@extends('layouts.admin')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<style>
 .form-nhap{
    background-image: linear-gradient( 135deg, #43CBFF 10%, #9708CC 100%);
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
            <center><strong class="card-title"><h3>FORM NHẬP SẢN PHẨM</h3></strong></center>
        </div>
        <form action="{{route('qlthucung.store')}}" method="POST" enctype="multipart/form-data">
         @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">tiêu đề sản phẩm*</label>
            <input type="text" class="form-text" name="title" id="name"  placeholder="Nhập Tên thú cưng...">
        </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">slug sản phẩm <span style="color:red">slug được nhập tự động</span></label>
            <input type="text" class="form-text" name="slug_product"  placeholder="Nhập Tên menu..." disabled>
        </div>
        <div class="form-group col-md-6">
                <label for="exampleFormControlFile1">images</label>
                <input type="file" class="form-text" name="file_upload" placeholder="chưa có tệp nào được chọn...">
        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">giá sản phẩm *</label>
        <input type="text" class="form-text" name="price"  placeholder="nhập giá sản phẩm...">
    </div>
    <div class="form-group">
        <label for="inputAddress2">giá giảm (nếu có)</label>
        <input type="text" class="form-text" name="discount" placeholder="nhập giá giảm...">
    </div>
    <div class="form-group">
        <label for="inputZip">tình trạng sản phẩm</label>
        <input type="text" class="form-text" name="quantity"  placeholder="Còn hàng | hết hàng..." >
    </div>
    <div class="form-row">
            <div class="form-group col-md-6">
                <label>Menu</label>
                <select class="form-text choose input-sm city" name="id_menu" id="city">
                  <option value="">-----{{__('Chọn menu')}}-----</option>
                    @foreach($text as $t)
                    <option class="op-text" value="{{$t->id}}">{{$t->name_nav}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label>Danh mục đăng tin <span style="color:red">(vui lòng chọn menu trước)</span></label>
                <select class="form-text input-sm choose province" name="id_category" id="province">
                    <option class="op-text">-----{{__('Chọn danh mục')}}-----</option>
                </select>
            </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>nhãn hiệu</label>
            <input type="text" class="form-text" name="brand" placeholder="nhập nhãn hiệu sản phẩm">
        </div>
        <div class="form-group col-md-4">
            <label for="inputZip">Số lượng sản phẩm</label>
            <input type="text" class="form-text" name="quantity"  placeholder="nhập số lượng sản phẩm..." >
        </div>
        <div class="form-group col-md-4">
            <label>Xét duyệt trạng thái</label>
            <select class="form-text" name="id_status">
                @foreach($xetduyet as $xet)
                <option class="op-text" value="{{$xet->id}}">{{$xet->name_type}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group col-md-12" style="background-color: #fff; color: #000;">
        <label>Nhập mô tả</label>
        <textarea class="form-control" name="description" id="content" rows="10"></textarea> 
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

<script type="">
jQuery(document).ready(function($) {

    $('.choose').on('change', function() {
        var action = $(this).attr('id');
        var ma_id = $(this).val();
        var _token = $('input[name="_token"]').val();

        // alert(action);
        // alert(ma_id);
        // alert(_token);
        var result = '';

        if (action == 'city') {
            result = 'province';
        }
        //  else {
        //     result = 'wards';
        // }
        $.ajax({
            url: '{{url('/admin/select-delivery')}}',
            method: 'post',
            data: {action: action, ma_id: ma_id, _token: _token},
            success: function(data) {
                $('#' + result).html(data);
            }
        });
    });
});
</script>

@stop()