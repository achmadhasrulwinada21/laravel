<?php

namespace App\Modules\Sitemap\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Modules\Sitemap\Models\Siteheader;
use App\Modules\Sitemap\Models\Sitedetail;
use DataTables;
use Session;
use File;
use Illuminate\Support\Facades\DB;

class SitemapController extends Controller
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
         $siteheader = Siteheader::all();
        return Datatables::of($siteheader)
         ->addColumn('action', function ($siteheader) {
               $btn1 = '<center><a href="/sitemap/show/'.$siteheader->id.'" data-toggle="tooltip"  title="Tambah Detail" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Tambah Detail</a> ';
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip" title="Update" data-id="'.$siteheader->id.'" data-original-title="Edit" class="edit btn btn-primary btn-xs editProduct"><i class="fa fa-edit"></i>&nbspEdit</a>';
                $btn = $btn1. $btn.' <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" data-id="'.$siteheader->id.'" data-original-title="Delete" class="btn btn-danger btn-xs deleteProduct"><i class="fa fa-trash"></i>&nbspDelete</a></center>';
                      return $btn;
            }
        )
        ->addIndexColumn()
        ->make(true);
    }

     public function index(){
         $siteheader = Siteheader::all();
        return view('sitemap::siteheader',['siteheader' => $siteheader]);
    }

     public function edit($id)
    {
        $siteheader = Siteheader::find($id);
        return response()->json($siteheader);
    }

    public function insert(Request $request)

     {
        Siteheader::updateOrCreate(['id' => $request->id],

                [
                    'judul' => $request->Judul,
                    'link' => $request->link,
                ]
                );        
        
        return response()->json(['success'=>'saved successfully.']);

    }
    public function destroy($id)
    {
        Siteheader::find($id)->delete();
       $callback = [
            "message" => "Data has been Deleted",
            "code"   => 200
        ];

        return json_encode($callback, TRUE);
    }

     public function show($id)
    {
        $siteheader = Siteheader::find($id);
        $sitedetail = DB::table('sitemap_header')
                     ->leftJoin('sitemap_detail', 'sitemap_header.id', '=', 'sitemap_detail.id_sitemap')
                     ->where('sitemap_detail.id_sitemap', '=', $id)
                     ->get();
       return view('sitemap::sitedetail', ['siteheader' => $siteheader,'sitedetail' => $sitedetail]);
    }

    public function insert_detail(Request $request) {
               
    	$this->validate($request,[
            'judul_detail' =>'required',
            'link_detail' =>'required',
            'id_sitemap' => 'required',
            ]);
            $judul_detail=$request->judul_detail;

for($count = 0; $count<count($judul_detail); $count++)
 {
        Sitedetail::create([
            'judul_detail' => $request->judul_detail[$count],
            'link_detail' => $request->link_detail[$count],
            'id_sitemap' => $request->id_sitemap[$count],
         ]);
}
        return response()->json(['success'=>'saved successfully.']);
    }

    public function delete($id)
    {
        Sitedetail::find($id)->delete();
       $callback = [
            "message" => "Data has been Deleted",
            "code"   => 200
        ];

        return json_encode($callback, TRUE);
    }

    public function update_detail(Request $request)

     {
        Sitedetail::updateOrCreate(['id' => $request->id],

                [
                    'judul_detail' => $request->judul_detail,
                    'link_detail' => $request->link_detail,
                ]
                );        
        
        return response()->json(['success'=>'saved successfully.']);

    }
}
