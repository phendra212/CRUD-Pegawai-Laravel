<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    //
    protected $table = 'jabatan';
    protected $fillable = ['kode','nama','lama_bekerja'];

    //m2m pegawai
    public function pegawai(){
        
        return $this -> belongsToMany(Pegawai::class)->withPivot(['gaji']);
    }
}
