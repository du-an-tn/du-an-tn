<?php

namespace App\Http\Controllers;

use App\Models\trangthai;
use App\Models\information;
use App\Models\category;
use App\Models\navmenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\qlthucung\qlthucungInterface;

class infoController extends Controller
{
    protected $qlthucung;
    public function __construct(qlthucungInterface $qlthucung)
    {
        $this->qlthucung = $qlthucung;
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->qlthucung->getthucung();
        $danhmuc = navmenu::orderBy('id', 'ASC')->select('id','name_nav','slug')->get();
        $xetduyet = trangthai::orderBy('id', 'ASC')->select('id','name_type')->get();
        foreach($danhmuc as $key => $dm) {
            $nav_id = $dm->id;

                if(isset($_GET['sort_by'])){
                    $sort_by = $_GET['sort_by'];


                    if($sort_by == $dm->slug){
                        $data = information::with('phandanhmuc')->where('type_post', 2)->where('id_menu', $dm->id)->orderBy('id', 'ASC')->paginate(10);
                    }
                }
        }


        return view('admin.qlthucung.index', compact('data','xetduyet','danhmuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $xetduyet = trangthai::orderBy('id', 'ASC')->select('id','name_type')->get();
        $text = navmenu::orderBy('id', 'ASC')->select('id','name_nav')->get();
        $danhmuc = category::orderBy('id', 'ASC')->select('id','name')->get();
        return view('admin.qlthucung.create', compact('xetduyet','danhmuc','text'));
    }

    public function select_delivery(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_province = category::where('id_nav', $data['ma_id'])->orderBy('id', 'ASC')->select('id','name')->get();
                    $output.='<option class="op-text">---chọn danh mục ---</option>';
                foreach($select_province as $province){
                    $output.='<option class="op-text" value="'.$province->id.'">'.$province->name.'</option>';
                }
            
            // }else{
            //     $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
            //     $output.='<option>---Chọn xã phường---</option>';
            //     foreach($select_wards as $key => $ward){
            //         $output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
            //     }
            }
            echo $output;

        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->has('file_upload'))
        {
            $file= $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time().'-'.'thucung.'.$ext;
            $file->move(public_path('uploads'), $file_name);
        }
        $request->merge(['image'=>$file_name]);
        $request->merge(['slug_product' => \Str::slug($request->title).'-'. \Carbon\Carbon::now()->timestamp]);
        $request->merge(['type_post' => 1]);
        if($this->qlthucung->create($request->all()))
        {
            return redirect()->route('qlthucung.index')->with('success', 'xét duyệt thành công');
        }
        else{
            return redirect()->route('qlthucung.index')->with('error', 'xét duyệt thất bại');
        }
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
        $qlthucung = $this->qlthucung->find($id);
        $xetduyet = trangthai::orderBy('id', 'ASC')->select('id','name_type')->get();
        $text = navmenu::orderBy('id', 'ASC')->select('id','name_nav')->get();
        $danhmuc = category::orderBy('id', 'ASC')->select('id','name')->get();
        return view('admin.qlthucung.edit', compact('qlthucung','xetduyet','danhmuc','text'));
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
        if($request->has('file_upload'))
        {
            $file= $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time().'-'.'thucung.'.$ext;
            $file->move(public_path('uploads'), $file_name);
        }
        $request->merge(['image'=>$file_name]);
        $dataslug = \Str::slug($request->title).'-'.\Carbon\Carbon::now()->timestamp;
        $request->merge(['slug_product' => $dataslug]);
        $request->merge(['type_post' => 2]);
        if($this->qlthucung->update($id,$request->all()))
        {
            return redirect()->route('qlthucung.index')->with('success', 'xét duyệt thành công');
        }
        else{
            return redirect()->route('qlthucung.index')->with('error', 'xét duyệt thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
