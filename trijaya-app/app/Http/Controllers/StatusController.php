<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{
    //
    public function index()
    {
        $status = Status::all();

        return response()->json([
            'status' => $status
        ]);
    }

    public function detail($id)
    {
        $status = Status::find($id);

        return response()->json([
            'status' => $status
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'status_name' => 'required'
        ]);

        Status::create([
            'status_name' => $request->status_name
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Status created successfully'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status_name' => 'required'
        ]);

        $status = Status::find($id);
        $status->update([
            'status_name' => $request->status_name
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Status updated successfully'
        ]);
    }

    public function destroy($id)
    {
        $status = Status::find($id);
        $status->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Status deleted successfully'
        ]);
    }
}
