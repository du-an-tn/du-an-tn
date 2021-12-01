@extends('layouts.admin')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('main')
<div class="content" style="background:#fff;">
    <div class="col-sm-12" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; border-radius:15px">
        <div class="card-header">
            <center><strong class="card-title">form sửa tin tức</strong></center>
        </div>
        <form action="{{route('news.update', $news->id)}}" method="POST" role="form" enctype="multipart/form-data">
         @csrf @method('PUT')
         <div class="row">
            <div class="form-group col-md-6">
                <label>Tên tin tức</label>
                <input type="text" class="form-control" name="name_post" value="{{$news->name_post}}" id="name" placeholder="Nhập Tên tin tức">
            </div>
            <div class="form-group col-md-6">
                <label>Hình ảnh (*)</label>
                <div class="input-group mt-1">
                    <input type="text" id="image" name="image" value="{{$news->image}}" class="form-control" placeholder="nhập hình ảnh sản phẩm">
                    <div class="input-group-append">
                        <button class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-lg" type="button"><i class="fa fa-folder"></i></button>
                    </div>
                </div>
            </div>
         </div>
        <div class="form-group" style="display: none;">
            <label>Tên slug</label>
            <input type="text" class="form-control" value="{{$news->slug}}" name="slug" placeholder="Nhập slug">
        </div>
        <div class="form-group">
        <label>Nhập mô tả</label>
            <textarea class="form-control" name="description" id="content" rows="10">{{$news->description}}</textarea> 
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="hidden" id="radio0" value="0">
            <label class="form-check-label" for="inlineRadio1">Ẩn</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="hidden" id="radio1" value="1" checked>
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
@stop