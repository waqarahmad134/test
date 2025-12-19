<?php

namespace App\Http\Controllers;

use App\Models\Court;
use App\Models\Subcat;
use App\Models\Cases;
use Illuminate\Http\Request;
use DataTables;


class CourtController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courts = Court::latest()->get();
      
        return view('courts.index', compact('courts'));
    }
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Court::updateOrCreate(['id' => $request->product_id],
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
        $product = Court::find($id);
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
        $case = Cases::where('cat',$id)->first();
        $subcat = Subcat::where('cat_id',$id)->first();
        if($case || $subcat)
        {
            return response()->json(['success'=>'Process Failed. Delete institutions First.']);
        }
        else
        {
        Court::find($id)->delete();
     
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
}
