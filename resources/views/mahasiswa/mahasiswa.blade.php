@extends('layouts.base')
@section('content')
<div class="header bg-primary pb-6">
  
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>List Rancangan Judul Tugas Akhir</b></div>
                  {{--  --}}
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
                    <div class="card-body">
                          <div class="card">
                          <!-- <a class="btn btn-primary" href = "/mahasiswa/tambah">Ajukan Judul</a> -->
                    <div class="table-responsive">
<div>
    <table class="table align-items-center table-dark" style="text-align:center">
        <thead class="thead-dark">
            <tr>
              <!-- <th scope="col" class="sort" data-sort="nim">NIM</th> -->
              <th scope="col" class="sort" data-sort="status">Status</th>
                <th scope="col" class="sort" data-sort="judul">Judul yang Diajukan</th>
                <th scope="col" class="sort" data-sort="dosbing">Dosen Pembimbing</th>
                <th scope="col" class="sort" data-sort="status">Pesan Dosen</th>
                <!-- <th scope="col">Users</th> -->
                <!-- <th scope="col" class="sort" data-sort="aksi">Aksi</th> -->
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody class="list">
            @forelse($rancangan as $rancangan)
            <tr>
              
              <td>
                {!!$rancangan->status_text!!}
              </td>
                <td class="budget">
                {{$rancangan->judul}}
                </td>
                <td>
                   @forelse ($rancangan->detail as $it)
                       <div>
                         {{$it->dosen->nama}}
                       </div>
                   @empty
                       <div>
                         Belum Ada
                       </div>
                   @endforelse
                </td>
                

                <td>
                  @if ($rancangan->catatan_dosen)
                          {{$rancangan->catatan_dosen}}
                          @else
                          Belum Ada Pesan
                          @endif
                </td>
                <td>
                    @if ($rancangan->status==2)
                    <a type="button" class="btn btn-primary btn-sm" href="{{route('detail',[$rancangan->id])}}">Detail</a>
                    @else
                    Tidak Tersedia
                    @endif
                </td>

            </tr>
            @empty
            <tr>
              <td colspan="5">Belum ada list judul TA</td>
            <tr>
            @endforelse
            </tbody>
            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection