@extends('layouts.baseadmin')
@section('content')
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header"><b>Tambah Domain</b></div>
            <div class="card-body">
              <form action="{{route('updatedomain',$domain->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                <div class="table-responsive">
            <table class="table align-items-center table-dark" style="text-align: center;">
                <thead class="thead-dark"> 
                <tr>
                <td>Nama Domain</td>
                <td>Deskripsi Domain</td>
                <td>Platform</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                <td> {{$domain->pengajuan->nama_domain}}</td>
                <td> {{$domain->pengajuan->desk_domain}}</td>
                <td> {{$domain->pengajuan->platform->nama_platform}} </td>
                </tr>
                </tbody>
                </table>
                <br>
                </div>
                <div class="form-group">
                    <label for="ip">IP Address</label>
                    <input type="text" name="ip" id="ip" value="{{ $domain->ip}}" placeholder="alamat IP" class="form-control">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="{{ $domain->username}}" placeholder="Username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="{{ $domain->password}}" placeholder="password" class="form-control">
                </div>
                

                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <a class="btn btn-danger" href="/admins">Cancel</a>
                        <button type="submit" class="btn btn-primary">Next</button>
                    </div>
                    </div>
                </div>

              
                                
                        

            </div>
          </div>
        </div>
      </div>
</form>
@endsection