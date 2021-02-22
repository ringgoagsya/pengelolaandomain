<?php

namespace App\Http\Controllers;

use App\domain;
use App\pengajuan;
use App\pengelola;

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
        return view('admins.domain.show',compact('domain'));
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
        return view('pengelola.referensi');
    }
    public function referensiadmin()
    {
        return view('admins.referensi');
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
    public function detaildomain($id)
    {
        
        $domain=domain::where('id_pengajuan',$id)->first();
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
        $domain =domain::find($id);
        return view('admins.domain.edit', compact('domain'));
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
