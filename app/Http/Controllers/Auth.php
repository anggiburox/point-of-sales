<?php

namespace App\Http\Controllers;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Auth extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        return view('auth/login');
    }

    public function login(Request $request){  
        
        $post = request()->all();
        $user = UsersModel::where('Username', $post['username'])->first();

        if ($user) {
                $admin = UsersModel::where('ID_User',$user->ID_User)->first();
                if ($post['password'] == $user->Password) {
                    $params = [
                        'islogin'   => true,
                        'username'     => $admin->Username,
                        'password' =>$admin->Password,
                        'nama'     => $admin->Nama
                    ];
                    $request->session()->put($params);
                        return redirect()->to('/admin/dashboard'); 
                } else { 
                    return redirect()->back()->with('error', 'Password salah!');
                }
            }else{
                return redirect()->back()->with('error', 'Username salah!');
            }
    }

    public function logout(){
        Session::forget('islogin');
        Session::forget('username');
        Session::forget('password');
        Session::forget('nama');
        Session::flush();
        return redirect()->to('/');
    }
}