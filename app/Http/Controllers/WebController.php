<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;
class WebController extends Controller
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

      public function index(){
   	 $artikel = Article::all();
    	 return view('artikel',['artikel' => $artikel]);
   }


}
