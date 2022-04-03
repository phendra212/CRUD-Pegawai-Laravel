<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//representasi model pegawai
class Pegawai extends Model
{
    //fix confuse table
    protected $table = 'pegawai';
    protected $fillable = ['nama_panggilan','nama_lengkap','jenis_kelamin','agama','divisi','alamat','picture','user_id'];

    //profile picture untuk yang mash kosong
    public function getPicture(){
        if(!$this -> picture){
            return asset ('images/null.jpg');
        }
        //return foto profil
        return asset ('images/'.$this -> picture );
    }

    // m2m jabatan
    public function jabatan(){
        
        return $this ->  
    }

    public function total(){
        //ambil value 
        $total =0;
        foreach ($this -> jabatan as $jabatan) {
            $total = $total + $jabatan -> pivot -> gaji;
        }
        return $total;
    }
    
}

