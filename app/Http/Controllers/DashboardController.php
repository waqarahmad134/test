<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Challan;
use App\Models\Fir;
use App\Models\Cases;
use App\Models\Court;
use App\Models\Judge;
use App\Models\PS;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{

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
        
        // Get counts for other entities
        $totalCourts = Court::count();
        $totalJudges = Judge::count();
        $totalPS = PS::count();
        
        // Return to view
        return view('home', compact('u', 'total', 'monthly', 'criminal', 'civil', 'misc', 'totalCourts', 'totalJudges', 'totalPS'));
                
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
    
    // public function index()
    // {
    //     $user = auth()->user();

    //     // Base query for filtering by role
    //     $challanQuery = Challan::query();
    //     $firQuery = Fir::query();

    //     if ($user->role === 'police') {
    //         // If role is 'police', filter by the logged-in user's ID
    //         $challanQuery->where('user_id', $user->id);
    //         $firQuery->where('user_id', $user->id);
    //     }

    //     $totalChallanCount = $challanQuery->count();
    //     $totalFir = $firQuery->count();

    //     $latestStatuses = DB::table('challan_statuses as cs')
    //         ->select('cs.status_id', DB::raw('COUNT(*) as total'))
    //         ->join(DB::raw('(SELECT challan_id, MAX(created_at) as latest FROM challan_statuses GROUP BY challan_id) as latest_statuses'), function ($join) {
    //             $join->on('cs.challan_id', '=', 'latest_statuses.challan_id')
    //                 ->on('cs.created_at', '=', 'latest_statuses.latest');
    //         })
    //         ->groupBy('cs.status_id')
    //         ->pluck('total', 'cs.status_id');

    //     $status1Count = $latestStatuses->get(1, 0);
    //     $status2Count = $latestStatuses->get(2, 0);
    //     $status3Count = $latestStatuses->get(3, 0);

    //     $latestChallans = $challanQuery->latest('created_at')->take(5)->get();

    //     // Get the start and end of the current week
    //     $startOfWeek = now()->startOfWeek();
    //     $endOfWeek = now()->endOfWeek();

    //     // Weekly Challan Count
    //     $weeklyChallanCount = $challanQuery->whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();

    //     // Weekly FIR Count
    //     $weeklyFirCount = $firQuery->whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();

    //     // Weekly Challan Data (Chart)
    //     $weeklyChallanData = $challanQuery->selectRaw('DAYNAME(created_at) as day, COUNT(*) as count')
    //         ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
    //         ->groupByRaw('DAYNAME(created_at)')
    //         ->orderByRaw('FIELD(DAYNAME(created_at), "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday")')
    //         ->pluck('count', 'day');

    //     // Weekly FIR Data (Chart)
    //     $weeklyFirData = $firQuery->selectRaw('DAYNAME(created_at) as day, COUNT(*) as count')
    //         ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
    //         ->groupByRaw('DAYNAME(created_at)')
    //         ->orderByRaw('FIELD(DAYNAME(created_at), "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday")')
    //         ->pluck('count', 'day');

    //     // Prepare Data for Charts
    //     $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

    //     $challanChartData = [];
    //     $firChartData = [];

    //     foreach ($days as $day) {
    //         $challanChartData[] = [
    //             'x' => substr($day, 0, 3), // Short name (Sun, Mon, etc.)
    //             'y' => $weeklyChallanData->get($day, 0),
    //         ];

    //         $firChartData[] = [
    //             'x' => substr($day, 0, 3),
    //             'y' => $weeklyFirData->get($day, 0),
    //         ];
    //     }

    //     $userData = User::selectRaw('role, COUNT(*) as total')
    //         ->groupBy('role')
    //         ->pluck('total', 'role');

    //     $userChartLabels = $userData->keys()->toArray();
    //     $userChartSeries = $userData->values()->toArray();

    //     return view('dashboard.index', compact(
    //         'totalFir', 
    //         'latestChallans', 
    //         'totalChallanCount', 
    //         'status1Count', 
    //         'status2Count', 
    //         'status3Count', 
    //         'weeklyChallanCount', 
    //         'weeklyFirCount', 
    //         'challanChartData', 
    //         'firChartData', 
    //         'userChartLabels', 
    //         'userChartSeries'
    //     ));
    // }


    // Removed unused demo dashboard methods: index2, index3, index4, index5, wallet
}
