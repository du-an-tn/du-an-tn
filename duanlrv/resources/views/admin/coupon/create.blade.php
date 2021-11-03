@extends('layouts.admin')
@section('main')
<div class="content" style="background:#fff;">
    <div class="col-sm-12" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; border-radius:15px">
        <div class="card-header">
            <center><strong class="card-title">form Thêm mã giảm giá</strong></center>
        </div>
        <form action="{{route('coupon.store')}}" method="POST" role="form">
         @csrf
         <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Tên mã giảm giá</label>
                    <input type="text" class="form-control" name="coupon_name" placeholder="Nhập Tên danh mục">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>ngày bắt đầu</label>
                    <input type="date" class="form-control" name="coupon_date_start" placeholder="Nhập Tên danh mục">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>ngày Kết thúc</label>
                    <input type="date" class="form-control" name="coupon_date_end" placeholder="Nhập Tên danh mục">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>số lượng</label>
                    <input type="text" class="form-control" name="coupon_qty" placeholder="Nhập Tên danh mục">
                </div>
            </div>
            <div class="form-group col-sm-6">
                <label for="exampleFormControlSelect1">giảm theo</label>
                <select class="form-control" id="exampleFormControlSelect1" name="coupon_condition">
                <option value="1">theo %</option>
                <option value="2">theo giá tiền</option>
                </select>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>số giảm</label>
                    <input type="text" class="form-control" name="coupon_number" placeholder="Nhập Tên danh mục">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>code coupon</label>
                    <input type="text" class="form-control" name="coupon_code" placeholder="Nhập Tên danh mục">
                </div>
            </div>

         </div>
         <div class="form-group">
            <label for="exampleFormControlSelect1">Trạng thái xét duyệt</label>
            <select class="form-control" id="exampleFormControlSelect1" name="id_status">
            <option value="1">xét duyệt</option>
            <option value="2">Đợi xét duyệt</option>
            <option value="3">hủy xét duyệt</option>
            </select>
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