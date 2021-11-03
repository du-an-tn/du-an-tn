<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\news\newsInterface;

class newsController extends Controller
{
    protected $news;
    public function __construct(newsInterface $news)
    {
        $this->news = $news;
    } 



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->news->getAll();
        return view('admin.news.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['slug' => \Str::slug($request->name_post).'-'. \Carbon\Carbon::now()->timestamp]);
        if($this->news->create($request->all()))
        {
            return redirect()->route('news.index')->with('success', 'xét duyệt thành công');
        }
        else{
            return redirect()->route('news.index')->with('error', 'xét duyệt thất bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function show(news $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = $this->news->find($id);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataslug = \Str::slug($request->name_post).'-'.\Carbon\Carbon::now()->timestamp;
        $request->merge(['slug' => $dataslug]);
        if($this->news->update($id,$request->all()))
        {
            return redirect()->route('news.index')->with('success', 'xét duyệt thành công');
        }
        else{
            return redirect()->route('news.index')->with('error', 'xét duyệt thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(news $news)
    {
        //
    }
}
