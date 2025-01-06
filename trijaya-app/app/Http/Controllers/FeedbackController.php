<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Booking;

class FeedbackController extends Controller
{
    //
    public function index()
    {
        $feedbacks = Booking::with(['feedback'])->get();

        return view("admin.feedback.index", compact('feedbacks'));
    }

    public function create($id)
    {
        $feedback = Booking::with(['feedback'])->findOrFail($id);

        return view("admin.feedback.create", compact('feedback'));
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

        return redirect()->route('admin.feedback.index')->with('success', 'Feedback created successfully');
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
