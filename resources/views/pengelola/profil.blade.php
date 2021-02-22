@extends('layouts.base')
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
                    <div class="card-header"><b>List Pengajuan Domain</b></div>

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
                  
                    <div class="card-body">
                         <div class="card">
                         	
<div class="table-responsive">
            <table class="table align-items-center table-dark" style="text-align: center;">
                <thead class="thead-dark">
                <tr>
                    <th>Nama</th>
                    <th>Penanggung Jawab</th>
                    <th>Unit</th>
                    <th>No.hp</th>
                    <th>E-mail</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @forelse($pengelola as $pengelola)
                    <tr>
                        <td>
                            {{$pengelola->name}}
                        </td>
                        <td>
                        {{$pengelola->penanggung_jawab}}
                        </td>
                        <td>
                        {{$pengelola->unit->nama_unit}}
                        </td>
                        <td>
                        {{$pengelola->telp}}
                        </td>
                        <td>
                        {{$pengelola->email}}
                        </td>
                        
                        <td>
                          <a href="" class="btn btn-primary  btn-sm" title="Edit Profil" data-toggle="modal" data-target="#exampleModal{{$pengelola->id}}" ><i class="far fa-edit" aria-hidden="true" title="Edit Profil"></i></a>
                        </td>
                         

                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Belum ada Profil</td>
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
@section('modal')
<div class="modal fade" id="exampleModal{{$pengelola->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('confirm',[$pengelola->id])}}" method="post">
      @csrf
        <div class="form-group">
            <label for="password">Masukkan password</label>
            <input type="password" name="password" id="password" placeholder="Masukkan password" class="form-control">
        </div>
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </div>
        </div>
    
      </form>
      </div>
    </div>
  </div>
</div>
@endsection