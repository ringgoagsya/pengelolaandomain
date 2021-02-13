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
        return view('admins.daftar',compact('pengajuan','user_id'));
    }
    public function home()
    {
        $admins=admin::all();
        $user_id = auth()->user()->id;
        return view('admins.admins',compact('admins','user_id'));
    }
    public function terima($id){
        $user_id = auth()->user()->id;
        $data=Detail_dosbing::where('id_dosen', '=', $user_id)
                        ->get();
        $counter = Detail_dosbing::join('rancangan','rancangan.id','=','detail_dosbing.id_rancangan')
                        ->where('detail_dosbing.id_dosen', '=', $user_id)
                        ->where('rancangan.status', '>',1)
                                    ->count();

        if ($counter<=10) {
            # code...
            $updates = Rancangan::where('id', $id)->first();
            Rancangan::where('id', $id)
              ->update(['status' => 2]);
            
            Mahasiswa::where('id', $updates->id_mahasiswa)
              ->update(['status' => 1]);
            
            
            return redirect()->route('Dosen.home', compact('data'))->with('pesan','Berhasil Menerima Mahasiswa');
        } else {
            Rancangan::where('id', $id)
            ->update(['status' => 1,
            'catatan_dosen' => 'Penuh']);
             return redirect()->route('Dosen.home', compact('data'))->with('pesans','Penuh');
        }
    
    }
    public function tolak($id){
        $data = Rancangan::where('id',$id)->first();


        return view('dosen.tolak', compact('data','id'));
        
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
