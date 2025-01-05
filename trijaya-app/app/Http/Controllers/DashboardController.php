<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Feedback;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $totalIncome = Booking::sum('estimated_total_price');
        $bookingsCompleted = Booking::where('status', 3)->count();
        $avgRating = Feedback::avg('rating');

        return response()->json([
            'Total Income' => $totalIncome,
            'Bookings Completed' => $bookingsCompleted,
            'Average Rating' => $avgRating,
        ]);
    }
}
