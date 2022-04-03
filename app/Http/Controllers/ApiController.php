<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function editbonus (Request $request,$id){
        $pegawai = \App\Pegawai::find($id);
        $pegawai -> jabatan() -> updateExistingPivot($request -> pk,['gaji' => $request -> value]); 
    }
}
