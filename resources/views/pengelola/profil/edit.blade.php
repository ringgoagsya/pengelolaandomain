@extends('layouts.base')
@section('content')
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header"><b>Detail User</b></div>
            <div class="card-body">
              <form action=" {{route('editprofil',[$pengelola->id])}} " method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="name">Nama Pengelola</label>
                    <input type="text" class="form-control" name="name" id="name"  value="{{$pengelola->name}}" >
                </div>
                <div class="form-group">
                    <label for="penanggung_jawab">Penanggung Jawab</label>
                    <input type="text" class="form-control" name="penanggung_jawab" id="penanggung_jawab"  value="{{$pengelola->penanggung_jawab}}">
                </div>
                <div class="form-group">
                        <label for="">Unit/ Bagian</label>
                        
                        <select id="id_unit" name="id_unit" class="form-control" >
                        @foreach ($unit as $unit)
                        <option value="{{$unit->id}}">{{$unit->nama_unit}}</option>
                      @endforeach
                        <option value="{{$pengelola->id_unit}}" selected>{{$pengelola->unit->nama_unit}}</option>
                        
                        </select>
                        
                 </div>
                <div class="form-group">
                    <label for="telp">Telephone</label>
                    <input type="text" class="form-control" name="telp" id="telp"  value="{{$pengelola->telp}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email"  value="{{$pengelola->email}}">
                </div>

                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <a class="btn btn-danger" href="/pengelola">Back</a>
                        <button type="submit" class="btn btn-primary" >Update</button>
                    </div>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection
