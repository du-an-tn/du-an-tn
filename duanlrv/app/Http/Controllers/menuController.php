<?php

namespace App\Http\Controllers;

use App\Models\category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\menu\navmenuInterface;


class menuController extends Controller
{
    protected $menu;
    public function __construct(navmenuInterface $menu)
    {
        $this->menu = $menu;
    } 



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->menu->getAll();
        return view('admin.menu.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->menu->create($request->all())){
            return redirect()->route('menu.index')->with('success', 'thêm danh mục thành công');
        }else{
            return redirect()->route('menu.index')->with('error', 'thêm danh mục thất bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\navmenu  $navmenu
     * @return \Illuminate\Http\Response
     */
    public function show(navmenu $navmenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\navmenu  $navmenu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = $this->menu->find($id);
        return view('admin.menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\navmenu  $navmenu
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $data = $request->all();
        if($this->menu->update($id,$data))
        {
            return redirect()->route('menu.index')->with('success', 'sửa danh mục thành công');
        }
        else{
            return redirect()->route('menu.index')->with('error', 'cập nhật không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\navmenu  $navmenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oke = $this->menu->find($id);
        if($oke->products()->count() > 0 ){
            return redirect()->route('menu.index')->with('error', 'không thể xóa danh mục này');
        }else{
            $oke->delete();
            return redirect()->route('menu.index')->with('success', 'xóa thành công !!!');
        }
    }
}
