<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    //
    public function index()
    {
        $feedbacks = Feedback::all();

        return response()->json([
            'feedbacks' => $feedbacks
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,booking_id',
            'rating' => 'required',
            'comment' => 'required'
        ]);

        Feedback::create([
            'booking_id' => $request->booking_id,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Feedback created successfully'
        ], 201);
    }

    public function destroy($id)
    {
        $feedback = Feedback::find($id);
        $feedback->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Feedback deleted successfully'
        ], 201);
    }
}
