<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index(Request $request)
{
    $query = District::query();

    if ($request->has('search') && !empty($request->search)) {
        $search = $request->search;
        $query->where('name', 'LIKE', "%{$search}%");
    }

    if ($request->has('status') && !empty($request->status)) {
        $query->where('status', $request->status);
    }

    $perPage = $request->has('per_page') ? $request->per_page : 10;

    $districts = $query->paginate($perPage);
    $districts->appends($request->all());

    return view('districts.index', compact('districts'));
}


    public function updateStatus($id)
    {
        $district = District::findOrFail($id); 
        $district->status = ($district->status === 'active') ? 'inactive' : 'active';

        $district->save(); 

        return redirect()->route('districts.index')
                         ->with('success', 'District status updated successfully.');
    }

    public function create()
    {
        return view('districts.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:districts|max:255',
        ]);

        // Create a new district with name and status
        District::create($request->all());

        return redirect()->route('districts.index')
                         ->with('success', 'District created successfully.');
    }

    public function show(District $district)
    {
        return view('districts.show', compact('district'));
    }

    public function edit(District $district)
    {
        return view('districts.edit', compact('district'));
    }

    public function update(Request $request, District $district)
    {
        $request->validate([
            'name' => 'required|string|unique:districts,name,' . $district->id . '|max:255',
        ]);

        $district->update($request->all());

        return redirect()->route('districts.index')
                         ->with('success', 'District updated successfully.');
    }

    public function destroy(District $district)
    {
        $district->delete();
        return redirect()->route('districts.index')
                         ->with('success', 'District deleted successfully.');
    }
}
