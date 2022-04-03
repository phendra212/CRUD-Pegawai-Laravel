@extends('layouts.master')

@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@endsection

@section('content')

<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            {{-- alert sukses --}}
            @if(session('Sukses'))
                <div class="alert alert-success" role="alert">
                {{session('Sukses')}}
                </div>
                @endif
            <div class="panel panel-profile">
                <div class="clearfix">
                    <!-- LEFT COLUMN -->
                    <div class="profile-left">
                        <!-- PROFILE HEADER -->
                        <div class="profile-header">
                            <div class="overlay"></div>
                            <div class="profile-main">
                                <img src="{{$pegawai -> getPicture()}}" class="img-circle" alt="Avatar" width="220px">
                                <h3 class="name">{{$pegawai -> nama_panggilan}}</h3>
                            </div>
                            <div class="profile-stat">
                                <div class="row">
                                    <div class="col-md-4 ">
                                       
                                    </div>
                                    <div class="col-md-4 ">
                                        {{$pegawai -> jabatan -> count()}} <span>Jumlah Bonus</span>
                                    </div>
                                    <div class="col-md-4">
                                         
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <!-- END PROFILE HEADER -->
                        <!-- PROFILE DETAIL -->
                        
                        <!-- END PROFILE DETAIL -->
                    </div>
                    <!-- END LEFT COLUMN -->
                    <!-- RIGHT COLUMN -->
                    <div class="profile-right">
                        <button type="button" class="btn btn-info" data-toggle="modal" 
                        data-target="#exampleModal">Tambah Bonus</button>
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Daftar Bonus</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Lama Bekerja</th>
                                            <th>Bonus</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pegawai -> jabatan as $jabatan)
                                        <tr>
                                            <td>{{$jabatan -> kode}}</td>
                                            <td>{{$jabatan -> nama}}</td>
                                            <td>{{$jabatan -> lama_bekerja}}</td>
                                            <td><a href="#" class="bonus" data-type="text" data-pk="{{$jabatan -> id}}" data-url="/api/pegawai/{{$pegawai -> id}}/editbonus" data-title="Masukkan Bonus">
                                                {{$jabatan -> pivot -> gaji}}</a></td>
                                            <td>
                                                <a href="/pegawai/{{$pegawai -> id}}/{{$jabatan -> id}}/deletebonus" class="btn btn-danger" 
                                                    onclick="return confirm ('Apakah data ingin dihapus?')">Delete</a>
                                            </td>
                                        </tr>  
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="profile-detail">
                            <div class="profile-info">
                                <h4 class="heading">Data Diri Pegawai</h4>
                                <ul class="list-unstyled list-justify">
                                    <li>Nama Lengkap <span>{{$pegawai -> nama_lengkap}}</span></li>
                                    <li>Jenis Kelamin <span>{{$pegawai -> jenis_kelamin}}</span></li>
                                    <li>Divisi <span>{{$pegawai -> divisi}}</span></li>
                                    <li>Agama <span>{{$pegawai -> agama}}</span></li>
                                    <li>Alamat <span>{{$pegawai -> alamat}}</span></li>
                                </ul>
                            </div>
                            <div class="text-center"><a href="/pegawai/{{$pegawai -> id}}/edit" class="btn btn-danger">Edit Profile</a></div>
                        </div>
                        <!-- END TABBED CONTENT -->
                    </div>
                    <!-- END RIGHT COLUMN -->
                </div>
            </div>
        </div>
        
    </div>
    <!-- END MAIN CONTENT -->
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/pegawai/{{$pegawai -> id}}/addbonus" method="POST" enctype="multipart/form-data">
                {{ csrf_field( ) }}

                <div class="form-group">
                    <label for="jabatan">Pilih Bonus</label>
                    <select  class="form-control" id="jabatan" name="jabatan">
                        @foreach ($bonus as $bns)
                        <option value="{{$bns ->id}}">{{$bns -> nama}}</option>
                        @endforeach
                    </select>
 
                <div class="form-group {{$errors -> has('nama_panggilan') ? ' has-error' : ''}}">
                  <label for="exampleInputEmail1">Gaji</label>
                  <input name="gaji" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                  placeholder="Masukkan Bonus" value="{{old('gaji')}}">
                  @if($errors -> has('gaji'))
                    <span class="help-block">{{$errors -> first('gaji')}}</span>
                  @endif
                </div>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
      </div>
    </div>
  </div>

@stop

@section('footer')
    {{-- editable on --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script>
        $(document).ready(function() {
         $('.bonus').editable();
            });
    </script>
    
@endsection