<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cases;
use App\Models\Court;
use App\Models\Type;
use Auth;
use Log;
use DataTables;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class welcome extends Controller
{
    //
    public function index(Request $request)
    {
        $courts = Court::all();
      
        $products = Cases::all();
        $types = Type::all();
        
   
        if ($request->ajax()) {
            $data = Cases::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
    
                            return $btn;
                    })
                    ->addColumn('cname', function($row){
                       
return  $row->cname($row->court_id);
                                       
                 })

                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('cases',compact('products','courts','types'));

   
}

public function searching(Request $request)
{
        $val1 = $request->file_number;
        $val2 = $request->reference;
        $val3 = $request->case_type;
        $val4 = $request->case_number;
        $val5 = $request->offence;
        $val6 = $request->police_station;
        $val7 = $request->plaintiff;
        $val8 = $request->defendant;
        $val9 = $request->decision_date;
        $val10 = $request->decision;
        $val11 = $request->court_name;
        $val12 = $request->decision_year;
        $val13 = $request->rack_number;
        
    $data = Cases::where(function ($q) use($val1) {
        if ($val1) {
            $q->where('file_number', $val1);
        }
    })->where(function ($q) use($val2) {
        if ($val2) {
            $q->where('reference', $val2);
        }
    })->where(function ($q) use($val3) {
        if ($val3) {
            $q->where('case_type', $val3);
        }
    })->where(function ($q) use($val4) {
        if ($val4) {
            $q->where('case_number', $val4);
        }
    })->where(function ($q) use($val5) {
        if ($val5) {
            $q->where('offence', $val5);
        }
    })->where(function ($q) use($val6) {
        if ($val6) {
            $q->where('police_station', $val6);
        }
    })->where(function ($q) use($val7) {
        if ($val7) {
            $q->where('plaintiff', $val7);
        }
    })->where(function ($q) use($val8) {
        if ($val8) {
            $q->where('defendant', $val8);
        }
    })->where(function ($q) use($val9) {
        if ($val9) {
            $q->where('decision_date', $val9);
        }
    })->where(function ($q) use($val10) {
        if ($val10) {
            $q->where('decision', $val10);
        }
    })->where(function ($q) use($val11) {
        if ($val11) {
            $q->where('court_name', $val11);
        }
    })->where(function ($q) use($val12) {
        if ($val12) {
            $q->where('decision_year', $val12);
        }
    })->where(function ($q) use($val13) {
        if ($val13) {
            $q->where('rack_number', $val13);
        }
    })->get();
   
        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($row){

               $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

               $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                return $btn;
        })

        ->rawColumns(['action'])
        ->make(true);

    
    
}
public function finalprint($id)
{
    $case = Cases::find($id);
    
    // Generate QR code
    $qrCode = QrCode::size(120)->generate(url('finalprint/' . $case->id));
    
    return view('finalprint', compact('case', 'qrCode'));
}
}
