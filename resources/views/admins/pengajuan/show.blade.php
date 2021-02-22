@extends('layouts.baseadmin')
@section('content')
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header"><b>Detail Pengajuan Domain</b></div>
            <div class="card-body">
              <form action="" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Pengelola</label>
                    <input type="text" class="form-control form-control-muted" disabled value="{{$pengajuan->pengelola->name}}" disabled>
                </div>
                <div class="form-group">
                    <label for="penanggung_jawab">Penanggung Jawab</label>
                    <input type="text" class="form-control form-control-muted" disabled value="{{$pengajuan->pengelola->penanggung_jawab}}">
                </div>
                <div class="form-group">
                    <label for="unit">Unit</label>
                    <input type="text" class="form-control form-control-muted" disabled value="{{$pengajuan->pengelola->unit->nama_unit}}">
                </div>
                <div class="form-group">
                    <label for="telp">Telephone</label>
                    <input type="text" class="form-control form-control-muted" disabled value="{{$pengajuan->pengelola->telp}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control form-control-muted" disabled value="{{$pengajuan->pengelola->email}}">
                </div>
                <div class="form-group">
                    <label for="platform">Platform</label>
                    <input type="text" class="form-control form-control-muted" disabled value="{{$pengajuan->platform->nama_platform}}">
                </div>
                <div class="form-group">
                    <label for="nama_domain">Nama Domain</label>
                    <input type="text" class="form-control form-control-muted" disabled value="{{$pengajuan->nama_domain}}">
                </div>
                <div class="form-group">
                    <label for="desk_domain">Deskripsi Domain</label>
                    <input type="text" class="form-control form-control-muted" disabled value="{{$pengajuan->desk_domain}}">
                </div>

                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <a class="btn btn-primary" href="/admins/daftardomain">OK</a>
                    </div>
                    </div>
                </div>

              
                                
                        

            </div>
          </div>
        </div>
      </div>
</form>
@endsection