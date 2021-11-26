<?php

namespace App\Http\Controllers;

use App\Models\shiping;
use App\Models\donhang;
use App\Models\trangthai;
use App\Models\orderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\donhang\donhangInterface;

class donhangController extends Controller
{
    protected $donhang;
    public function __construct(donhangInterface $donhang)
    {
        $this->donhang = $donhang;
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->donhang->getAll();
        $xetduyet = trangthai::orderBy('id', 'ASC')->select('id','name_type')->get();
        return view('admin.donhang.index', compact('data','xetduyet'));
    }

    public function chitietdh($slug){
        $donhangid = donhang::where('order_id', $slug)->first();
        $chitiet = donhang::orderBy('order_id','ASC')->where('order_id', $donhangid->order_id)->paginate(10);
        $sanpham = orderDetail::orderBy('id','ASC')->where('order_id', $donhangid->order_id)->paginate(10);
        $hdonhang = donhang::orderBy('order_id','ASC')->where('order_id')->paginate(10);
        return view('admin.chitietdh.index', compact('chitiet','hdonhang','sanpham'));
    }


    public function update_trangthai(Request $request){
        if($request){
            dd($request);
            $update = new donhang();
            $update->order_id = $request['order_id'];
            $update->id_status = $request['id_status'];
            if ($update->update()){
                echo 'done';
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $donhangid = donhang::where('order_id', $id)->first();
        $delete = $this->donhang->find($id);
        if($donhangid){
            // xóa đơn hàng chi tiết
            $delete = orderDetail::orderBy('id','ASC')->where('order_id', $donhangid->order_id);
            $delete->delete();
            // xóa đơn hàng tổng
            $delete = $this->donhang->find($id);
            $delete->delete();
        }
        return redirect()->route('donhang.index')->with('success', 'xóa thành công');
    }
}
