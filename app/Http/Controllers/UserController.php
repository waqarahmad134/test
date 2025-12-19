<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use DataTables;
use Storage;

use App\Imports\Casesimport;
use Maatwebsite\Excel\Facades\Excel;


class UserController extends Controller
{
    public function import() 
    {
        Excel::import(new Casesimport,request()->file('file'));
             
        return back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        
        $roles = Role::pluck('name','name')->all();
       
            $products = User::all();
   
            if ($request->ajax()) {
                $data = User::latest()->get();
                
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
       
                               $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
       
                               $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
        
                                return $btn;
                        })
                        ->addColumn('role', function($row){
                            foreach($row->getRoleNames() as $v)
{
    return $v;
}
                             
                        
                     })
                        ->rawColumns(['action'])
                        ->make(true);
            }
          
            return view('users.index',compact('products','roles'));
    
        }  
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


       
        if($request->product_id=="")
        {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'same:confirm-password',
                'roles' => 'required'
            ]);
           
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $user=User::create($input);
            $user->assignRole($request->input('roles'));
            return response()->json(['success'=>'User saved successfully.']);
        }
       else
       {
           $id=$request->product_id;
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }


        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();


        $user->assignRole($request->input('roles'));
    }
    return response()->json(['success'=>'User saved successfully.']);

       }

           
      
    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $user = User::find($id);
      
        return response()->json($user);
       

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);


        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }


        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();


        $user->assignRole($request->input('roles'));


        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
       
        return response()->json(['success'=>'Product deleted successfully.']);
    }

    public function webcam()

    {

        return view('webcam');

    }

  

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function wstore(Request $request)

    {

        $img = $request->image;

        $folderPath = "uploads/";

        

        $image_parts = explode(";base64,", $img);

        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        

        $image_base64 = base64_decode($image_parts[1]);

        $fileName = uniqid() . '.png';

        

        $file = $folderPath . $fileName;

        Storage::put($file, $image_base64);
dd($file);

    }
}