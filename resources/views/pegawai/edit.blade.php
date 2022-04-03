@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Data Pegawai</h3>
                </div>
                <div class="panel-body">
                    <form action="/pegawai/{{$pegawai -> id}}/update" method="POST" enctype="multipart/form-data">
                        {{ csrf_field( ) }}
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama Panggilan</label>
                          <input name="nama_panggilan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                          placeholder="Masukkan nama panggilan" value="{{$pegawai -> nama_panggilan}}">
                        </div>
            
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Lengkap</label>
                            <input name="nama_lengkap" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                            placeholder="Masukkan nama langkap" value="{{$pegawai -> nama_lengkap}}">
                          </div>
                        
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                              <option value="L" @if($pegawai -> jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                              <option value="P" @if($pegawai -> jenis_kelamin == 'P') selected @endif>Perempuan</option>
                            </select>
                        </div>
            
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Pilih Departemen</label>
                            <select name="divisi" class="form-control" id="exampleFormControlSelect1">
                              <option value="HRD" @if($pegawai -> divisi == 'HRD') selected @endif>HRD</option>
                              <option value="Keuangan" @if($pegawai -> divisi == 'Keuangan') selected @endif>Keuangan</option>
                              <option value="Marketing" @if($pegawai -> divisi == 'Marketing') selected @endif>Marketing</option>
                            </select>
                        </div>
            
                        <div class="form-group">
                            <label for="exampleInputEmail1">Agama</label>
                            <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                            placeholder="Masukkan Agama" value="{{$pegawai -> agama}}">
                          </div>
            
                          <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$pegawai -> alamat}}</textarea>
                          </div>

                          <div class="form-group">
                            <label for="exampleFormControlTextarea1">Foto Profil</label>
                            <input type="file" name="picture" class="form-control">
                          </div>
            
                          <button type="submit" class="btn btn-dark">Update</button>
                </form>
                </div>
            </div>
            </div>
          </div> 
        </div>
    </div>
</div>      
@stop

@section('content1')

<h1>Edit Data Pegawai</h1>

@if(session('Sukses'))
<div class="alert alert-success" role="alert">
  {{session('Sukses')}}
 </div>
 @endif

  <div class="row">
      <div class="col-lg-12">
        <form action="/pegawai/{{$pegawai -> id}}/update" method="POST">
            {{ csrf_field( ) }}
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Panggilan</label>
              <input name="nama_panggilan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
              placeholder="Masukkan nama panggilan" value="{{$pegawai -> nama_panggilan}}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Nama Lengkap</label>
                <input name="nama_lengkap" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                placeholder="Masukkan nama langkap" value="{{$pegawai -> nama_lengkap}}">
              </div>
            
            <div class="form-group">
                <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                  <option value="L" @if($pegawai -> jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                  <option value="P" @if($pegawai -> jenis_kelamin == 'P') selected @endif>Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Pilih Departemen</label>
                <select name="divisi" class="form-control" id="exampleFormControlSelect1">
                  <option value="HRD" @if($pegawai -> divisi == 'HRD') selected @endif>HRD</option>
                  <option value="Keuangan" @if($pegawai -> divisi == 'Keuangan') selected @endif>Keuangan</option>
                  <option value="Marketing" @if($pegawai -> divisi == 'Marketing') selected @endif>Marketing</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Agama</label>
                <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                placeholder="Masukkan Agama" value="{{$pegawai -> agama}}">
              </div>

              <div class="form-group">
                <label for="exampleFormControlTextarea1">Alamat</label>
                <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$pegawai -> alamat}}</textarea>
              </div>

              <button type="submit" class="btn btn-dark">Update</button>
    </form>
      </div>
    
  </div>

@endsection