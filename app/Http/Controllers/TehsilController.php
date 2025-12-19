<?php

namespace App\Http\Controllers;

use App\Models\Tehsil;
use App\Models\District;
use Illuminate\Http\Request;

class TehsilController extends Controller
{
    public function index(Request $request)
    {
        $query = Tehsil::with('district');
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
        $tehsils = $query->paginate($request->per_page ?? 10);
        return view('tehsils.index', compact('tehsils'));
    }

    public function create()
    {
        $districts = District::all();
        return view('tehsils.create', compact('districts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'district_id' => 'required|exists:districts,id',
            'name' => 'required|string|unique:tehsils,name',
            'status' => 'required|in:active,inactive',
        ]);

        Tehsil::create($request->all());

        return redirect()->route('tehsils.index')->with('success', 'Tehsil created successfully.');
    }

    // Show the form for editing the specified tehsil
    public function edit(Tehsil $tehsil)
    {
        $districts = District::all();
        return view('tehsils.edit', compact('tehsil', 'districts'));
    }

    // Update the specified tehsil in storage
    public function update(Request $request, Tehsil $tehsil)
    {
        $request->validate([
            'district_id' => 'required|exists:districts,id',
            'name' => 'required|string|unique:tehsils,name,' . $tehsil->id,
            'status' => 'required|in:active,inactive',
        ]);

        $tehsil->update($request->all());

        return redirect()->route('tehsils.index')->with('success', 'Tehsil updated successfully.');
    }


    public function updateStatus($id)
    {
        $district = Tehsil::findOrFail($id); 
        $district->status = ($district->status === 'active') ? 'inactive' : 'active';

        $district->save(); 

        return redirect()->route('tehsils.index')
                         ->with('success', 'Tehsil status updated successfully.');
    }


    // Remove the specified tehsil from storage
    public function destroy(Tehsil $tehsil)
    {
        $tehsil->delete();
        return redirect()->route('tehsils.index')->with('success', 'Tehsil deleted successfully.');
    }

    // Toggle the status of a tehsil
    public function toggleStatus(Tehsil $tehsil)
    {
        $tehsil->status = ($tehsil->status == 'active') ? 'inactive' : 'active';
        $tehsil->save();

        return redirect()->route('tehsils.index')->with('success', 'Tehsil status updated successfully.');
    }
}
