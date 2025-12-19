<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Cases;
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

    public function index(Request $request)
    {
        $u = User::all();

        // Determine the base query
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('user')) {
            $baseQuery = auth()->user()->Cases();
        } else {
            $baseQuery = Cases::query();
        }
        
        // Now for each count, clone the query (so they are independent)
        $total = (clone $baseQuery)->count();
        $civil = (clone $baseQuery)->where('caset', 'LIKE', '%civil%')->count();
        $criminal = (clone $baseQuery)->where('caset', 'LIKE', '%criminal%')->count();
        $misc = (clone $baseQuery)->where('caset', 'Misc. Case')->count();
        $monthly = (clone $baseQuery)->whereMonth('created_at', Carbon::now()->month)->count();
        
        // Return to view
        return view('home', compact('u', 'total', 'monthly', 'criminal', 'civil', 'misc'));
                
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
