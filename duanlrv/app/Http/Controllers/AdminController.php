<?php

namespace App\Http\Controllers;

use App\Models\traffic;
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


        return view('admin.dashboard', 
        compact(
        'traffic_count',
        'traffic_of_last_month_count',
        'traffic_this_month_count',
        'traffic_year_count',
        'traffic_total_count'
    ));
    }

    public function file()
    {
        return view('admin.file');
    }
}
