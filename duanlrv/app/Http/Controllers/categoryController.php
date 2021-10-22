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

        DB::table('category')->where('id',$category_product_id)->update(['hidden' => 1]);
        Session::put('message','Kích hoạt danh mục thành công');
        return redirect()->route('category.index')->with('success', 'Kích hoạt danh mục thành công');
    }
    public function unactive_category_product($category_product_id){

        DB::table('category')->where('id',$category_product_id)->update(['hidden' => 0]);
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
}
