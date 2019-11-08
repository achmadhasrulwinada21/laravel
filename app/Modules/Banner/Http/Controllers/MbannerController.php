<?php

namespace App\Modules\Banner\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Modules\Banner\Models\Mbanner;
use DataTables;
use Session;
use File;
use Illuminate\Support\Facades\DB;

class MbannerController extends Controller
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
        $mbanner = Mbanner::all();
        return Datatables::of($mbanner)
        ->addColumn('action', function ($mbanner) {
                $btn = '<a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_edit'.$mbanner->id.'" style="color:white;"><i class="fa fa-edit"></i>&nbspEdit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$mbanner->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><i class="fa fa-trash"></i>&nbspDelete</a></center>';
                return $btn;
            })
        ->addIndexColumn()
        ->make(true);
    }

     public function index(){
         $db = Mbanner::all();
        return view('banner::mbanner',['db'=> $db]);
    }

    public function insert(Request $request) {
               
    	$this->validate($request,[
            'upload' =>'required|max:2048',
            'ket' =>'required',
            'nama' => 'required',
            ]);

            
        $file = $request->file('upload');
        $path       = 'file_upload/';
		$nama_file = $path.$file->getClientOriginalName();
       	$tujuan_upload =  $path;
        $file->move($tujuan_upload,$nama_file);
                           
        Mbanner::create([
            'upload' => $nama_file,
            'ket' => $request->ket,
            'nama' => $request->nama,
           ]);
         Session::flash('sukses','File Telah Ditambahkan');
        return redirect('/banner/tampil');
    }

     public function destroy($id)
    {
        $mbanner = Mbanner::find($id);

        File::delete($mbanner->upload);

        $mbanner->delete();

       $callback = [
            "message" => "Data has been Deleted",
            "code"   => 200
        ];

        return json_encode($callback, TRUE);
    }

     public function update($id, Request $request){

     $mbanner = Mbanner::find($id);

    if($request->file('upload') == "")
        {
            $mbanner->upload = $mbanner->upload;
        } 
        else
        {
            File::delete($mbanner->upload);
            $file       = $request->file('upload');
            $path       = 'file_upload/';
            $fileName   =  $path.$file->getClientOriginalName();
            $request->file('upload')->move($path, $fileName);
            $mbanner->upload = $fileName;
        }  

	$mbanner->ket = $request->ket;
	$mbanner->nama = $request->nama;
    $mbanner->save();
    Session::flash('sukses','Data Telah Diupdate');
    return redirect('/banner/tampil');
}
}
