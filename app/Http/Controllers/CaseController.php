<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cases;
use App\Models\Court;
use App\Models\Judge;
use App\Models\Subcat;
use App\Models\User;
use App\Models\PS;
use Carbon\Carbon;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class CaseController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        return redirect()->route('cases', ['id' => $request->file_number]);
        

        
    }
    public function case($id)
    {
        if (auth()->user()->hasRole(['user|author']))
        {
            $cases = auth()->user()->Cases()->where('file_number',$id)->latest()->paginate(5);
            return view('cases.index',compact('cases'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        else
        {
            $cases = Cases::where('file_number',$id)->latest()->paginate(5);
            return view('cases.index',compact('cases'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        }
      
    }

    public function excase(Request $request)
    {
      $products = Cases::where('cnic',$request->id)->paginate('10');
      return view('cases.excases',compact('products'));
    }

    public function index(Request $request)
    {
        // Load common data
        $cats = Court::all();
        $subcats = Subcat::all();
        $judges = Judge::all()->sortBy('priority');
        $pss = PS::all();

        // Determine if user is admin or has admin role
        $isAdmin = auth()->user()->hasRole(['Admin', 'user']);

        // Get cases based on user role
        if ($isAdmin) {
            $cases = auth()->user()->Cases()->latest()->get();
        } else {
            $cases = Cases::latest()->get();
        }

        return view('cases.index', compact('cases', 'cats', 'subcats', 'judges', 'pss'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cases.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->image)
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
        }
        else 
        {
            $file = $request->image1;
        }
        if($request->user_id!="")
        {
                    Cases::updateOrCreate(['id' => $request->product_id],
                    ['p1' => $request->p1,
                    'p2' => $request->p2,
                    'a_date' => $request->a_date,
                    'cno' => $request->cno,
                    'caset' => $request->caset,
                    'm1' => $request->m1,
                    'm2' => $request->m2,
                    'cnic' => $request->cnic,
                    'i_date' => $request->i_date,
                    'i_no' => $request->i_no,
                    'cat' => $request->cat,
                    'subcat' => $request->subcat,
                    'c_type' => $request->c_type,
                    'fir_no' => $request->fir_no,
                    'fir_year' => $request->fir_year,
                    'offence' => $request->offence,
                    'jur' => $request->jur,
                    'app_against' => $request->app_against,
                    'o_date' => $request->o_date,
                    'court_name' => $request->court_name,
                    'judge_id' => $request->judge_id,
                    'user_id' => $request->user_id,
                    'ps_id' => $request->ps_id,
                    'pic' => $file
                    ]
                   );   
                }
                else
                {
                    Auth()->user()->Cases()->updateOrCreate(['id' => $request->product_id],
                    ['p1' => $request->p1,
                    'p2' => $request->p2,
                    'a_date' => $request->a_date,
                    'cno' => $request->cno,
                    'caset' => $request->caset,
                    'm1' => $request->m1,
                    'm2' => $request->m2,
                    'cnic' => $request->cnic,
                    'i_date' => $request->i_date,
                    'i_no' => $request->i_no,
                    'cat' => $request->cat,
                    'subcat' => $request->subcat,
                    'c_type' => $request->c_type,
                    'fir_no' => $request->fir_no,
                    'fir_year' => $request->fir_year,
                    'offence' => $request->offence,
                    'jur' => $request->jur,
                    'app_against' => $request->app_against,
                    'o_date' => $request->o_date,
                    'court_name' => $request->court_name,
                    'judge_id' => $request->judge_id,
                    'ps_id' => $request->ps_id,
                    'pic' => $file
                    ]
                   );   

                }

                return response()->json(['success'=>'Case saved successfully.']);

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Cases $case)
    {
        return view('cases.show',compact('case'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Cases $case)
    {
        return response()->json($case);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cases  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cases $case)
    {
        

        $case->update($request->all());


        return redirect()->route('cases.index')
                        ->with('success','Case updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cases  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cases $case)
    {
        $case->delete();


        return response()->json(['success'=>'Product deleted successfully.']);
    }

    public function cnic($id)
    {
        $c = Cases::where('cnic',$id)->first();
        if($c)
        {
            $r = "found";
            return response()->json($r);
        }
        else
        {
            $r = "notfound";
            return response()->json($r);
        }
    }

    public function fir($id)
    {
        $c = Cases::where('i_no',$id)->count();
        if($c>=4)
        {
            $r = "found";
            return response()->json($r);
        }
        else
        {
            $r = "notfound";
            return response()->json($r);
        }
    }


    public function monthly(Request $request)
    {
        $cats = Court::all();
        $products = Cases::select('*')
        ->whereMonth('created_at', Carbon::now()->month)
        ->get();
        $subcats = Subcat::all();
        $judges = Judge::all();
        $pss = PS::all();
        
   
        if ($request->ajax()) {
            $data = Cases::select('*')
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
    
                            return $btn;
                    })
                    ->addColumn('cat', function($row){
                       
                        return  $row->cname($row->cat);
                                                               
                                         })
                                         ->addColumn('ps', function($row){
                       if($row->ps_id)
                       {
                                            return  $row->psname($row->ps_id);
                       }
                       else
                       {
                        return "";
                       }
                                                                                   
                                                             })
                                         ->addColumn('subcat', function($row){
                       
                                            return  $row->sname($row->subcat);
                                                                                   
                                                             })
                                                             ->addColumn('judge_name', function($row){
                       
                                                                return  $row->jname($row->judge_id);
                                                                                                       
                                                                                 })
                    
                    ->rawColumns(['action','cat','subcat','judge_name','ps'])
                    ->make(true);
        }
      
        return view('cases.index1',compact('products','cats','subcats','judges','pss'));

      

    
}

public function criminal(Request $request)
{
    $cats = Court::all();
    $products = Cases::where('c_type', '!=', '')->get();
    $subcats = Subcat::all();
    $judges = Judge::all();
    $pss = PS::all();
    

    if ($request->ajax()) {
        $data = Cases::where('c_type', '!=', '')->get();
        
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                       $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

                       $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                        return $btn;
                })
                ->addColumn('cat', function($row){
                   
                    return  $row->cname($row->cat);
                                                           
                                     })
                                     ->addColumn('ps', function($row){
                   if($row->ps_id)
                   {
                                        return  $row->psname($row->ps_id);
                   }
                   else
                   {
                    return "";
                   }
                                                                               
                                                         })
                                     ->addColumn('subcat', function($row){
                   
                                        return  $row->sname($row->subcat);
                                                                               
                                                         })
                                                         ->addColumn('judge_name', function($row){
                   
                                                            return  $row->jname($row->judge_id);
                                                                                                   
                                                                             })
                
                ->rawColumns(['action','cat','subcat','judge_name','ps'])
                ->make(true);
    }
  
    return view('cases.index2',compact('products','cats','subcats','judges','pss'));

  


}

public function civil(Request $request)
{
    $cats = Court::all();
    $products = Cases::where('jur', '!=', '')->get();
    $subcats = Subcat::all();
    $judges = Judge::all();
    $pss = PS::all();
    

    if ($request->ajax()) {
        $data = Cases::where('jur', '!=', '')->get();
        
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                       $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

                       $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                        return $btn;
                })
                ->addColumn('cat', function($row){
                   
                    return  $row->cname($row->cat);
                                                           
                                     })
                                     ->addColumn('ps', function($row){
                   if($row->ps_id)
                   {
                                        return  $row->psname($row->ps_id);
                   }
                   else
                   {
                    return "";
                   }
                                                                               
                                                         })
                                     ->addColumn('subcat', function($row){
                   
                                        return  $row->sname($row->subcat);
                                                                               
                                                         })
                                                         ->addColumn('judge_name', function($row){
                   
                                                            return  $row->jname($row->judge_id);
                                                                                                   
                                                                             })
                
                ->rawColumns(['action','cat','subcat','judge_name','ps'])
                ->make(true);
    }
  
    return view('cases.index3',compact('products','cats','subcats','judges','pss'));

  


}
public function search(Request $request,$f,$t,$type)
{

    $cats = Court::all();
    if($type=="all")
    {
    $products = Cases::where('i_date', '>=', $f)->where('i_date','<=',$t)->get();
    }
    if($type=="civil")
    {
        $products = Cases::where('i_date', '>=', $f)->where('i_date','<=',$t)->where('jur', '!=', '')->get();
    }
    if($type=="criminal")
    {
        $products = Cases::where('i_date', '>=', $f)->where('i_date','<=',$t)->where('c_type', '!=', '')->get();
    }
    
    $subcats = Subcat::all();
    $judges = Judge::all();
    $pss = PS::all();
    

    if ($request->ajax()) {
        $data = $products;
        
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                       $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

                       $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                        return $btn;
                })
                ->addColumn('cat', function($row){
                   
                    return  $row->cname($row->cat);
                                                           
                                     })
                                     ->addColumn('ps', function($row){
                   if($row->ps_id)
                   {
                                        return  $row->psname($row->ps_id);
                   }
                   else
                   {
                    return "";
                   }
                                                                               
                                                         })
                                     ->addColumn('subcat', function($row){
                   
                                        return  $row->sname($row->subcat);
                                                                               
                                                         })
                                                         ->addColumn('judge_name', function($row){
                   
                                                            return  $row->jname($row->judge_id);
                                                                                                   
                                                                             })
                
                ->rawColumns(['action','cat','subcat','judge_name','ps'])
                ->make(true);
    }
  
    return view('cases.index3',compact('products','cats','subcats','judges','pss'));

  


}
public function search1(Request $request)
{
    $cats = Court::all();
    $products = Cases::where('jur', '!=', '')->get();
    $subcats = Subcat::all();
    $judges = Judge::all();
    $pss = PS::all();
    return view('cases.search',compact('products','cats','subcats','judges','pss','request'));

}
}
