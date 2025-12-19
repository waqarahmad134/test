<?php

namespace App\Http\Controllers;

use App\Models\Court;
use App\Models\Subcat;
use App\Models\Cases;
use Illuminate\Http\Request;
use DataTables;


class SubcatController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subcats = Subcat::latest()->get();
        $cats = Court::all();
      
        return view('subcats.index', compact('subcats', 'cats'));
    }
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Subcat::updateOrCreate(['id' => $request->product_id],
                ['name' => $request->name, 'cat_id' => $request->cat_id]);        
   
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
        $product = Subcat::find($id);
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
        $case = Cases::where('subcat',$id)->first();
        if($case)
        {
            return response()->json(['success'=>'Process Failed. Delete institutions First.']);
        }
        Subcat::find($id)->delete();
     
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
