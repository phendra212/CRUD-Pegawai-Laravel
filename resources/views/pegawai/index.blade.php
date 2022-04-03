@extends('layouts.master')

@section('content')
  <div class="main">
    <div class="main-content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="panel">
              <div class="panel-heading">
                <h3 class="panel-title">Data Pegawai</h3>
                  <div class="right">
                       <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-file-add"></i></button>
                  </div>
              </div>
              <div class="panel-body">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Nama Panggilan</th>
                      <th>Nama Lengkap</th>
                      <th>Jenis Kelamin</th>
                      <th>Departemen</th>
                      <th>Agama</th>
                      <th>Alamat</th>
                      <th>Bonus</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    {{-- looping isi database --}}
                    @foreach ($data_pegawai as $pegawai)
                    <tr>
                        <td> <a href="/pegawai/{{$pegawai -> id}}/profile"> {{$pegawai -> nama_panggilan}} </a></td>
                        <td> <a href="/pegawai/{{$pegawai -> id}}/profile"> {{$pegawai -> nama_lengkap}} </a> </td>
                        <td>{{$pegawai -> jenis_kelamin}}</td>
                        <td>{{$pegawai -> divisi}}</td>
                        <td>{{$pegawai -> agama}}</td>
                        <td>{{$pegawai -> alamat}}</td>
                        <td>{{$pegawai -> total()}}</td>
                        <td>
                          <a href="/pegawai/{{$pegawai -> id}}/edit" class="btn btn-light">Edit</a>
                          <a href="/pegawai/{{$pegawai -> id}}/delete" class="btn btn-danger" 
                            onclick="return confirm ('Apakah data ingin dihapus?')">Delete</a>
                        </td>
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
  </div>

  {{-- modal tambah data --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="/pegawai/create" method="POST" enctype="multipart/form-data">
                {{ csrf_field( ) }}
                <div class="form-group {{$errors -> has('nama_panggilan') ? ' has-error' : ''}}">
                  <label for="exampleInputEmail1">Nama Panggilan</label>
                  <input name="nama_panggilan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                  placeholder="Masukkan nama panggilan" value="{{old('nama_panggilan')}}">
                  @if($errors -> has('nama_panggilan'))
                    <span class="help-block">{{$errors -> first('nama_panggilan')}}</span>
                  @endif
                </div>
    
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input name="nama_lengkap" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                    placeholder="Masukkan nama langkap" value="{{old('nama_lengkap')}}">
                  </div>

                  <div class="form-group {{$errors -> has('email') ? ' has-error' : ''}}">
                    <label for="exampleInputEmail1">Email</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                    placeholder="Masukkan email" value="{{old('email')}}">
                    @if($errors -> has('email'))
                    <span class="help-block">{{$errors -> first('email')}}</span>
                  @endif
                  </div>
                
                <div class="form-group{{$errors -> has('jenis_kelamin') ? ' has-error' : ''}}">
                    <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                      <option value="Laki - laki"{{(old('jenis_kelamin') == 'Laki - laki') ? ' selected' : ''}}>Laki-laki</option>
                      <option value="Perempuan"{{(old('jenis_kelamin') == 'Perempuan') ? ' selected' : ''}}>Perempuan</option>
                    </select>
                    @if($errors -> has('jenis_kelamin'))
                    <span class="help-block">{{$errors -> first('jenis_kelamin')}}</span>
                  @endif
                </div>
    
                <div class="form-group {{$errors -> has('divisi') ? ' has-error' : ''}}">
                    <label for="exampleFormControlSelect1">Pilih Departemen</label>
                    <select name="divisi" class="form-control" id="exampleFormControlSelect1">
                      <option value="HRD"{{(old('divisi') == 'HRD') ? ' selected' : ''}}>HRD</option>
                      <option value="Keuangan"{{(old('divisi') == 'Keuangan') ? ' selected' : ''}}>Keuangan</option>
                      <option value="Marketing"{{(old('divisi') == 'Marketing') ? ' selected' : ''}}>Marketing</option>
                    </select>
                    @if($errors -> has('divisi'))
                    <span class="help-block">{{$errors -> first('divisi')}}</span>
                  @endif
                </div>
    
                <div class="form-group{{$errors -> has('divisi') ? ' has-error' : ''}}">
                    <label for="exampleInputEmail1">Agama</label>
                    <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                    placeholder="Masukkan Agama" value="{{old('agama')}}">
                    @if($errors -> has('agama'))
                    <span class="help-block">{{$errors -> first('agama')}}</span>
                  @endif
                  </div>
    
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Alamat</label>
                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('alamat')}}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Foto Profil</label>
                    <input type="file" name="picture" class="form-control">
                  </div>
            
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
        </div>
    </div>
    </div>
@stop