<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;

class ServicesController extends Controller
{
    //

    public function index() {
        $services = Services::all();

        return view('admin.services.index', compact('services'));
    }

    public function detail($id) {
        $service = Services::find($id);

        return response()->json([
            'service' => $service
        ]);
    }

    public function create()
    {
        return view('admin.services.create');
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

        return redirect()->route('admin.services.index');
    }

    public function edit($id)
    {
        $service = Services::find($id);

        return view('admin.services.edit', compact('service'));
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

        return redirect()->route('admin.services.index');
    }

    public function destroy($id) {
        $service = Services::find($id);
        $service->delete();

        return redirect()->route('admin.services.index');
    }
}
