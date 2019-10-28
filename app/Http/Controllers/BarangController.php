<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Barang;
use App\Model\Kategori;
use DataTables;
class BarangController extends Controller
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
        $barang = Barang::all();
        return Datatables::of($barang)
         ->addColumn('action', function ($barang) {
                return '<span>'.$barang->deskripsi_barang.'</span>';
            }
        )
        ->addIndexColumn()
        ->make(true);
    }

     public function index(){
        $barang = Barang::all();
         return view('barang',['barang' => $barang]);
    }

    //  public function show($id){
    
    //      return view('show',['barang' => Barang::findOrFail($id)]);
    // }

    public function delete($id) {
        $barang = Barang::find($id);
        $barang->delete();

        $callback = [
            "message" => "Data has been Deleted",
            "code"   => 200
        ];

        return json_encode($callback, TRUE);
    }

     public function tambah()
    {

	$kategori = Kategori::all();
    	return view('tambahbarang',['kategori' => $kategori]);

  }

  public function insert(Request $request)
    {
    	$this->validate($request,[
            'kd_barang' =>'required',
            'nm_barang' =>'required',
            'deskripsi_barang' =>'required',
            'upload_barang' =>'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'harga_barang' =>['required','numeric'],
			'kd_kategori' => 'required',
         ]);
         
         // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('upload_barang');
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file/produk';
		$file->move($tujuan_upload,$nama_file);
 
        Barang::create([
            'kd_barang' => $request->kd_barang,
            'nm_barang' => $request->nm_barang,
            'deskripsi_barang' => $request->deskripsi_barang,
            'upload_barang' => $nama_file,
            'harga_barang' => $request->harga_barang,
			'kd_kategori' => $request->kd_kategori,
		]);
 
    	return redirect('/barang');
    }

     public function edit($id){
     $barang = Barang::find($id);
     $kategori = Kategori::all();
     return view('barang_edit', ['barang' => $barang,'kategori' => $kategori]);
    }

    public function update($id, Request $request){
    $this->validate($request,[
	    'kd_barang' =>'required',
        'nm_barang' =>'required',
        'deskripsi_barang' =>'required',
        'upload_barang' =>'file|image|mimes:jpeg,png,jpg|max:2048',
        'harga_barang' =>['required','numeric'],
        'kd_kategori' => 'required',
    ]);

     

    $barang = Barang::find($id);

    if($request->file('upload_barang') == "")
        {
            $barang->upload_barang = $barang->upload_barang;
        } 
        else
        {
            $file       = $request->file('upload_barang');
            $fileName   = time()."_".$file->getClientOriginalName();
            $request->file('upload_barang')->move("data_file/produk/", $fileName);
            $barang->upload_barang = $fileName;
        }
	$barang->kd_barang = $request->kd_barang;
	$barang->nm_barang = $request->nm_barang;
    $barang->deskripsi_barang = $request->deskripsi_barang;
    $barang->harga_barang = $request->harga_barang;
    $barang->kd_kategori = $request->kd_kategori;
    $barang->save();
    return redirect('/barang');
}

}
