@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Daftar Bonus Pegawai</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Departemen</th>
                                <th>Jenis Kelamin</th>
                                <th>Bonus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pegawai as $p)
                            <tr>
                                <td>{{$p -> nama_lengkap}}</td>
                                <td>{{$p -> divisi}}</td>
                                <td>{{$p -> jenis_kelamin}}</td>
                                <td>{{$p -> total}}</td>    
                            </tr> 
                            @endforeach
 
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
@stop