<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\V_tbbarang;
use App\Model\Barang;
use App\Model\Kategori;

class TransaksiController extends Controller
{
     public function index(){
        $transaksijual = V_tbbarang::all();
        $kategori = Kategori::all();
    	return view('transaksijual',['transaksijual' => $transaksijual,'kategori' => $kategori]);
    }

     public function merkAjax($id){
        if($id==0){
            $transaksijual = V_tbbarang::all();
        }else{
            $transaksijual = V_tbbarang::where('kd_kategori','=',$id)->get();
        }
        return $transaksijual;
    }

    // public function search($nm_barang)
    // {    
    //       $transaksijual = V_tbbarang::where('nm_barang','=',$nm_barang)->get();
 
    //       return $transaksijual;
            
    // } 

}
