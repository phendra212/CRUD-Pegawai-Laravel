<?php

namespace App\Http\Controllers;
use App\Pegawai;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index (){
        $pegawai = Pegawai::all();
        //objek total bonus
        $pegawai -> map(function($p){
            $p -> total = $p ->total();
            return $p;
        });
        //sort bonus
        // $pegawai = $pegawai -> sortBy('total');
        //send data
        return view('dashboard.index',['pegawai' => $pegawai]);
    }


}
