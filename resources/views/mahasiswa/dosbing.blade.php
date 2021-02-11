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
              <form action="{{route('storeide')}}" method="post">
              {{csrf_field()}}
              <div class="form-group">
                <label for="">Unit/ Bagian</label>
                <select id="Unit" name="cars" class="form-control">
                  <option value="">FTI</option>
                  <option value="">FK</option>
                </select>
                
              </div>
              <div class="form-group">
                <label for="">Penanggung Jawab</label>
                <input type="text" name="" id="" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Nama Pengelola</label>
                <input type="text" name="" id="" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Email Pengelola</label>
                <input type="text" name="" id="" class="form-control">
              </div>
              <div class="form-group">
                <label for="">No. Hp</label>
                <input type="text" name="" id="" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Nama Domain</label>
                <input type="text" name="" id="" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Deskripsi Domain</label>
                <input type="textarea" name="" id="" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Platform</label>
                <select id="Unit" name="cars" class="form-control">
                  
                  <option value="cms">CMS</option>
                  <option value="wordpress">wordpress</option>
                </select>
                
              </div>
              <div class="form-group">
                <label for="">Keterangan</label>
                <input type="textarea" name="" id="" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Keterangan</label>
                <input type="text" name="" id="" class="form-control">
              </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <form action="" method="Post" enctype="multipart/form-data">
                      @csrf
                      {{-- Upload --}}
                          <label class="bmd-label-floating" for="file_surat">Upload</label>
                          <div class="input-group">
                          <input type="file" class="form-control" name="file_surat" id="file_surat">
                          </div>
                      </form>
                    </div> 
                  </div>
                </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <a class="btn btn-danger" href="{{route('list')}}">Cancel</a>
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