@extends('layouts.base')
@section('content')
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header"><b>Form Permohonan Baru</b></div>
            <div class="card-body">
              <form action="{{route('pengajuanstore')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="id_platform">Platform</label>
                    <select id="id_platform" name="id_platform" class="form-control">
                    @foreach ($platform as $platform)
                    <option value="{{$platform->id}}" selected>{{$platform->nama_platform}}</option>
                    @endforeach
                    </select>
                    
                </div>
                <div class="form-group">
                    <label for="nama_domain">Nama Domain</label>
                    <input type="text" name="nama_domain" id="nama_domain" placeholder="Nama Domain" class="form-control">
                </div>
                <div class="form-group">
                    <label for="desk_domain">Deskripsi Domain</label>
                    <input type="textarea" name="desk_domain" id="desk_domain" placeholder="Deskripsi Domain" class="form-control">
                </div>
                
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        @csrf
                        {{-- Upload --}}
                            <label class="bmd-label-floating" for="surat">Upload</label>
                            <div class="input-group">
                            <input type="file" class="form-control" name="surat" id="surat">
                            </div>
                        
                        </div> 
                    </div>
                    </div>

                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <a class="btn btn-danger" href="/pengelola">Cancel</a>
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