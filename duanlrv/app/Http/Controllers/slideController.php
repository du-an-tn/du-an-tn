<?php

namespace App\Http\Controllers;

use App\Models\slide;
use App\Models\navmenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\slide\slideInterface;

class slideController extends Controller
{
    protected $slide;
    public function __construct(slideInterface $slide)
    {
        $this->slide = $slide;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->slide->getAll();
        $danhmuc = navmenu::orderBy('id', 'ASC')->select('id','name_nav')->get();
        return view('admin.slide.index', compact('data','danhmuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhmuc = navmenu::orderBy('id', 'ASC')->select('id','name_nav')->get();
        return view('admin.slide.create', compact('danhmuc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->slide->create($request->all()))
        {
            return redirect()->route('slide.index')->with('success', 'xét duyệt thành công');
        }
        else{
            return redirect()->route('slide.index')->with('error', 'xét duyệt thất bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = $this->slide->find($id);
        $danhmuc = navmenu::orderBy('id', 'ASC')->select('id','name_nav')->get();
        return view('admin.slide.edit', compact('danhmuc','slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($this->slide->update($id,$request->all()))
        {
            return redirect()->route('slide.index')->with('success', 'xét duyệt thành công');
        }
        else{
            return redirect()->route('slide.index')->with('error', 'xét duyệt thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(slide $slide)
    {
        //
    }
}
