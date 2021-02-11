@extends('login.layouts.base')
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
                	<div class="card-header"><b>Input Ide Tugas Akhir</b></div>
                    
                    <div class="card-body">
                        <form action="{{route('storedos',[$id])}}" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Pilih Dosen Pembimbing II</label>
                                <select class="form-control" name="dosen" id="dosen">
                                @foreach ($dosen as $dos)
                                <option value="{{$dos->id}}">{{$dos->nama}}</option>
                                @endforeach
                                </select> 
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
