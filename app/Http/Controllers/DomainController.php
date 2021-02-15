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
    public function show(domain $domain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function edit(domain $domain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, domain $domain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function destroy(domain $domain)
    {
        //
    }
}
