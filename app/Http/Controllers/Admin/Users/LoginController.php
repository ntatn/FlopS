<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Mail\registerMail;
use App\Http\Requests\registerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index(){
        return view('admin.users.login',[
            'title' => 'Login'
        ]);
    }
    
    public function store(Request $request){
        $this ->validate($request,[
            'email' => 'required|email:filter',
            'password' => 'required',
        ]);

        if(Auth::attempt(['email' => $request->input('email'),
                'password' => $request->input('password'),
                'level' => 1
            ])){
                return redirect()->route('admin');

        }
        if(Auth::attempt(['email' => $request->input('email'),
                'password' => $request->input('password'),
                'level' => 0
            ])){
            $account = Auth::user();
            if($account->status == 0){
                Session::flash('error', 'Tài khoản chưa được xác thực');
                return redirect()->back();
             }else{
                return redirect()->route('homepage');
             }
        }
        Session::flash('error', 'Không thể đăng nhập');
        return redirect()->back();

    }

    public function viewReg(){
        return view('admin.users.register',[
            'title' => 'Register'
        ]);
    }
    public function Reg(registerRequest $request)
    {
        
        $dataMail = $request->all();
        $dataMail['hash'] = Str::uuid();
        $dataMail['password'] = bcrypt($request->password);
        $dataMail['level'] = 0;
        $dataMail['status'] = 0;
        $dataMail['name'] = $request->name;
        User::create($dataMail);
        Mail::to($request->email)->send(new  registerMail($dataMail));
        Session::flash('warning', 'Vui lòng kiểm tra email của bạn');
        return redirect()->route('login');
    }
    
    public function active($token){
        $account = User::where('hash', $token)->first();
        if($account){
            if($account->status == 1){
                Session::flash('success',' Xác thực thành công!');
                return redirect()->route('login');
            }else{
                $account->status = 1;
                $account->save();
                Session::flash('success','Xác thực thành công!');
                return redirect()->route('login');
            }
        }else{
            Session::flash('error','Error');
        }
    }
    
}
