<?php

namespace App\Http\Controllers;

use App\Models\PS;
use App\Models\Cases;
use Illuminate\Http\Request;
use DataTables;


class PSController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pss = PS::latest()->get();
      
        return view('ps.index', compact('pss'));
    }
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PS::updateOrCreate(['id' => $request->product_id],
                ['name' => $request->name]);        
   
        return response()->json(['success'=>'Product saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = PS::find($id);
        return response()->json($product);
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $case = PS::where('ps_id',$id)->first();
        // $case = Cases::where('ps_id',$id)->first();
        if($case)
        {
            return response()->json(['success'=>'Process Failed. Delete institutions First.']);
        }
        else
        {
        PS::find($id)->delete();
     
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
}
