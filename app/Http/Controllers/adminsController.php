<?php

namespace App\Http\Controllers;

use App\pengelola;
use App\platform;
use App\pengajuan;
use App\unit;
use App\login_admin;
use App\admin;
use App\domain;
use Illuminate\Http\Request;

class adminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admins');
    }
    public function index()
    {
        $status = config('status.status');
        $user_id = auth()->user()->id;
        $pengajuan = pengajuan::all();
        $domain = domain::all();
        return view('admins.daftar',compact('pengajuan','user_id','domain'));
    }
    public function tambahpesan(Request $request,$id)
    {
        pengajuan::where('id', $id)
              ->update(['pesan' => $request->pesan]);
              $pengajuan=pengajuan::all();
            
            
            return view('admins.daftar', compact('pengajuan'))->with('pesan','Berhasil Menambah Pesan');

    }
    public function home()
    {
        $admins=admin::all();
        $user_id = auth()->user()->id;
        return view('admins.admins',compact('admins','user_id'));
    }
    public function terima($id){

        pengajuan::where('id', $id)
              ->update(['status' => 3]);
              $pengajuan=pengajuan::all();
            
            
            return view('admins.daftar', compact('pengajuan'))->with('pesan','Berhasil Menerima pengajuan');
    
    }
    public function tolak($id){
        $update=pengajuan::where('id', $id)
              ->update(['status' => 1]);
              $pengajuan=pengajuan::all();

            


        return view('admins.daftar', compact('update','pengajuan'))->with('pesan','Pengajuan ditolak');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $status = config('status.status');
        $user_id = auth()->user()->id;
        $pengajuan = pengajuan::find($id);
        $domain = domain::all();
        return view('admins.domain.create',compact('pengajuan','user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $id_pengajuan=pengajuan::find($id);
        $domain=domain::insertGetId([
            'id_pengajuan'=>$id_pengajuan->id,
            'ip' => $request->ip,
            'username'=>$request->username,
            'password'=>$request->password,
            'created_at'=>now()
        ]);
        return redirect()->route('indexname')->with('pesan','Berhasil Ajukan Pembuatan Domain');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profiladmin()
    {
        $user_id = auth()->user()->id;
        $admins = admin::where('id',$user_id)->get();
        return view('admins.profil',compact('admins'));
    }
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
