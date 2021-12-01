<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Illuminate\Http\Response;
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
       $products= $this-> products ->getAll();
       $categoryNav = DB::Table('nav_menu')->orderby('id')->get();
       return view('Site.index',compact('products','categoryNav'));

       return view('Site.index',compact('products'));
    }
    public function dichvu(){
        return view('site.checkout');
    }

    public function productDetail($slug)
    {   
        $categoryNav = DB::Table('nav_menu')->orderby('id')->get();
        $detail_product = DB::table('information_post')
        ->join('categories','categories.id_category','information_post.id_category')
        ->where('slug_product',$slug)->get();
       return view('Site.productDetail',compact('detail_product','categoryNav'));
    }
    public function products()
    {
        $categoryNav = DB::Table('nav_menu')->orderby('id')->get();
       $products= $this->products->getAll();
       $category_by_id = DB::table('categories')->get();
       return view('Site.products',compact('products','categoryNav','category_by_id'));
    }

    // public function productDetail()
    // {
    //    return view('Site.productDetail');
    // }

    // public function products()
    // {
    //    $products= $this-> products ->getAll();
       
    //    return view('Site.products',compact('products'));

    // }
    function addToCart($id){
        // session()->flush('carts');
        $product = $this-> products->find($id);
        $carts= session()->get('cart',[]);
        if(isset($carts[$id])){
            $carts[$id]['quantity']=$carts[$id]['quantity']+1;
        }else{
            $carts[$id]=[
                'name'=>$product->title,
                'price'=>$product->price,
                'quantity'=>1,
                'images'=>$product->image,
                
            ];
        }
        session()->put('cart', $carts);
        $carts =session()->get('cart');
        $cart=View('Site.cartquick',compact('carts'))->render();
        return response()->json(['cartquick'=> $cart]);
        // echo "<pre>";
        // print_r(session()->get('cart'));
        // return response()->json([
        //     'code'=>200,
        //     'message'=>'success'

        // ], 200);
        
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
            $cartt=View('Site.cartquick',compact('carts'))->render();
            $cart=View('Site.contentCart',compact('carts'))->render();
            return response()->json(['contentCart'=> $cart,'cartquick'=> $cartt]);
        } 
    }
    public function deleteCart(Request $request){
        if($request->id){
            $carts =session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart',$carts);
            $carts =session()->get('cart');
            $cart=View('Site.contentCart',compact('carts'))->render();
            $cartt=View('Site.cartquick',compact('carts'))->render();
            return response()->json(['contentCart'=> $cart,'cartquick'=> $cartt]);
            
        } 
    }
    public function removeCart(){
        session()->flush('carts');
        $carts =session()->get('cart');
        $cart=View('Site.contentCart',compact('carts'))->render();
        $cartt=View('Site.cartquick',compact('carts'))->render();
        return response()->json(['contentCart'=> $cart,'cartquick'=> $cartt]);
    } 
    public function checkout(){
        $carts =session()->get('cart');
        
        return view('site.checkout');

    } 
        
    }

