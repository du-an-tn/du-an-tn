<?php

namespace App\Http\Controllers;

use App\Models\navmenu;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\danhmuc\categoryInterface;
use Session;

class categoryController extends Controller
{
    protected $category;
    public function __construct(categoryInterface $category)
    {
        $this->category = $category;
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->category->getAll();
        $danhmuc = navmenu::orderBy('id', 'ASC')->select('id','name_nav','slug')->get();
        foreach($danhmuc as $key => $dm) {
            $nav_id = $dm->id;
        

            if(isset($_GET['sort_by'])){
                $sort_by = $_GET['sort_by'];


                if($sort_by == $dm->slug){
                    $data = category::with('phandanhmuc')->where('id_nav', $dm->id)->orderBy('id', 'ASC')->search()->paginate(10);
                    $data->render();
                }
            }
        }
        return view('admin.category.index', compact('data','danhmuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = navmenu::orderBy('id', 'ASC')->select('id','name_nav')->get();
        return view('admin.category.create', compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->category->create($request->all())){
            return redirect()->route('category.index')->with('success', 'thêm danh mục thành công');
        }else{
            return redirect()->route('category.index')->with('error', 'thêm danh mục thất bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }
    public function active_category_product($category_product_id){

        DB::table('category')->where('id',$category_product_id)->update(['hidden' => 0]);
        Session::put('message','Kích hoạt danh mục thành công');
        return redirect()->route('category.index')->with('success', 'Kích hoạt danh mục thành công');
    }
    public function unactive_category_product($category_product_id){

        DB::table('category')->where('id',$category_product_id)->update(['hidden' => 1]);
        Session::put('message','Không kích hoạt danh mục thành công');
        return redirect()->route('category.index')->with('error', 'Không kích hoạt danh mục thành công');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->category->find($id);
        $menu = navmenu::orderBy('id', 'ASC')->select('id','name_nav')->get();
        return view('admin.category.edit', compact('category','menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $data = $request->all();
        if($this->category->update($id,$data))
        {
            return redirect()->route('category.index')->with('success', 'sửa danh mục thành công');
        }
        else{
            return redirect()->route('category.index')->with('error', 'cập nhật không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oke = $this->category->find($id);
        // if($oke->products()->count() > 0 ){
        //     return redirect()->route('category.index')->with('error', 'không thể xóa danh mục này');
        // }else{
            $oke->delete();
            return redirect()->route('category.index')->with('success', 'xóa thành công !!!');
        // }
    }

    //fontend
    public function show_category_home($id){
        // $category_by_id = DB::table('information_post')
        // ->join('categories','categories.id','information_post.id_category')->where('categories.slug',$slug_category_product)
        // ->where('information_post.hidden','1')->where('type_post','2')->get();
        $category = DB::Table('nav_menu')->orderby('id')->get();
        $products = DB::table('information_post')->where('id_menu',$id)->where('type_post',2)->get();
        $category_by_id = DB::table('categories')->where('id_nav',$id)->get();
        return view('Site.products')->with(compact('products','category','category_by_id'));
    }
    // public function show_category_phukien(){
    //     $category = DB::table('categories')->where('hidden','1')->where('id_nav','1')->orderby('id','desc')->get();
    //     $category_meo= DB::table('categories')->where('hidden','1')->where('id_nav','6')->orderby('id','desc')->get();
    //     $category_ca= DB::table('categories')->where('hidden','1')->where('id_nav','3')->orderby('id','desc')->get();
    //     $category_chim= DB::table('categories')->where('hidden','1')->where('id_nav','4')->orderby('id','desc')->get();
    //     $category_khac= DB::table('categories')->where('hidden','1')->where('id_nav','5')->orderby('id','desc')->get();
    //     $category_by_id = DB::table('information_post')
        
    //     ->where('hidden','1')->where('type_post','1')->get();
    //     return view('pages.category.show_category')->with(compact('category','category_meo','category_ca','category_chim','category_khac','category_by_id'));
    // }
}
