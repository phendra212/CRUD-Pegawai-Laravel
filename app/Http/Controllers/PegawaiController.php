<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    //memanggil index di resource pegawai
    public function index(Request $request){
                                                                            
        //searching
        if($request -> has('cari')){
            $data_pegawai = \App\Pegawai::where('nama_panggilan','LIKE','%'.$request -> cari.'%') -> get();
        }else{
            $data_pegawai = \App\Pegawai::all();
        }
        return view ('pegawai.index',['data_pegawai' => $data_pegawai]);
    }   

    public function create (Request $request){
        //validasi input data
        $this -> validate ($request,[
            'nama_panggilan' => 'required|min:3',
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'divisi' => 'required',
            'agama' => 'required',
            'picture' => 'mimes:jpg,png',
        ]);

        //insert table ke user
        $user = new \App\User;
        $user -> role = 'pegawai';
        $user -> name = $request -> nama_panggilan;
        $user -> email = $request -> email;
        $user -> password = bcrypt('password');
        $user -> remember_token = Str::random(60);
        $user ->save();

         //input table pegawai
         $request -> request ->add(['user_id' => $user->id]);
         $pegawai =  \App\Pegawai::create($request -> all());
         if($request -> hasFile('picture')){
            $request -> file('picture') -> move('images/',$request->file('picture')->getClientOriginalName());
            $pegawai -> picture = $request -> file('picture') -> getClientOriginalName();
            $pegawai -> save();
        }
        return redirect('/pegawai') -> with('Sukses','Data Berhasil Diinput');
    }

    public function edit ($id){
        $pegawai = \App\Pegawai::find($id);
        return view('pegawai/edit', ['pegawai' => $pegawai]);
    }

    public function update (Request $request,$id){
        $pegawai = \App\Pegawai::find($id);
        $pegawai -> update ($request -> all());
        if($request -> hasFile('picture')){
            $request -> file('picture') -> move('images/',$request->file('picture')->getClientOriginalName());
            $pegawai -> picture = $request -> file('picture') -> getClientOriginalName();
            $pegawai -> save();
        }
        return redirect ('/pegawai') -> with('Sukses', 'Data Berhasil Diupdate');
    }

    public function delete ($id){
        $pegawai = \App\Pegawai::find($id);
        $pegawai -> delete($pegawai);
         return redirect ('/pegawai') -> with('Sukses', 'Data Berhasil Didelete');
    }

    public function profile ($id){
        $pegawai = \App\Pegawai::find($id);
        $bonus = \App\Jabatan::all();
        $user = \App\User::all();
         return view ('pegawai.profile',['pegawai' => $pegawai,'bonus' => $bonus,'user' => $user]);
    }

    public function addbonus (Request $request,$idpegawai){
        $pegawai = \App\Pegawai::find($idpegawai);
        // validasi bonus agar tidak double
        $pegawai -> jabatan() -> attach($request -> jabatan,['gaji' => $request -> gaji]);
        return redirect ('pegawai/'.$idpegawai.'/profile')->with('Sukses','Bonus berhasil ditambahkan');
    }

    public function deletebonus ($idpegawai,$idjabatan){
        $pegawai = \App\Pegawai::find($idpegawai);
        $pegawai -> jabatan() -> detach($idjabatan);
        return redirect() -> back() -> with('Sukses','Bonus berhasil dihapus');
    }

    
}
