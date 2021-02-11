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
                  <center>
                   <a type="button" class="btn btn-outline-primary col-md-11" href = "{{route('pengelolaIndex')}}">Tambah Pengajuan Domain</a> <br>
                  </center>
                    <div class="card-body">
                         <div class="card">
                         	

            <table class="table align-items-center table-dark" style="text-align: center;">
                <thead class="thead-dark">
                <tr>
                    <th>Nama</th>
                    <th>Penanggung Jawab</th>
                    <th>Unit</th>
                    <th>No.hp</th>
                    <th>E-mail</th>
                    <th>-</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @forelse($pengelola as $ra)
                    <tr>
                        <td>
                            {{$ra->name}}
                        </td>
                        <td>
                        {{$ra->penanggung_jawab}}
                        </td>
                        <td>
                        {{$ra->unit->nama_unit}}
                        </td>
                        <td>
                        {{$ra->telp}}
                        </td>
                        <td>
                        {{$ra->email}}
                        </td>
                        <td>
                          {!!$ra->status_text!!}
                        </td>
                        <td>
                          <a href="{{route('tambahjudul',[$ra->id])}}" class="btn btn-primary 
                            @if ($ra->status!=2)
                                disabled
                            @endif
                            btn-sm" ><i class="far fa-edit" aria-hidden="true"></i></a>
                          </td>
                         
                          <td>
                            <a href="{{route('tdos',[$ra->id])}}" class="btn btn-primary btn-sm 
                              @if ($ra->status!=2)
                                  disabled 
                              @endif
                              " ><i class="far fa-edit" aria-hidden="true"></i></a>
                          </td>

                        <td>
                          @if ($ra->catatan_dosen)
                          {{$ra->catatan_dosen}}
                          @else
                          Belum Ada Pesan
                          @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Belum ada list ide TA</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
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