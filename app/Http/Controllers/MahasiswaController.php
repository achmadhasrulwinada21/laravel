<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Mahasiswa;
//use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index()
    {
		$mahasiswa = Mahasiswa::all();
    	return view('mahasiswa',['mahasiswa' => $mahasiswa]);
 
    }

    // method untuk menampilkan view form tambah mahasiswa
  public function tambah()
    {

	// memanggil view tambah
	return view('tambah');

  }

  public function insert(Request $request)
    {
    	$this->validate($request,[
			'nama' => 'required',
			'nim' =>'required',
    		'alamat' => 'required'
    	]);
 
        Mahasiswa::create([
			'nama' => $request->nama,
			'nim' => $request->nim,
    		'alamat' => $request->alamat
    	]);
 
    	return redirect('/mahasiswa');
	}
	
	public function edit($id)
{
   $mahasiswa = Mahasiswa::find($id);
   return view('mahasiswa_edit', ['mahasiswa' => $mahasiswa]);
}

public function update($id, Request $request)
{
    $this->validate($request,[
	   'nama' => 'required',
	   'nim' =>'required',
	   'alamat' => 'required'
    ]);

    $mahasiswa = Mahasiswa::find($id);
	  $mahasiswa->nama = $request->nama;
	  $mahasiswa->nim = $request->nim;
    $mahasiswa->alamat = $request->alamat;
    $mahasiswa->save();
    return redirect('/mahasiswa');
}

public function delete($id)
{
    $mahasiswa = Mahasiswa::find($id);
    $mahasiswa->delete();
    return redirect()->back();
}

}
