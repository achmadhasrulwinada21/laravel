<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Kategori;
use DataTables;
class KategoriController extends Controller
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
        $kategori = Kategori::all();
        return Datatables::of($kategori)
         ->addColumn('action', function ($kategori) {
                return '<center>
                <a href="/kategori/edit/'.$kategori->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button data-id="'.$kategori->id.'" class="btn btn-xs btn-danger" id="hapuskat"><i class="glyphicon glyphicon-trash"></i> Hapus</button></center>';
            }
        )
        ->addIndexColumn()
        ->make(true);
    }

     public function index(){
		$kategori = Kategori::all();
    	return view('kategori',['kategori' => $kategori]);
    }

    public function tambah()
    {

	// memanggil view tambah
	return view('tambahkategori');

  }

  public function insert(Request $request)
    {
    	$this->validate($request,[
			'kd_kategori' => 'required',
			'nm_kategori' =>'required',
    	]);
 
        Kategori::create([
			'kd_kategori' => $request->kd_kategori,
			'nm_kategori' => $request->nm_kategori,
    		]);
 
    	return redirect('/kategori');
    }
    
    	public function edit($id)
{
   $kategori = Kategori::find($id);
   return view('kategori_edit', ['kategori' => $kategori]);
}

public function update($id, Request $request)
{
    $this->validate($request,[
	   'kd_kategori' => 'required',
	   'nm_kategori' =>'required',
	   ]);

      $kategori = Kategori::find($id);
	  $kategori->kd_kategori = $request->kd_kategori;
	  $kategori->nm_kategori = $request->nm_kategori;
      $kategori->save();
    return redirect('/kategori');
}

    public function delete($id) {
        $kategori = Kategori::find($id);
        $kategori->delete();

        $callback = [
            "message" => "Data has been Deleted",
            "code"   => 200
        ];

        return json_encode($callback, TRUE);
    }
}
