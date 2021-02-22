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
                @forelse($domain as $dom)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            {{$dom->id_pengajuan}}
                            
                        </td>
                        <td>{{$dom->pengajuan->nama_domain}}</td>
                        <td>
                        {{$dom->pengajuan->pengelola->name}}
                        </td>
                        <td>
                        {{$dom->ip}}
                        </td>
                        <td>
                          {{$dom->username}}
                        </td>
                        <td>
                          <a href="{{route('editdomain',[$dom->id])}}"  title="Edit" ><i class="fa fa-edit btn btn-primary btn-sm" aria-hidden="true"></i></a>
                          <a href="#" type="button" title="hapus Domain" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#ModalHapus{{$dom->id}}"><i class="fa fa-trash"></i></a>
                        </td>

                        <td>
                          @if ($dom->pengajuan->pesan)
                          {{$dom->pengajuan->pesan}}
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
@section('modal')
<!-- Button trigger modal -->


<!-- Modal -->
@foreach($domain as $dom)
<div class="modal fade" id="ModalHapus{{$dom->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Menghapus Domain ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
            <form action="{{ route('deletedomain',[$dom->id]) }}" method="post">
            @csrf
            @method('delete')
            <div class="form-group">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button  type="submit" title="Hapus" class="btn btn-danger" class="btn btn-danger">Ya</button>
            </div>
            </form>
            </div>
        </div>
    
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection