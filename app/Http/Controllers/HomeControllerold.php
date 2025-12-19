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
        $monthly = Cases::select('*')
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();
            $criminal = Cases::where('c_type', '!=', '')->count();
            $civil = Cases::where('jur', '!=', '')->count();

        $mine=auth()->user()->Cases()->count();
        $today = auth()->user()->Cases()->whereDate('created_at', Carbon::today())->count();
          
            if (auth()->user()->hasRole(['Admin'])){
                return view('home',compact('u','total','monthly','criminal','civil'));
                }
                else
                {
                    return view('home',compact('u','total','mine','today','monthly','criminal','civil'));
                    }
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with('roles')->join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')->where('model_has_roles.role_id', '2')->get();
           
            return response()->json($data);
        }
        // $this->x =$request->date;

        // if ($request->ajax()) {
            
        //     $data = User::with('roles')->join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')->where('model_has_roles.role_id', '2')->get();
        //     return Datatables::of($data)
        //             ->addIndexColumn()
        //             ->addColumn('count', function($row){
        //                $row->countsbydate($row->id, $this->x);
                       
        //             })
        //             ->make(true);
        // }
    }
}
