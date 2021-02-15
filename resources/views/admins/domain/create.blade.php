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
              <form action="{{route('storedomain',$pengajuan->id)}}" method="post">
                @csrf
                <div class="form-group">

                </div>
                <div class="form-group">
                    <label for="ip">IP Address</label>
                    <input type="text" name="ip" id="ip" placeholder="alamat IP" class="form-control">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="password" class="form-control">
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