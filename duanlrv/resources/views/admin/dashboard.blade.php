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
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-8">
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
                                                    <th class="avatar">Avatar</th>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Product</th>
                                                    <th>Quantity</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="serial">1.</td>
                                                    <td class="avatar">
                                                        <div class="round-img">
                                                            <a href="#"><img class="rounded-circle" src="images/avatar/1.jpg" alt=""></a>
                                                        </div>
                                                    </td>
                                                    <td> #5469 </td>
                                                    <td>  <span class="name">Louis Stanley</span> </td>
                                                    <td> <span class="product">iMax</span> </td>
                                                    <td><span class="count">231</span></td>
                                                    <td>
                                                        <span class="badge badge-complete">Complete</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="serial">2.</td>
                                                    <td class="avatar">
                                                        <div class="round-img">
                                                            <a href="#"><img class="rounded-circle" src="images/avatar/2.jpg" alt=""></a>
                                                        </div>
                                                    </td>
                                                    <td> #5468 </td>
                                                    <td>  <span class="name">Gregory Dixon</span> </td>
                                                    <td> <span class="product">iPad</span> </td>
                                                    <td><span class="count">250</span></td>
                                                    <td>
                                                        <span class="badge badge-complete">Complete</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="serial">3.</td>
                                                    <td class="avatar">
                                                        <div class="round-img">
                                                            <a href="#"><img class="rounded-circle" src="images/avatar/3.jpg" alt=""></a>
                                                        </div>
                                                    </td>
                                                    <td> #5467 </td>
                                                    <td>  <span class="name">Catherine Dixon</span> </td>
                                                    <td> <span class="product">SSD</span> </td>
                                                    <td><span class="count">250</span></td>
                                                    <td>
                                                        <span class="badge badge-complete">Complete</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="serial">4.</td>
                                                    <td class="avatar">
                                                        <div class="round-img">
                                                            <a href="#"><img class="rounded-circle" src="images/avatar/4.jpg" alt=""></a>
                                                        </div>
                                                    </td>
                                                    <td> #5466 </td>
                                                    <td>  <span class="name">Mary Silva</span> </td>
                                                    <td> <span class="product">Magic Mouse</span> </td>
                                                    <td><span class="count">250</span></td>
                                                    <td>
                                                        <span class="badge badge-pending">Pending</span>
                                                    </td>
                                                </tr>
                                                <tr class=" pb-0">
                                                    <td class="serial">5.</td>
                                                    <td class="avatar pb-0">
                                                        <div class="round-img">
                                                            <a href="#"><img class="rounded-circle" src="images/avatar/6.jpg" alt=""></a>
                                                        </div>
                                                    </td>
                                                    <td> #5465 </td>
                                                    <td>  <span class="name">Johnny Stephens</span> </td>
                                                    <td> <span class="product">Monitor</span> </td>
                                                    <td><span class="count">250</span></td>
                                                    <td>
                                                        <span class="badge badge-complete">Complete</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->

                        <div class="col-xl-4 card">

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
                            <!-- <div class="row">
                                <div class="col-lg-6 col-xl-12">
                                    <div class="card br-0">
                                        <div class="card-body">
                                            <div class="chart-container ov-h">
                                                <div id="flotPie1" class="float-chart"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-xl-12">
                                    <div class="card bg-flat-color-3  ">
                                        <div class="card-body">
                                            <h4 class="card-title m-0  white-color ">August 2018</h4>
                                        </div>
                                         <div class="card-body">
                                             <div id="flotLine5" class="flot-line"></div>
                                         </div>
                                    </div>
                                </div>
                            </div> -->
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
@section('js')
<script>
        jQuery(document).ready(function($) {
            "use strict";

            // Pie chart flotPie1
            var piedata = [
                { label: "Desktop visits", data: [[1,32]], color: '#5c6bc0'},
                { label: "Tab visits", data: [[1,33]], color: '#ef5350'},
                { label: "Mobile visits", data: [[1,35]], color: '#66bb6a'}
            ];

            $.plot('#flotPie1', piedata, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        innerRadius: 0.65,
                        label: {
                            show: true,
                            radius: 2/3,
                            threshold: 1
                        },
                        stroke: {
                            width: 0
                        }
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true
                }
            });
            // Pie chart flotPie1  End
            // cellPaiChart
            var cellPaiChart = [
                { label: "Direct Sell", data: [[1,65]], color: '#5b83de'},
                { label: "Channel Sell", data: [[1,35]], color: '#00bfa5'}
            ];
            $.plot('#cellPaiChart', cellPaiChart, {
                series: {
                    pie: {
                        show: true,
                        stroke: {
                            width: 0
                        }
                    }
                },
                legend: {
                    show: false
                },grid: {
                    hoverable: true,
                    clickable: true
                }

            });
            // cellPaiChart End
            // Line Chart  #flotLine5
            var newCust = [[0, 3], [1, 5], [2,4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];

            var plot = $.plot($('#flotLine5'),[{
                data: newCust,
                label: 'New Data Flow',
                color: '#fff'
            }],
            {
                series: {
                    lines: {
                        show: true,
                        lineColor: '#fff',
                        lineWidth: 2
                    },
                    points: {
                        show: true,
                        fill: true,
                        fillColor: "#ffffff",
                        symbol: "circle",
                        radius: 3
                    },
                    shadowSize: 0
                },
                points: {
                    show: true,
                },
                legend: {
                    show: false
                },
                grid: {
                    show: false
                }
            });
            // Line Chart  #flotLine5 End
            // Traffic Chart using chartist
            if ($('#traffic-chart').length) {
                var chart = new Chartist.Line('#traffic-chart', {
                  labels: ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7','Chủ nhật'],
                  series: [
                  [0, 18000, 35000,  25000,  22000, 22000, 0],
                  [0, 33000, 15000,  20000,  30000,35000,  300],
                  [0, 15000, 28000,  15000,  30000,30000,  5000]
                  ]
              }, {
                  low: 0,
                  showArea: true,
                  showLine: false,
                  showPoint: false,
                  fullWidth: true,
                  axisX: {
                    showGrid: true
                }
            });

                chart.on('draw', function(data) {
                    if(data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 1000 * data.index,
                                dur: 1000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            }
            // Traffic Chart using chartist End
            //Traffic chart chart-js
            if ($('#TrafficChart').length) {
                var ctx = document.getElementById( "TrafficChart" );
                ctx.height = 150;
                var myChart = new Chart( ctx, {
                    type: 'line',
                    data: {
                        labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul" ],
                        datasets: [
                        {
                            label: "Visit",
                            borderColor: "rgba(4, 73, 203,.09)",
                            borderWidth: "1",
                            backgroundColor: "rgba(4, 73, 203,.5)",
                            data: [ 0, 2900, 5000, 3300, 6000, 3250, 0 ]
                        },
                        {
                            label: "Bounce",
                            borderColor: "rgba(245, 23, 66, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(245, 23, 66,.5)",
                            pointHighlightStroke: "rgba(245, 23, 66,.5)",
                            data: [ 0, 4200, 4500, 1600, 4200, 1500, 4000 ]
                        },
                        {
                            label: "Targeted",
                            borderColor: "rgba(40, 169, 46, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(40, 169, 46, .5)",
                            pointHighlightStroke: "rgba(40, 169, 46,.5)",
                            data: [1000, 5200, 3600, 2600, 4200, 5300, 0 ]
                        }
                        ]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }

                    }
                } );
            }
            //Traffic chart chart-js  End
            // Bar Chart #flotBarChart
            $.plot("#flotBarChart", [{
                data: [[0, 18], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6],[16,15], [18, 9],[20,17], [22,7],[24,4], [26,9],[28,11]],
                bars: {
                    show: true,
                    lineWidth: 0,
                    fillColor: '#ffffff8a'
                }
            }], {
                grid: {
                    show: false
                }
            });
            // Bar Chart #flotBarChart End
        });
    </script>
@stop