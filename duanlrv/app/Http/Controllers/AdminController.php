<?php

namespace App\Http\Controllers;

use App\Models\traffic;
use App\Models\donhang;
use App\Models\information;
use App\Models\coso;
use App\Models\account;
use App\Models\datlich;
use App\Models\news;
use App\Models\orderDetail;
use Illuminate\Http\Request;

use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard(Request $request){
    // đang online
    $user_ip_address = $request->ip();
    //tổng tháng trước
    $early_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
    $send_of_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
    //Tổng tháng này
    $early_this_month = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    // tổng 1 năm
    $oneyears = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();



    // total one in year
    $traffic_year = traffic::whereBetween('date_traffic',[$oneyears, $now])->get();
    $traffic_year_count = $traffic_year->count();
    
    // total_last_month
    $traffic_of_last_month = traffic::whereBetween('date_traffic',[$early_last_month, $send_of_last_month])->get();
    $traffic_of_last_month_count = $traffic_of_last_month->count();
    // total this month
    $traffic_this_month = traffic::whereBetween('date_traffic',[$early_this_month,$now])->get();
    $traffic_this_month_count = $traffic_this_month->count();
    // total traffic
    $traffic_total = traffic::all();
    $traffic_total_count = $traffic_total->count();
    //traffic online
    $traffic_current = traffic::where('ip_address', $user_ip_address)->get();
    $traffic_count = $traffic_current->count();
    if ($traffic_count < 1) {
        $traffic = new traffic();
        $traffic->ip_address = $user_ip_address;
        $traffic->date_traffic = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $traffic->save();
    }
    // thống kê tổng
    $coso = coso::all()->count();
    $sanpham = information::all()->count();
    $account = account::all()->count();
    $datlich = datlich::all()->count();
    $donhang = donhang::all()->count();
    $ctdonhang = donhang::orderBy('order_date', 'desc')->take(5)->get();
    $news = news::all()->count();

        return view('admin.dashboard', 
        compact(
        'traffic_count',
        'traffic_of_last_month_count',
        'traffic_this_month_count',
        'traffic_year_count',
        'traffic_total_count',
        'sanpham',
        'account',
        'datlich',
        'donhang',
        'news',
        'ctdonhang',
        'coso'
    ));
    }


    public function filter_by_date(Request $request)
    {
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get = donhang::whereBetween('order_date',[$from_date, $to_date])->orderBy('order_date', 'ASC')->get();

            foreach($get as $val)
            {

                $chart_data[] = array(
                    'period' => $val->order_date,
                    'order' => $val->donhang->product_price,
                    'sales' => $val->donhang->tong_tien,
                    'quantity' => $val->donhang->product_quantity
                );
            }
            if($chart_data){
                echo $data = json_encode($chart_data);
            }else{
                echo $data = 'thất bại';
            }
    }


    
    public function dashboard_filter(Request $request)
    {
        $data = $request->all();
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dauthangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoithangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365day = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if($data['dashboard_value'] == "7ngay"){
            $get = donhang::whereBetween('order_date',[$sub7days, $now])->orderBy('order_date','ASC')->get();
        }elseif($data['dashboard_value'] == "thangtruoc"){
            $get = donhang::whereBetween('order_date',[$dauthangtruoc, $cuoithangtruoc])->orderBy('order_date','ASC')->get();
            
        }elseif ($data['dashboard_value'] == "thangnay") {
            $get = donhang::whereBetween('order_date',[$dauthangnay, $now])->orderBy('order_date','ASC')->get();
        }else{
            $get = donhang::whereBetween('order_date',[$sub365day, $now])->orderBy('order_date','ASC')->get();
        }
        foreach($get as $val)
        {

            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->donhang->product_price,
                'sales' => $val->donhang->tong_tien,
                'quantity' => $val->donhang->product_quantity
            );
        }
            echo $data = json_encode($chart_data);
    }

    public function order_date(Request $request){
        $sub14day = Carbon::now('Asia/Ho_Chi_Minh')->subDays(14)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = donhang::whereBetween('order_date', [$sub14day,$now])->orderBy('order_date','ASC')->get();

        foreach($get as $val)
        {

            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->donhang->product_price,
                'sales' => $val->donhang->tong_tien,
                'quantity' => $val->donhang->product_quantity
            );
        }
            echo $data = json_encode($chart_data);

    }

    public function file()
    {
        return view('admin.file');
    }
}
