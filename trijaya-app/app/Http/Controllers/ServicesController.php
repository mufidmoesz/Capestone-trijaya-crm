<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;

class ServicesController extends Controller
{
    //

    public function index() {
        $services = Services::all();

        return response()->json([
            'services' => $services
        ]);
    }

    public function detail($id) {
        $service = Services::find($id);

        return response()->json([
            'service' => $service
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'service_name' => 'required',
            'service_description' => 'required',
            'service_price' => 'required',
            'estimated_time' => 'required'
        ]);

        Services::create([
            'service_name' => $request->service_name,
            'service_description' => $request->service_description,
            'service_price' => $request->service_price,
            'estimated_time' => $request->estimated_time
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Service created successfully'
        ], 201);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'service_name' => 'required',
            'service_description' => 'required',
            'service_price' => 'required',
            'estimated_time' => 'required'
        ]);

        $service = Services::find($id);
        $service->update([
            'service_name' => $request->service_name,
            'service_description' => $request->service_description,
            'service_price' => $request->service_price,
            'estimated_time' => $request->estimated_time
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Service updated successfully'
        ], 201);
    }

    public function destroy($id) {
        $service = Services::find($id);
        $service->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Service deleted successfully'
        ]);
    }
}
