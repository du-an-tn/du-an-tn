<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Response;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\qlsanpham\qlsanphamInterface;
use Illuminate\Support\Facades\View;

session_start();

class HomeController extends Controller
{
    protected $products;
    public function __construct(qlsanphamInterface $products)
    {
        $this->products = $products;
    }
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
       return view('Site.index');
    }
    public function dichvu(){
        return view('site.checkout');
    }
    public function productDetail()
    {
       return view('Site.productDetail');
    }
    public function products()
    {
       $products= $this-> products ->getAll();
       
       return view('Site.products',compact('products'));
    }
    function addToCart($id){
        // session()->flush('carts');
        $product = $this-> products->find($id);
        $cart= session()->get('cart',[]);
        if(isset($cart[$id])){
            $cart[$id]['quantity']=$cart[$id]['quantity']+1;
        }else{
            $cart[$id]=[
                'name'=>$product->title,
                'price'=>$product->price,
                'quantity'=>1,
                'images'=>$product->image,
                
            ];
        }
        session()->put('cart', $cart);
        // echo "<pre>";
        // print_r(session()->get('cart'));
        // return response()->json([
        //     'code'=>200,
        //     'message'=>'success'

        // ], status: 200);
        
    }

    public function cartViews(){
        $carts= session()->get('cart');
        return view("site.cartView",compact('carts'));
    }
    public function updateCart(Request $request){
        // dd($request->all());
        if($request->id && $request ->quantity){
            $carts =session()->get('cart');
            $carts[$request->id]['quantity']=$request->quantity;
            session()->put('cart',$carts);
            $carts =session()->get('cart');
            
            $cart=View('Site.contentCart',compact('carts'))->render();
            return response()->json(['contentCart'=> $cart]);
        } 
        // return view("site.cartView",compact('cartss'));
    }
}
