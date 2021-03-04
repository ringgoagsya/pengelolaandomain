<?php

namespace App\Http\Controllers;

use App\pengelola;
use App\platform;
use App\pengajuan;
use App\unit;
use App\login_admin;
use App\admin;
use App\domain;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function status()
    {
        $pengajuan = pengajuan::all();
        $status_pengajuan=0;
        $status_diterima=0;
        $status_ditolak=0;
        foreach($pengajuan as $pengajuan){
            if($pengajuan->status ==0 )
            {
                $status_pengajuan++;
            }
            elseif($pengajuan->status ==3 )
            {
                $status_diterima++;
            }
            elseif($pengajuan->status ==1 )
            {
                $status_ditolak++;
            }

        }
        return compact('status_pengajuan','status_diterima','status_ditolak');
    }
    
    public function file(Request $request,$id)
    {   
        $pengajuan = pengajuan::where('id',$id)->first();
        return Storage::disk('local_public')->download($pengajuan->surat);
    }

    public function index(Request $request)
    {
        $status= $request->status;
        $status_rq=$this::status();
        $status_pengajuan= $status_rq['status_pengajuan'];
        $status_diterima = $status_rq['status_diterima'];
        $status_ditolak=$status_rq['status_ditolak'];
        $pengajuan = pengajuan::where('status',$status)->get();
        $domain = domain::all();
        return view('admins.daftar',compact('pengajuan','domain','status_pengajuan','status_diterima','status_ditolak'));
    }
    public function tambahpesan(Request $request,$id)
    {
        
        $request->validate([
            'pesan'=>'required',
        ]);
        pengajuan::where('id', $id)
              ->update(['pesan' => $request->pesan]);
        $status_pengajuan=pengajuan::where('id', $id)->first();
        $status_pengajuan=$status_pengajuan->status;
            
         
            return redirect()->route('indexadmins',['status'=> $status_pengajuan])->with('pesan','Berhasil Menambah Pesan');

    }
    public function home()
    {
        $admins=admin::all();
        $user_id = auth()->user()->id;
        $pengajuan = pengajuan::all();
        $status=$this::status();
        $status_pengajuan= $status['status_pengajuan'];
        $status_diterima = $status['status_diterima'];
        $status_ditolak=$status['status_ditolak'];

        return view('admins.admins',compact('admins','user_id','status_pengajuan','status_diterima','status_ditolak'));
    }
    public function terima($id){

        pengajuan::where('id', $id)
              ->update(['status' => 3]);
              $status_pengajuan=pengajuan::where('id', $id)->first();
        $status_pengajuan=$status_pengajuan->status;
            
            
        return redirect()->route('indexadmins',['status'=> $status_pengajuan])->with('pesan','Berhasil menerima');
    }
    public function tolak($id){
        $update=pengajuan::where('id', $id)
              ->update(['status' => 1]);
              $pengajuan=pengajuan::all();
              $status_pengajuan=pengajuan::where('id', $id)->first();
              $status_pengajuan=$status_pengajuan->status;
                  
                  
              return redirect()->route('indexadmins',['status'=> $status_pengajuan])->with('pesan','Berhasil Menolak');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $status=$this::status();
        $status_pengajuan= $status['status_pengajuan'];
        $status_diterima = $status['status_diterima'];
        $status_ditolak=$status['status_ditolak'];
        $status = config('status.status');
        $user_id = auth()->user()->id;
        $pengajuan = pengajuan::find($id);
        $domain = domain::all();
        return view('admins.domain.create',compact('pengajuan','user_id','status_pengajuan','status_diterima','status_ditolak'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $request->validate([
            'ip' => 'required',
            'username' => 'required',
            'password'=>'required',
        ]);
        $id_pengajuan=pengajuan::find($id);
        $domain=domain::insertGetId([
            'id_pengajuan'=>$id_pengajuan->id,
            'ip' => $request->ip,
            'username'=>$request->username,
            'password'=>$request->password,
            'created_at'=>now()
        ]);
        $status_pengajuan=pengajuan::where('id', $id)->first();
              $status_pengajuan=$status_pengajuan->status;
                  
                  
              return redirect()->route('indexadmins',['status'=> $status_pengajuan])->with('pesan','Berhasil Ajukan Pembuatan Domain');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profiladmin()
    {
        $status=$this::status();
        $status_pengajuan= $status['status_pengajuan'];
        $status_diterima = $status['status_diterima'];
        $status_ditolak=$status['status_ditolak'];
        $user_id = auth()->user()->id;
        $admins = admin::where('id',$user_id)->get();
        return view('admins.profil',compact('admins','status','status_pengajuan','status_diterima','status_ditolak'));
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
