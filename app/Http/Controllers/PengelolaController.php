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
    public function status_count()
    {
        $user_id = auth()->user()->id;
        $pengelola = pengelola::where('id',$user_id)->first();
        $pengajuan = pengajuan::where('id_user',$user_id)->get();
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
    public function daftarpengelola()
    {
        $pengelola=pengelola::all();
        $unit=unit::all();
        return view('login.register',compact('unit','pengelola'));
    }
    public function index()
    {
        $status_count=$this::status_count();
        $status_pengajuan= $status_count['status_pengajuan'];
        $status_diterima = $status_count['status_diterima'];
        $status_ditolak=$status_count['status_ditolak'];
       
        $status = config('status.status');
        $user_id = auth()->user()->id;
        $pengelola = pengelola::where('id',$user_id)->first();
        $pengajuan = pengajuan::where('id_user',$user_id)->get();

        $platform = platform::all();
        return view('pengelola.index', compact('pengajuan','platform','user_id','status','pengelola','status_pengajuan','status_diterima','status_ditolak'));
    }

    public function home()
    {
        $status_count=$this::status_count();
        $status_pengajuan= $status_count['status_pengajuan'];
        $status_diterima = $status_count['status_diterima'];
        $status_ditolak=$status_count['status_ditolak'];
        $user_id = auth()->user()->id;
        $pengelola = pengelola::where('id',$user_id)->first();
        $pengajuan = pengajuan::where('id_user',$user_id)->get();
        
        return view('pengelola.pengelola',compact('pengelola','user_id','pengajuan','status_pengajuan',
        'status_diterima','status_ditolak'));
    }
    public function hitung_status(){
        $user_id = auth()->user()->id;
        $pengelola = pengelola::where('id',$user_id)->first();
        $pengajuan = pengajuan::where('id_user',$user_id)->get();
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
    
    public function daftardomain(Request $request)
    {
        $status= $request->status;
        $user_id = auth()->user()->id;
        $pengajuan = pengajuan::where('id_user',$user_id)->get();
        $platform = platform::all();
        $status_count=$this::status_count();
        $status_pengajuan= $status_count['status_pengajuan'];
        $status_diterima = $status_count['status_diterima'];
        $status_ditolak=$status_count['status_ditolak'];
        $pengajuan = pengajuan::where('status',$status)->where('id_user',$user_id)->get();
        return view('pengelola.list',compact('pengajuan','platform','status','status_pengajuan','status_diterima','status_ditolak'));
    }
    public function detailprofil()
    {
        $status_count=$this::status_count();
        $status_pengajuan= $status_count['status_pengajuan'];
        $status_diterima = $status_count['status_diterima'];
        $status_ditolak=$status_count['status_ditolak'];
        $user_id = auth()->user()->id;
        $unit = unit::all();
        $pengelola = pengelola::find($user_id);
        return view('pengelola.profil.edit',compact('pengelola','unit','status_pengajuan','status_diterima','status_ditolak'));
    }
    public function profil()
    {
        $status_count=$this::status_count();
        $status_pengajuan= $status_count['status_pengajuan'];
        $status_diterima = $status_count['status_diterima'];
        $status_ditolak=$status_count['status_ditolak'];
        $user_id = auth()->user()->id;
        $pengelola = pengelola::where('id',$user_id)->get();
        return view('pengelola.profil',compact('pengelola','status_pengajuan','status_diterima','status_ditolak'));
    }
    public function detaildomain()
    {
        $status_count=$this::status_count();
        $status_pengajuan= $status_count['status_pengajuan'];
        $status_diterima = $status_count['status_diterima'];
        $status_ditolak=$status_count['status_ditolak'];
        $user_id = auth()->user()->id;
        $pengajuan=pengajuan::where('id_user',$user_id)->get();
        $domain = domain::join('pengajuans','pengajuans.id','=','domains.id_pengajuan')->where('pengajuans.id_user','=',$user_id)->first();
        $domain = domain::where('id_pengajuan',$domain->id_pengajuan)->first();
        return view('pengelola.detail',compact('domain','status_pengajuan','status_diterima','status_ditolak'));
        // $pengajuan=pengajuan::where('id',$domain->id)->get();
        // if($pengajuan!=null){
        //     $domain = domain::where('id_pengajuan',$pengajuan->id)->get();
        //     return view('pengelola.detail',compact('domain','pengajuan'));
        // }
        // else{
        //     $domain=domain::find($id);
        //     return view('pengelola.detail',compact('pengajuan','domain'));
        // }
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


    public function lihatdomain()
    {
        $status_count=$this::status_count();
        $status_pengajuan= $status_count['status_pengajuan'];
        $status_diterima = $status_count['status_diterima'];
        $status_ditolak=$status_count['status_ditolak'];
        $status = config('status.status');
        $user_id = auth()->user()->id;
        $pengajuan=pengajuan::where('id_user',$user_id)->get();
        $domain = domain::join('pengajuans','pengajuans.id','=','domains.id_pengajuan')->where('pengajuans.id_user','=',$user_id)->get();
        //dd($domain);
        return view('pengelola.lihatdomain',compact('domain','pengajuan','status_pengajuan','status_diterima','status_ditolak'));
        
        // dd($pengajuan[$counter]);
        
        // if($pengajuan!=null){
        //     $domain = domain::where('id_pengajuan',$pengajuan->id)->get();
            
        // }
        // else{
        //     $domain=domain::find($id);
        //     return view('pengelola.lihatdomain',compact('pengajuan','domain'));
        // }
        
        
        
    }

    public function storepengajuan(Request $request){
        $request->validate([
            'id_platform'=>'required',
            'nama_domain'=>'required',
            'desk_domain'=>'required',
            'surat'=>'required',
        ]);
        
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


        return redirect()->route('daftardomain',['status'=> 0])->with('pesan','Berhasil Ajukan Pembuatan Domain');
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
    public function confirm(Request $request, $id)
    {
        $status_count=$this::status_count();
        $status_pengajuan= $status_count['status_pengajuan'];
        $status_diterima = $status_count['status_diterima'];
        $status_ditolak=$status_count['status_ditolak'];
        $request->validate([
            'password'=>'required',
        ]);
        $pengelola =pengelola::find($id);
        
        if($pengelola->password == $request->password)
        {
            return redirect()->route('detailprofil',[$pengelola->id]);
        }
        else
        {
            return view('pengelola.profil', compact('pengelola','status_pengajuan','status_diterima','status_ditolak'))->with('pesan','Password Salah');
        }
    }
    public function editprofil(Request $request)
    {
        $status_count=$this::status_count();
        $status_pengajuan= $status_count['status_pengajuan'];
        $status_diterima = $status_count['status_diterima'];
        $status_ditolak=$status_count['status_ditolak'];
        $user_id = auth()->user()->id;
        $request->validate([
            'name' => 'required',
            'penanggung_jawab' => 'required',
            'telp' => 'required',
            'email' => 'required'
        ]);

       pengelola::where('id', $user_id)
              ->update([
                'name' => $request->name,
                'penanggung_jawab' => $request->penanggung_jawab,
                'id_unit'=>$request->id_unit,
                'telp' => $request->telp,
                'email' => $request->email
              ]);

        $pengelola = pengelola::where('id',$user_id)->get();
        return view('pengelola.profil', compact('pengelola','status_pengajuan','status_diterima','status_ditolak'))->with('pesan','Berhasil Edit profil');
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
