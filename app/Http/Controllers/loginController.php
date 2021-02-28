<?php

namespace App\Http\Controllers;

use App\admin;
use App\pengelola;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class loginController extends Controller
{
    //
    function login(Request $request){
        $datapeng = pengelola::where('email', $request->email)
                            ->where('password', $request->password)
                            ->get();
        $dataadmins = admin::where('email', $request->email)
                            ->where('password', $request->password)
                            ->get();

            
        if (count($datapeng)>0) {
            Auth::guard('pengelolas')->loginUsingId($datapeng[0]['id']);
            return redirect('/pengelola');
            
        } 
        elseif (count($dataadmins)>0) {
            Auth::guard('admins')->loginUsingId($dataadmins[0]['id']);
            return redirect('/admins');
            
        
        }else{
            return redirect('/logina')->with('pesangagallogin','Username atau Password Salah');
        }

    }
    function logout(){
        if (Auth::guard('admins')->check()) {
        Auth::guard('admins')->logout();
        }
        elseif (Auth::guard('pengelolas')->check()) {
        Auth::guard('pengelolas')->logout();
        }
        return redirect('/logina');
    }
}
