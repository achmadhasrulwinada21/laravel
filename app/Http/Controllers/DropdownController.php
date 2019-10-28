<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Provinsi;
use App\Model\Kabupaten;
use App\Model\Kecamatan;
use App\Model\Kelurahan;

class DropdownController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

      public function index() 
  	{
  		$provinsi = Provinsi::all();
  			return view('dropdownchain',['provinsi' => $provinsi]);
      }
      
      public function getkabupaten($param) 
  	{	
  		 $kabupaten = Kabupaten::where('id_provinsi','=',$param)->pluck("nama","id");
          
        return json_encode($kabupaten);
        }

     public function getkecamatan($param) 
  	{	
  		 $kecamatan = Kecamatan::where('id_kabupaten_kota','=',$param)->pluck("nama","id");
          
        return json_encode($kecamatan);
        }
    
     public function getkelurahan($param) 
  	{	
  		 $kelurahan = Kelurahan::where('id_kecamatan','=',$param)->pluck("nama","id");
          
        return json_encode($kelurahan);
        }
       
    }
