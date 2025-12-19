<?php

namespace App\Http\Controllers;

use App\Models\Judge;
use App\Models\Cases;
use Illuminate\Http\Request;
use DataTables;


class JudgeController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $judges = Judge::latest()->get();
      
        return view('judges.index', compact('judges'));
    }
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Judge::updateOrCreate(['id' => $request->product_id],
                ['name' => $request->name, 'user_id' => auth()->user()->id]);        
   
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
        $product = Judge::find($id);
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
        $case = Cases::where('judge_id',$id)->first();
        if($case)
        {
            return response()->json(['success'=>'Process Failed. Delete institutions First.']);
        }
        else
        {
        Judge::find($id)->delete();
     
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
}
