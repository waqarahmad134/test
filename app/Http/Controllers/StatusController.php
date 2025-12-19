<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index(Request $request)
    {
        $statusFilter = $request->get('status');
        $perPage = $request->get('per_page', 10);
        $search = $request->get('search');
        $query = Status::query();
        if ($statusFilter) {
            $query->where('status', $statusFilter);
        }
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        $statuses = $query->paginate($perPage);
        return view('status.index', compact('statuses'));
    }

    public function create()
    {
        return view('statuses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:statuses,name',
            'color' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        Status::create($request->all());
        return redirect()->route('statuses.index')->with('success', 'Status created successfully!');
    }

    public function edit($id)
    {
        $status = Status::findOrFail($id);
        return view('statuses.edit', compact('status'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:statuses,name,' . $id,
            'color' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        $status = Status::findOrFail($id);
        $status->update($request->all());
        return redirect()->route('statuses.index')->with('success', 'Status updated successfully!');
    }

    public function updateStatus(Request $request, $id)
    {
        $status = Status::find($id);
        if (!$status) {
            return redirect()->route('statuses.index')->with('error', 'Status not found.');
        }
        $status->status = ($status->status === 'active') ? 'inactive' : 'active';
        $status->save();
        return redirect()->route('statuses.index')->with('success', 'Status updated successfully.');
    }


    public function destroy($id)
    {
        $status = Status::findOrFail($id);
        $status->delete();
        return redirect()->route('statuses.index')->with('success', 'Status deleted successfully!');
    }
}
