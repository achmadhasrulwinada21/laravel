<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Manajemenuser;
use Illuminate\Support\Facades\Hash;
use DataTables;
class ManajemenuserController extends Controller
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

    //  public function index()
    // {
    //      $manajemenuser = Manajemenuser::all();
    // 	 return view('manajemenuser',['manajemenuser' => $manajemenuser]);
    // }
    public function json(){
        $manajemenuser = Manajemenuser::all();
        return Datatables::of($manajemenuser)
         ->addColumn('action', function ($manajemenuser) {
                return '<center>
                <a href="/manajemenuser/edit/'.$manajemenuser->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button data-id="'.$manajemenuser->id.'" class="btn btn-xs btn-danger" id="hapusUser"><i class="glyphicon glyphicon-trash"></i> Hapus</button></center>';
            }
        )
        ->addIndexColumn()
        ->make(true);
    }

    public function index(){
       $manajemenuser = Manajemenuser::all();
    	return view('manajemenuser',['manajemenuser' => $manajemenuser]);
    }

    public function edit($id){
     $manajemenuser = Manajemenuser::find($id);
     return view('manajemenuser_edit', ['manajemenuser' => $manajemenuser]);
    //  $userall = Manajemenuser::all();
    //  $selectedRole = Manajemenuser::first()->id;
//    return view('manajemenuser_edit', ['manajemenuser' => $manajemenuser,'userall' => $userall,'selectedRole' => $selectedRole]);

}

    public function update($id, Request $request){
    $this->validate($request,[
	   'name' => 'required',
	   'email' =>'required',
	   'jabatan' => 'required'
    ]);

    $manajemenuser = Manajemenuser::find($id);
	$manajemenuser->name = $request->name;
	$manajemenuser->email = $request->email;
    $manajemenuser->jabatan = $request->jabatan;
    $manajemenuser->save();
    return redirect('/manajemenuser');
}

 public function daftar(){
       
    	return view('daftar');
    }

    public function delete($id) {
        $manajemenuser = Manajemenuser::find($id);
        $manajemenuser->delete();

        $callback = [
            "message" => "User has been Deleted",
            "code"   => 200
        ];

        return json_encode($callback, TRUE);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'jabatan' => ['required', 'in:admin,member'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'jabatan' => $data['jabatan'],
        ]);
    }

    public function insert(Request $request)
    {
    	$this->validate($request,[
		    'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'jabatan' => ['required', 'in:admin,member'],
    	]);
 
        Manajemenuser::create([
			'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'jabatan' => $request['jabatan'],
    	]);
 
    	return redirect('/manajemenuser');
	}

    
}
