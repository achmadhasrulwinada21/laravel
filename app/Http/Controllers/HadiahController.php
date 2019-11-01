<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Model\Anggota;
use App\Model\Hadiah;
use DataTables;
use Illuminate\Support\Facades\DB;

class HadiahController extends Controller
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

     public function json(){
        // $anggota = Anggota::all();
        $anggota = DB::table('anggota')
            ->select(DB::raw('count(*) as total,anggota.id,anggota.nama,group_concat( hadiah.nama_hadiah SEPARATOR " | ") AS hadiah'))
            ->Join('anggota_hadiah', 'anggota.id', '=', 'anggota_hadiah.anggota_id')
            ->Join('hadiah', 'hadiah.id', '=', 'anggota_hadiah.hadiah_id')
            ->orderBy('anggota.nama', 'asc')
            ->groupBy('anggota.id','anggota.nama')
            ->get();
        return Datatables::of($anggota)
        // ->addColumn('action', function ($anggota) {
        //     foreach($anggota->hadiah as $h){
        //         $btn = '<ul><li>'.$h->nama_hadiah.'</li></ul>';
                
        // }
        // return $btn;         
        //  })
        ->addIndexColumn()
        ->make(true);
    }

     public function index(){
     	 $anggota = DB::table('anggota')
           ->select(DB::raw('count(*) as total,anggota.id,anggota.nama,group_concat(hadiah.nama_hadiah SEPARATOR " | ") AS hadiah'))
            ->Join('anggota_hadiah', 'anggota.id', '=', 'anggota_hadiah.anggota_id')
            ->Join('hadiah', 'hadiah.id', '=', 'anggota_hadiah.hadiah_id')
            ->orderBy('anggota.nama', 'asc')
            ->groupBy('anggota.id','anggota.nama')
            ->get();
     	return view('anggota_hadiah2', ['anggota' => $anggota]);
    }

// public function index()
//     {
//     	$anggota = Anggota::get();
//     	return view('anggota_hadiah', ['anggota' => $anggota]);
//     }

    public function export_excel()
	{
		$anggota = Anggota::get();
    	return view('exporhadiah', ['anggota' => $anggota]);
    }
    
}
