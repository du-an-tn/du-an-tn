<?php

namespace App\Http\Controllers;

use App\Models\account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\account\accountInterface;
class accountController extends Controller
{
    protected $account;
    public function __construct(accountInterface $account)
    {
        $this->account = $account;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->account->getAll();
            if(isset($_GET['sort_by'])){
                $sort_by = $_GET['sort_by'];


                if($sort_by == 'quan-tri'){
                    $data = account::where('id_role', 1)->orderBy('id', 'ASC')->search()->paginate(10);
                }else{
                    $data = account::where('id_role', 2)->orderBy('id', 'ASC')->search()->paginate(10);
                }
            }
        return view('admin.account.index', compact('data'));
    }
    public function showaccount()
    {
        $data = $this->account->getAll();
        return view('admin.profile.index', compact('data'));
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
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, account $account)
    {
        //
    }

    public function update_thongtin(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
        $update = account::find($id);
        $update->name = $data['name'];
        $update->email = $data['email'];
        $update->phone = $data['phone'];
        $update->address = $data['address'];
        $update->save();
        echo 'done';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(account $account)
    {
        //
    }
    public function login_customer(){
        return view('Site.login');
    }
    public function check_login(Request $request)
    {
        $data = $request->only('email','password');
        if(Auth::guard('cus')->attempt($data, $request->has('remember'))){
            return Redirect::to('/');
        }
        return redirect()->back()->with('error','Tai khoan dang nhap sai');
    }
    public function register(){
        
    }
    public function check_register(Request $request){
        $request->validate([
            'password' => 'required',
            'confirm_password'=> 'required|same:password'
        ]);
        $pass_hashed = bcrypt($request->password);
        $request->merge(['password'=>$pass_hashed]);
        //dd($request->all());
        $data = $request->only('name','email','password');
        if(account::create($data)){
            return Redirect::to('/login-customer');
        }
        return redirect()->back();
    }
    public function logout(){
        Auth::guard('cus')->logout();
        return Redirect::to('/login-customer');
    }
    public function show_profile(){
        $category = DB::table('categories')->where('hidden','1')->where('id_nav','1')->orderby('id','desc')->get();
        $category_meo= DB::table('categories')->where('hidden','1')->where('id_nav','6')->orderby('id','desc')->get();
        $category_ca= DB::table('categories')->where('hidden','1')->where('id_nav','3')->orderby('id','desc')->get();
        $category_chim= DB::table('categories')->where('hidden','1')->where('id_nav','4')->orderby('id','desc')->get();
        $category_khac= DB::table('categories')->where('hidden','1')->where('id_nav','5')->orderby('id','desc')->get();
        $cus = Auth::guard('cus')->user();
        return view('pages.account.profile')->with(compact('category','category_meo','category_ca','category_chim','category_khac','cus'));
    }
    public function update_profile(Request $request){
        $cus = Auth::guard('cus')->user();
        if($request->password){
            $request->validate([
                'password' => 'required',
                'confirm_password'=> 'required|same:password'
            ]);
            $pass_hashed = bcrypt($request->password);
            $request->merge(['password'=>$pass_hashed]);
        }else{
            $request->merge(['password'=>$cus->password]);
        }
        $data = $request->only('name','email','password','address',);
        if($cus->update($data)){
            return redirect()->back();
        }
        return redirect()->back();
        
    }
}
