<?php

namespace App\Http\Controllers;

use App\Models\trangthai;
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
        $xetduyet = trangthai::orderBy('id', 'ASC')->select('id','name_type')->get();
        return view('admin.qlthucung.index', compact('data','xetduyet'));
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
                    $output.='<option>---chọn danh mục ---</option>';
                foreach($select_province as $province){
                    $output.='<option value="'.$province->id.'">'.$province->name.'</option>';
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
        $request->merge(['slug' => \Str::slug($request->title).'-'. \Carbon\Carbon::now()->timestamp]);
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
        $danhmuc = category::orderBy('id', 'ASC')->select('id','name')->get();
        return view('admin.qlthucung.edit', compact('qlthucung','xetduyet','danhmuc'));
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
            $file_name = time().'-'.'phim.'.$ext;
            $file->move(public_path('uploads'), $file_name);
        }
        $request->merge(['image'=>$file_name]);
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
