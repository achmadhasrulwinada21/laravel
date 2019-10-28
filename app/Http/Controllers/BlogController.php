<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Blog;
use App\Model\Mahasiswa;
use DataTables;
use Session;

class BlogController extends Controller
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

         public function index(Request $request)

    {
        if ($request->ajax()) {
          $data = Blog::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){  
                           $btn = '<center><a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct"><i class="fa fa-edit"></i>&nbspEdit</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><i class="fa fa-trash"></i>&nbspDelete</a></center>';
                      return $btn;

                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    }
        	$mahasiswa = Mahasiswa::all();
        	return view('blog',['mahasiswa' => $mahasiswa]);
           }

    public function store(Request $request)

     {

        Blog::updateOrCreate(['id' => $request->id],

                ['title' => $request->title, 
                'description' => $request->description,
                'nim' => $request->nim]
                );        
        
        return response()->json(['success'=>'saved successfully.']);

    }

        public function edit($id)
    {
        $blog = Blog::find($id);
        return response()->json($blog);
    }

        public function destroy($id)
    {
        Blog::find($id)->delete();
       $callback = [
            "message" => "Data has been Deleted",
            "code"   => 200
        ];

        return json_encode($callback, TRUE);
    }

    public function hapus_permanen($id)
{
    	// hapus permanen data 
    	$blog = Blog::onlyTrashed()->where('id',$id);
    	$blog->forceDelete();
 
    	$callback = [
            "message" => "Data has been Deleted",
            "code"   => 200
        ];

        return json_encode($callback, TRUE);
}

public function hapus_permanen_semua()
{
    	// hapus permanen semua data guru yang sudah dihapus
    	$blog = Blog::onlyTrashed();
        $blog->forceDelete();
        Session::flash('hapus','Data Telah Terhapus');
   return redirect('/trash');
}


 public function trash(Request $request)
    {
        if ($request->ajax()) {
          $data = Blog::onlyTrashed()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){  
                            $btn = '<a href="/trash/kembalikan/'.$row->id.'" class="btn btn-success btn-sm"><i class="fa fa-undo">&nbspRestore</i></a>';
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct2"><i class="fa fa-trash"></i>&nbspHapus Permanen</a></center>';
                      return $btn;

                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    }
        	
        	return view('blog_trash');
           }
   
           public function kembalikan($id)
           {
    	$blog = Blog::onlyTrashed()->where('id',$id);
        $blog->restore();
        Session::flash('restore','Restore Data SUKSES');
    	return redirect('/trash');
          }

          public function kembalikansemua()
          {
    		
    	$blog = Blog::onlyTrashed();
    	$blog->restore();
         Session::flash('restoreall','Restore All Data SUKSES');
    	return redirect('/trash');
         }
}
