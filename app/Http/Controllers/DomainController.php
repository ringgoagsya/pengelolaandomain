<?php

namespace App\Http\Controllers;

use App\domain;
use App\pengajuan;
use App\pengelola;
use App\login_pengelola;
use App\platform;
use App\unit;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domain = domain::all();
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
        return view('admins.domain.show',compact('domain','status_pengajuan','status_diterima','status_ditolak'));
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
    public function referensi()
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
        
        return view('pengelola.referensi',compact('status_pengajuan','status_diterima','status_ditolak'));
    }
    public function referensiadmin()
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
        return view('admins.referensi',compact('status_pengajuan','status_diterima','status_ditolak'));
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
     * @param  \App\domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function detaildomain()
    {
        $user_id = auth()->user()->id;
        dd($user_id);
        $domain=domain::where('id_pengajuan',$user_id)->first();
        //dd($domain);
        return view('pengelola.detail',compact('domain'));
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function edit(domain $domain,$id)
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
        $domain =domain::find($id);
        return view('admins.domain.edit', compact('domain','status_pengajuan','status_diterima','status_ditolak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ip'=>'required',
            'username'=>'required',
            'password'=>'required',
        ]);
      domain::where('id',$id)-> update([
            'ip' => $request->ip,
            'username'=>$request->username,
            'password'=>$request->password,
            'updated_at'=>now()
        ]);
        return redirect()->route('indexname')->with('pesan','Berhasil Update Domain');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function destroy(domain $domain,$id)
    {
        $domain = domain::find($id);
        $domain->delete();
        return redirect()->route('indexname')->with('pesan','Berhasil Hapus Domain');
    }
}
