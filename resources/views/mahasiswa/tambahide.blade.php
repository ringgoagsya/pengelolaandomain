@extends('login.layouts.base')
@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            	<a href="{{route('list')}}">Kembali</a>
                <div class="card">
                	<div class="card-header"><b>Pilih Bidang Konsentrasi</b></div>
                    <div class="card-body">
                      @foreach($bidang as $bid)
                      <form action="{{route('dosbing', [$bid->id] )}}" method="post">
                        {{csrf_field()}}
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group" style="position: center;">
                                  <a href="{{route('dosbing', [$bid->id] )}}"  type="button" class="btn btn-outline-primary" style="width: 500px; margin-left: 200px;"><i class="fa fa-check" aria-hidden="true"></i> {{$bid->nama}}</a>
                                    @endforeach
                                </div>
                              </div>
                            </div>
                        </div>
                      </form>
                    </div>
                </div>
              </div>
        </div>
    </div>
  @endsection
