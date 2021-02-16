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
                    
                    <div class="card-body">
                         <div class="card">
                         	
<div class="table-responsive">
            <table class="table align-items-center table-dark" style="text-align: center;">
                <thead class="thead-dark">
                <tr>
                    <th>Nama</th>
                    <th>No Identitas</th>
                    <th>E - Mail</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @forelse($admins as $ra)
                    <tr>
                        <td>
                            {{$ra->name}}
                        </td>
                        <td>
                        {{$ra->no_identitas}}
                        </td>
                        <td>
                        {{$ra->email}}
                        </td>
                        <td>
                        <a href="" class="btn btn-primary btn-sm " ><i class="far fa-edit" aria-hidden="true"></i></a>
                        </td>
                         
                @empty
                    <tr>
                        <td colspan="5">Belum ada list ide TA</td>
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