@extends('layouts.baseadmin')
@section('content')
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><b>Daftar Domain</b></div>

                        @if (session('pesan'))
                        <h5 class="card-title">
                        <div class="alert alert-success" role="alert">
                            <i class="ni ni-like-2"></i> {{session('pesan')}}
                        </div>
                        </h5>
                        @endif
                        @if (session('pesans'))
                        <h5 class="card-title">
                        <div class="alert alert-warning" role="alert">
                            <i class="ni ni-like-2"></i> {{session('pesans')}}
                        </div>
                        </h5>
                        @endif
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            Cek Kembali Input Anda !!
                        </div>
                        @endif
                  <center>
                   <a type="button" class="btn btn-outline-primary col-md-11" href = "{{route('pengelolaIndex')}}">Tambah Pengajuan Domain</a> <br>
                  </center>
                    <div class="card-body">
                         <div class="card">
                         	
<div class="table-responsive">
            <table class="table align-items-center table-dark" style="text-align: center;">
                <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>ID Pengajuan</th>
                    <th>Alamat Domain</th>
                    <th>Nama Pengelola</th>
                    <th>IP Address</th>
                    <th>Username</th>
                    <th>Aksi</th>
                    <th>Pesan</th>
                </tr>
                </thead>
                <tbody>
                @forelse($domain as $domain)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <!-- {@if($domain->id_platform==1)
                            {
                                Wordpress
                            }
                            @elseif($domain->id_platform==2)
                            {
                                CMS
                            }
                            @else
                            {
                                belum memilih
                            }
                            @endif} -->
                            {{$domain->id_pengajuan}}
                            
                        </td>
                        <td>{{$domain->pengajuan->nama_domain}}</td>
                        <td>
                        {{$domain->pengajuan->pengelola->name}}
                        </td>
                        <td>
                        {{$domain->ip}}
                        </td>
                        <td>
                          {{$domain->username}}
                        </td>
                        <td>
                          <a href=""  title="Edit" ><i class="fa fa-edit btn btn-primary btn-sm" aria-hidden="true"></i></a>
                          <a href="" title="Delete" ><i class="fa fa-trash btn btn-danger btn-sm" aria-hidden="true"></i></a>
                        </td>

                        <td>
                          @if ($domain->pesan)
                          {{$domain->pesan}}
                          @else
                          Belum Ada Pesan
                          @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Belum Menerima Domain :)</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
</div>
        </div>

        <div class="card-footer">

        </div>

    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection