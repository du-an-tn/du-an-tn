<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category= DB::table('categories')->where('hidden','1')->where('id_nav','1')->orderby('id','ASC')->get();
        $category_meo= DB::table('categories')->where('hidden','1')->where('id_nav','6')->orderby('id','ASC')->get();
        $category_ca= DB::table('categories')->where('hidden','1')->where('id_nav','3')->orderby('id','ASC')->get();
        $category_chim= DB::table('categories')->where('hidden','1')->where('id_nav','4')->orderby('id','ASC')->get();
        $category_khac= DB::table('categories')->where('hidden','1')->where('id_nav','5')->orderby('id','ASC')->get();
        return view('pages.home')->with(compact('category','category_meo','category_ca','category_chim','category_khac'));
    }
    //adhshd
}
