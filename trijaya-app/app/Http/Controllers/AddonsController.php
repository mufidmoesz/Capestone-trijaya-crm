<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addons;

class AddonsController extends Controller
{
    //
    public function index()
    {
        $addons = Addons::all();

        return view('admin.sparepart.index', compact('addons'));
    }

    public function detail($id)
    {
        $addon = Addons::find($id);

        return response()->json([
            'add-ons' => $addon
        ]);
    }

    public function create()
    {
        return view('admin.sparepart.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);

        Addons::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Add-ons created successfully'
        ], 201);
    }

    public function edit($id)
    {
        $addons = Addons::find($id);

        return view('admin.sparepart.edit', compact('addons'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);

        $addon = Addons::find($id);
        $addon->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Add-ons updated successfully'
        ], 201);
    }

    public function destroy($id)
    {
        $addon = Addons::find($id);
        $addon->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Add-ons deleted successfully'
        ]);
    }
}
