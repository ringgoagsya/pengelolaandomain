<?php

namespace App\Http\Controllers;

use App\pengelola;
use App\login_pengelola;
use App\platform;
use App\pengajuan;
use App\unit;
use App\domain;
use Illuminate\Http\Request;

class PengelolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:pengelolas');
    }
    public function daftarpengelola()
    {
        $pengelola=pengelola::all();
        $unit=unit::all();
        return view('login.register',compact('unit','pengelola'));
    }
    public function index()
    {
       
        $status = config('status.status');
        $user_id = auth()->user()->id;
        $pengelola = pengelola::where('id',$user_id)->first();
        $pengajuan = pengajuan::where('id_user',$user_id)->get();

        $platform = platform::all();
        return view('pengelola.index', compact('pengajuan','platform','user_id','status','pengelola'));
    }

    public function home()
    {
        $pengelola=pengelola::all();
        $user_id = auth()->user()->id;
        return view('pengelola.pengelola',compact('pengelola','user_id'));
    }
    
    public function daftardomain(Request $id)
    {
        $status = config('status.status');
        $user_id = auth()->user()->id;
        $pengajuan = pengajuan::where('id_user',$user_id)->get();
        $platform = platform::all();
        return view('pengelola.list',compact('pengajuan','platform','status'));
    }
    public function detailprofil($id)
    {
        $user_id = auth()->user()->id;
        $unit = unit::all();
        $pengelola = pengelola::find($id);
        return view('pengelola.profil.edit',compact('pengelola','unit'));
    }
    public function profil()
    {
        $user_id = auth()->user()->id;
        $pengelola = pengelola::where('id',$user_id)->get();
        return view('pengelola.profil',compact('pengelola'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit=unit::all();
        return view('login.register', compact('unit'));
    }


    public function lihatdomain(Request $id)
    {
        $status = config('status.status');
        $user_id = auth()->user()->id;
        $pengajuan=pengajuan::where('id_user',$user_id)->first();
        if($pengajuan!=null){
            $domain = domain::where('id_pengajuan',$pengajuan->id)->get();
            return view('pengelola.lihatdomain',compact('domain','pengajuan'));
        }
        else{
            $domain=domain::find($id);
            return view('pengelola.lihatdomain',compact('pengajuan','domain'));
        }
        
        
        
    }

    public function storepengajuan(Request $request){
        
        $status = config('status.status');
        $user_id = auth()->user()->id;
        $pengajuan = pengajuan::where('id_user',$user_id)->get();
        $platform = platform::all();
        $id_counter = pengajuan::count();
        $id_pengajuan = $id_counter++;
        $pesan_default = 'Belum ada Pesan';
        
        $folder = 'public/sertifikat';
        $filename = $id_pengajuan.'_Surat_'.$user_id.'_'. $request->file('surat')->getClientOriginalName();
        $filepath = $request->surat->storeAs($folder,$filename);

        $pengajuan = pengajuan::insertGetId([
            'id_user'=> $user_id,
            'id_platform' => $request->id_platform,
            'nama_domain' => $request->nama_domain,
            'desk_domain' => $request->desk_domain,
            'surat' => $filename,
            'status' => 0,
            'pesan' =>  $pesan_default,
            'created_at'=>now()
        ]);




        return redirect()->route('daftardomain')->with('pesan','Berhasil Ajukan Pembuatan Domain');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pengelola  $pengelola
     * @return \Illuminate\Http\Response
     */
    public function show(pengelola $pengelola)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pengelola  $pengelola
     * @return \Illuminate\Http\Response
     */
    public function edit(pengelola $pengelola)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pengelola  $pengelola
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pengelola $pengelola)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pengelola  $pengelola
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengelola $pengelola)
    {
        //
    }
}
