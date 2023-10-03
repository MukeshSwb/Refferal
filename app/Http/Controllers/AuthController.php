<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use App\Helpers\Helper;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }  
      
    public function registration(){
        return view('auth.registration');
    }
      
    public function postLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role_id == '1') {
                return redirect()->intended('/admin/dashboard')->withSuccess('Welcome Admin');
            } elseif ($user->role_id =='2') {
                return redirect()->intended('/user/dashboard')->withSuccess('Welcome User');
            }
            // return redirect()->intended('dashboard')
            //             ->withSuccess('You have Successfully loggedin');
        }
  
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
      
    public function postRegistration(Request $request){  
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6',
        // ]);
        // $request->validate([
        //     'fname' => 'required|alpha',
        //     'lname' => 'required|alpha',
        //     'email' => 'required|email|unique:users',
        //     'mobile_number' => 'required|numeric',
        //     'password' => 'required|min:8'
        // ]);
           
        $data = $request->all();
        $check = $this->create($data);
        $uniqueReference = Helper::GenerateReferenceNumber($check);
        User::where('id',$check->id)->update(['refer_code'=>$uniqueReference]);
        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
    
    public function dashboard(){
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
    public function create(array $data){
      return User::create($data);
    }
    
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
