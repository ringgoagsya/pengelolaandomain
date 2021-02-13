<?php

namespace App\Http\Controllers;

use App\admin;
use App\pengelola;
use Illuminate\Support\Facades\Auth;
use\App\model\mahasiswa;
use\App\model\dosen;
use\App\model\user;

use Illuminate\Http\Request;

class loginController extends Controller
{
    //
    function login(Request $request){
        $datamhs = mahasiswa::where('email', $request->email)
                            ->where('password', $request->password)
                            ->get();
        $datapeng = pengelola::where('email', $request->email)
                            ->where('password', $request->password)
                            ->get();
        $datadsn = dosen::where('email', $request->email)
                            ->where('password', $request->password)
                            ->get();
        $datauser = user::where('email', $request->email)
                            ->where('password', $request->password)
                            ->get();
        $dataadmins = admin::where('email', $request->email)
                            ->where('password', $request->password)
                            ->get();

        if (count($datamhs)>0) {
            Auth::guard('mahasiswa')->loginUsingId($datamhs[0]['id']);
            return redirect('/mahasiswa');
        }    
        elseif (count($datapeng)>0) {
            Auth::guard('pengelolas')->loginUsingId($datapeng[0]['id']);
            return redirect('/pengelola');
            
        } 
        elseif (count($dataadmins)>0) {
            Auth::guard('admins')->loginUsingId($dataadmins[0]['id']);
            return redirect('/admins');
            
        } elseif (count($datadsn)>0){
            Auth::guard('dosen')->loginUsingId($datadsn[0]['id']);
            return redirect('/dosen');
 
        }elseif(count($datauser)>0){
            Auth::guard('user')->loginUsingId($datauser[0]['id']);
            return redirect('/admin');
        }else{
            return "login gagal";
        }

    }
    function logout(){
        if (Auth::guard('mahasiswa')->check()) {
        Auth::guard('mahasiswa')->logout();
        }
        elseif (Auth::guard('pengelolas')->check()) {
        Auth::guard('pengelolas')->logout();
        } elseif (Auth::guard('dosen')->check()) {
            Auth::guard('dosen')->logout();
        } elseif (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        }
        return redirect('/logina');
    }
}
