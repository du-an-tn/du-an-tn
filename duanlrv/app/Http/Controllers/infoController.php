<?php

namespace App\Http\Controllers;

use App\Models\trangthai;
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
        $qlthucung = $this->qlthucung->find($id);
        $xetduyet = trangthai::orderBy('id', 'ASC')->select('id','name_type')->get();
        return view('admin.qlthucung.edit', compact('qlthucung','xetduyet'));
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
        $data = $request->all();
        if($this->qlthucung->update($id,$data))
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
