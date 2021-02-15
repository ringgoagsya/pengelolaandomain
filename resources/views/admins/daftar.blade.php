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
                  <!-- <center>
                   <a type="button" class="btn btn-outline-primary col-md-11" href = "{{route('pengelolaIndex')}}">Tambah Pengajuan Domain</a> <br>
                  </center> -->
                    <div class="card-body">
                         <div class="card">
                         	
<div class="table-responsive">
            <table class="table align-items-center table-dark" style="text-align: center;">
                <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Platform</th>
                    <th>Nama Domain</th>
                    <th>Deskripsi Domain</th>
                    <th>Status</th>
                    <th>Aksi</th>
                    <th>Tambah Domain</th>
                    <th>Pesan</th>
                </tr>
                </thead>
                <tbody>
                @forelse($pengajuan as $ra)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <!-- {@if($ra->id_platform==1)
                            {
                                Wordpress
                            }
                            @elseif($ra->id_platform==2)
                            {
                                CMS
                            }
                            @else
                            {
                                belum memilih
                            }
                            @endif} -->
                            {{$ra->platform->nama_platform}}
                            
                        </td>
                        <td>
                        {{$ra->nama_domain}}
                        </td>
                        <td>
                        {{$ra->desk_domain}}
                        </td>
                        <td>
                          {!!$ra->status_text!!}
                        </td>
                        
                        <td>
                        @if ($ra->status==0)
                                  <a href="{{ route('terima', [$ra->id]) }}" type="button" class="btn btn-primary btn-sm"><i class="fas fa-check"></i></a>
                                  <a href="{{ route('tolak', [$ra->id]) }}" type="button" class="btn btn-primary btn-sm"><i class="fa fa-ban" aria-hidden="true"></i>
                                </i></a>

                                @elseif($ra->status==3)
                                <a href="{{ route('terima', [$ra->id]) }}" type="button" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></a>
                                @endif
                        </td>
                        <td>
                          <a href="{{route('adddomain',[$ra->id])}}" class="btn btn-primary 
                            @if ($ra->status!=3)
                                disabled
                            @endif
                            btn-sm" ><i class="far fa-edit" aria-hidden="true"></i></a>
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
                        <td colspan="5">Belum Melakukan Pengajuan :)</td>
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