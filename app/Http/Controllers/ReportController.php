<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\V_tbbarang;
use DataTables;
use PDF;

class ReportController extends Controller
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
        $v_tbbarang = V_tbbarang::all();
        return Datatables::of($v_tbbarang)
         ->addColumn('action', function ($v_tbbarang) {
                return '<span>'.$v_tbbarang->deskripsi_barang.'</span>';
            }
        )
        ->addIndexColumn()
        ->make(true);
    }

     public function index(){
		return view('v_tbbarang');
    }

      public function cetak_pdf()
    {
    	$v_tbbarang = V_tbbarang::all();
 
    	$pdf = PDF::loadview('barang_pdf',['v_tbbarang'=>$v_tbbarang]);
      //  return $pdf->download('laporan-barang-pdf');
       return $pdf->stream();
    }

}
