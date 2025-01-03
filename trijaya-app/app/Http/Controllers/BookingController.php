<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\BookingAddons;
use App\Models\Addons;
use App\Models\Services;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    //
    public function index()
    {
        $bookings = Booking::with(['service', 'addons', 'status'])->get();

        return response()->json([
            'bookings' => $bookings
        ]);

        // foreach ($bookings as $booking) {
        //     $bookingIds[] = $booking->booking_id;
        // }

        // $addonIds = BookingAddons::whereIn('booking_id', $bookingIds)->get();

    }

    public function detail($id)
    {
        $booking = Booking::with(['service', 'addons', 'status'])->find($id);

        return response()->json([
            'booking' => $booking
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'exists:services,service_id',
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'truck_number' => 'required',
            'fuel_type' => 'required',
            'booking_date' => 'required',
            'booking_time' => 'required',
            'addons' => 'array',
            'addons.*' => 'exists:add_ons,addon_id',
            'status_id' => 'required|exists:statuses,status_id'
        ]);

        Booking::create([
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'truck_number' => $request->truck_number,
            'fuel_type' => $request->fuel_type,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'status' => $request->status_id
        ]);

        //save booking_id and addon_id to their pivot table
        $booking_id = DB::getPdo()->lastInsertId();
        $addons = $request->get('addons');

        $booking = Booking::find($booking_id);
        $booking->addons()->attach($addons);

        return response()->json([
            'status' => 'success',
            'message' => 'Booking created successfully'
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'service_id' => 'required|exists:services,service_id',
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'truck_number' => 'required',
            'fuel_type' => 'required',
            'booking_date' => 'required',
            'booking_time' => 'required',
            'addons' => 'array',
            'addons.*' => 'exists:add_ons,addon_id',
            'status_id' => 'required|exists:statuses,status_id'
        ]);

        $booking = Booking::find($id);
        $booking->update([
            'service_id' => $request->service_id,
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'truck_number' => $request->truck_number,
            'fuel_type' => $request->fuel_type,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'status' => $request->status_id
        ]);

        $addons = $request->get('addons');
        $booking->addons()->sync($addons);

        return response()->json([
            'status' => 'success',
            'message' => 'Booking updated successfully'
        ]);
    }

    public function destroy($id)
    {
        $booking = Booking::find($id);
        $booking->addons()->detach();
        $booking->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Booking deleted successfully'
        ]);
    }
}
