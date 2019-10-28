<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// memanggil model Pengguna
use App\Model\Pengguna;

class PenggunaController extends Controller
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
    	$pengguna = Pengguna::all();
    	
    	return view('show', ['pengguna' => $pengguna]);
    }


}
