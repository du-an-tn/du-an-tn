@extends('layouts.admin')
@section('js')
    <script>
        // jquery lấy ngày tháng năm
        jQuery(document).ready(function($) {    
            $( function() {
                $( "#datepicker" ).datepicker({
                    prevText:"Tháng trước",
                    nextText:"Tháng sau",
                    dateFormat:"yy-mm-dd",
                    dayNamesMin:["thứ 2", "thứ 3", "thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ Nhật"],
                });
            });
            $( function() {
                $( "#datepicker2" ).datepicker({
                    prevText:"Tháng trước",
                    nextText:"Tháng sau",
                    dateFormat:"yy-mm-dd",
                    dayNamesMin:["thứ 2", "thứ 3", "thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ Nhật"],
                });
            });
        });
    </script>
<!-- thống kê sản phẩm (donut) -->
<script>
    jQuery(document).ready(function($) {
        var colorDanger = "#FF1744";
          var donut = Morris.Donut({
            element: 'donut',
            resize: true,
            colors: [
                '#E0F7FA',
                '#B2EBF2',
                '#80DEEA',
                '#4DD0E1',
                '#00ACC1',
                '#0097A7',
                '#00838F',
                '#006064'
            ],
            //labelColor:"#cccccc", // text color
            //backgroundColor: '#333333', // border color
            data: [
                {label:"Sản phẩm", value:<?php echo $sanpham ?>},
                {label:"Bài viết", value:<?php echo $news ?>},
                {label:"Đơn hàng", value:<?php echo $donhang ?>},
                {label:"Đặt lịch", value:<?php echo $datlich ?>},
                {label:"user", value:<?php echo $account ?>}
            ]
        });
    });
</script>
@stop
@section('main')
<div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="fa fa-hospital-o"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text count">{{$coso}}</div>
                                            <div class="stat-heading">Cơ sở Thú Y</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">{{$donhang}}</span></div>
                                            <div class="stat-heading">đơn hàng</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-browser"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">{{$sanpham}}</span></div>
                                            <div class="stat-heading">sản phẩm</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">{{$account}}</span></div>
                                            <div class="stat-heading">users</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                <div class="clearfix"></div>

                <div class="col-sm-12 card">
                    <div class="card-body">
                        <center><strong class="box-title">Thống kê doanh số đơn hàng</strong></center>
                    </div>
                    <div class="row">
                        <form autocomplete="off" class="card-body">
                            @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <p>Từ ngày<input type="text" id="datepicker" class="form-control"></p>
                                <input type="button" id="btn-dashboard-filter" class="btn btn-info btn-sm" value="lọc kết quả">
                            </div>
                            <div class="col-md-3">
                                <p>Đến ngày <input type="text" id="datepicker2" class="form-control"></p>
                            </div>
                            <div class="col-md-3">
                                <p>Lọc theo
                                    <select class="dashboard-filter custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option>-- chọn --</option>
                                        <option value="7ngay">7 ngày qua</option>
                                        <option value="thangtruoc">Tháng trước</option>
                                        <option value="thangnay">Tháng này</option>
                                        <option value="365ngayqua">365 ngày</option>
                                    </select>
                                </p>
                            </div>
                        </div>
                        </form>
                        <div class="col-sm-12">
                            <div id="myfirstchart" style="height:250px;"></div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="orders">
                    <div class="row">  <!-- /.col-lg-8 -->
                    <div class="col-lg-7 col-md-8">
                        <div class="card ov-h" style="min-height:400px">
                            <div class="card-body">
                                <center><strong>Thống kê tổng bài viết, sản phẩm, dịch vụ shop...</strong></center>
                                <hr>
                            <div id="donut" class="morris-donut-inverse"></div>
                            </div>
                        </div><!-- /.card -->
                    </div>
                        <div class="col-md-5">
                            <div class="card" style="min-height:440px">
                                @php
                                    $pt_traffic_year = $traffic_year_count / $traffic_total_count * 100;
                                    $pt_traffic_online = $traffic_count / $traffic_year_count * 100;
                                    $pt_traffic_this_month = $traffic_this_month_count / $traffic_year_count * 100;
                                @endphp
                                    <div class="card-body">
                                        <div class="progress-box progress-1">
                                            <h4 class="por-title">Đang online</h4>
                                            <div class="por-txt">{{$traffic_count}} Users ({{round($pt_traffic_online)}}%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-1" role="progressbar" style="width: {{$pt_traffic_online}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title">Tổng tháng này</h4>
                                            <div class="por-txt">{{$traffic_this_month_count}} Users ({{round($pt_traffic_this_month)}}%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-2" role="progressbar" style="width: {{$pt_traffic_this_month}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title">Tổng năm này</h4>
                                            <div class="por-txt">{{$traffic_year_count}} Users</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: 100%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title">Tổng truy cập</h4>
                                            <div class="por-txt">{{$traffic_total_count}} Users</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-4" role="progressbar" style="width: 100%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div> <!-- /.col-md-4 -->
                    </div>
                </div>
                <!-- /.orders -->
                <!-- Calender Chart Weather  -->
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Đơn đặt hàng </h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th>mã đơn hàng</th>
                                            <th>name - order</th>
                                            <th>Email</th>
                                            <th>số điện thoại</th>
                                            <th>trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 1;
                                        @endphp
                                        @foreach($ctdonhang as $dt)
                                        <tr>
                                            <td class="serial">{{$i++}}</td>
                                            <td>{{$dt->order_code}}</td>
                                            <td><span class="name">{{$dt->order_name}}</span> </td>
                                            <td><span class="product">{{$dt->order_email}}</span> </td>
                                            <td><span class="">{{$dt->order_phone}}</span></td>
                                            <td>
                                                <span class="badge badge-thongbao">
                                                    @if($dt->id_status == 1)
                                                        hoàn thành
                                                    @elseif($dt->id_status == 2)
                                                        chưa hoàn thành
                                                    @else
                                                        đã hủy
                                                    @endif
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
                    </div> <!-- /.card -->
                </div>

                    <!-- thống kê sản phẩm -->
                </div>
            </div>
            <!-- .animated -->
        </div>
@stop