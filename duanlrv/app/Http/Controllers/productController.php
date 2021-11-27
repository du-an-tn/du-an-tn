<?php

namespace App\Http\Controllers;

use App\Models\trangthai;
use App\Models\information;
use App\Models\category;
use App\Models\navmenu;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\qlsanpham\qlsanphamInterface;

class productController extends Controller
{
    protected $qlsanpham;
    public function __construct(qlsanphamInterface $qlsanpham)
    {
        $this->qlsanpham = $qlsanpham;
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->qlsanpham->getsanpham();
        $danhmuc = navmenu::orderBy('id', 'ASC')->select('id','name_nav','slug')->get();
        $xetduyet = trangthai::orderBy('id', 'ASC')->select('id','name_type')->get();
        foreach($danhmuc as $key => $dm) {
            $nav_id = $dm->id;

                if(isset($_GET['sort_by'])){
                    $sort_by = $_GET['sort_by'];


                    if($sort_by == $dm->slug){
                        $data = information::with('phandanhmuc')->where('type_post', 1)->where('id_menu', $dm->id)->orderBy('id', 'ASC')->paginate(10);
                    }
                }
        }
        return view('admin.qlsanpham.index', compact('data','xetduyet','danhmuc'));
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
        return view('admin.qlsanpham.create', compact('xetduyet','danhmuc','text'));
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
        $qlsanpham = $this->qlsanpham->find($id);
        $xetduyet = trangthai::orderBy('id', 'ASC')->select('id','name_type')->get();
        $text = navmenu::orderBy('id', 'ASC')->select('id','name_nav')->get();
        $danhmuc = category::orderBy('id', 'ASC')->select('id','name')->get();
        return view('admin.qlsanpham.edit', compact('qlsanpham','xetduyet','danhmuc','text'));
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
        $dataslug = \Str::slug($request->title).'-'.\Carbon\Carbon::now()->timestamp;
        $request->merge(['slug_product' => $dataslug]);
        $request->merge(['type_post' => 1]);
        if($this->qlsanpham->update($id,$request->all()))
        {
            return redirect()->route('qlsanpham.index')->with('success', 'xét duyệt thành công');
        }
        else{
            return redirect()->route('qlsanpham.index')->with('error', 'xét duyệt thất bại');
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
        $delete = $this->qlsanpham->find($id);
        $delete->delete();
        return redirect()->route('qlsanpham.index')->with('success', 'xóa thành công');
    }

    //font-end
    public function chi_tiet_san_pham($slug){
        $category = DB::table('categories')->where('hidden','1')->where('id_nav','1')->orderby('id','desc')->get();
        $category_meo= DB::table('categories')->where('hidden','1')->where('id_nav','6')->orderby('id','desc')->get();
        $category_ca= DB::table('categories')->where('hidden','1')->where('id_nav','3')->orderby('id','desc')->get();
        $category_chim= DB::table('categories')->where('hidden','1')->where('id_nav','4')->orderby('id','desc')->get();
        $category_khac= DB::table('categories')->where('hidden','1')->where('id_nav','5')->orderby('id','desc')->get();
        $detail_product = DB::table('information_post')
        ->join('categories','categories.id','information_post.id_category')
        ->where('slug_product',$slug)->get();
        return view('pages.sanpham.detail')->with(compact('category','category_meo','category_ca','category_chim','category_khac','detail_product'));
    }
    public function load_comment(Request $request){
        $product_id = $request->product_id;
        $comment = Comment::where('comment_product_id',$product_id)->get();
        $output = '';
        foreach($comment as $key => $comm){
            $output.= '
            <div class="comment-option">

            <div class="co-item">
                                                <div class="avatar-pic">
                                                    
                                                    <img src="img/product-single/avatar-1.png" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>'.$comm->comment_name.' <span>27 Aug 2019</span></h5>
                                                    <div class="at-reply">'.$comm->comment.'</div>
                                                </div>
                                            </div>
                                            </div>
            
            
            ';
        }
        echo $output;
    }
}
