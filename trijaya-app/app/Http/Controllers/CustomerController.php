<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    //
    public function index()
    {
        $trucks = Booking::query()->select(
            'truck_number',
            'fuel_type',
            DB::raw('COUNT(service_id) as total_services'),
            DB::raw('MAX(booking_date) as last_appointment'),
            DB::raw('COALESCE(AVG(feedback.rating), 0) as avg_rating')
        )->leftJoin('feedback', 'bookings.booking_id', '=', 'feedback.booking_id')
        ->groupBy('truck_number', 'fuel_type')
        ->get();

        return view('admin.customer_list.index', compact('trucks'));
            //'trucks' => $trucks
    }
}
