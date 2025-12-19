<?php

namespace App\Http\Controllers;
use App\User;
use App\Cases;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;

class HomeController extends Controller
{
    private $x;
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
        $u = User::all();
        $total = Cases::count();
        $mine=auth()->user()->Cases()->count();
        $today = auth()->user()->Cases()->whereDate('created_at', Carbon::today())->count();

        $products = User::all();
   
        if ($request->ajax()) {
            $data = User::with('roles')->join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')->where('model_has_roles.role_id', '2')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
    
                            return $btn;
                    })
                    ->addColumn('count', function($row){
                       
                        return  $row->counts($row->id);
                                                               
                                         })
                    ->rawColumns(['action'])
                    ->make(true);
        }
          
            if (auth()->user()->hasRole(['Admin'])){
                return view('home',compact('u','total'));
                }
                else
                {
                    return view('home',compact('total','mine','today'));
                    }
    }

    public function search(Request $request)
    {
        $u = User::all();
        $total = Cases::count();
        $mine=auth()->user()->Cases()->count();
        $today = auth()->user()->Cases()->whereDate('created_at', Carbon::today())->count();
        
        $this->x = $request->rdate;
       
        
$products = User::all();
   
        if ($request->ajax()) {
            $data = User::with('roles')->join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')->where('model_has_roles.role_id', '2')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    
                    ->addColumn('count', function($row){
                       
                        return  $row->countsbydate($row->id, $this->x);
                                                               
                                         })
                    ->rawColumns(['action'])
                    ->make(true);
        }


    }
}

