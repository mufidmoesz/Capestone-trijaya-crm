@extends('layouts.layoutcontent')

@section('content')
    <div class="container">
        <h2>Give Feedback</h2>

        <p>Customer Name: {{ $feedback->customer_name }}</p>
        <p>Truck Number: {{ $feedback->truck_number }}</p>

        <form action="{{ route('admin.feedback.store') }}" method="POST">
            @csrf
            <input type="hidden" name="booking_id" value="{{ $feedback->booking_id }}">
            <div class="form-group">
                <label for="rating">Rating</label>
                <select class="form-select" id="rating" name="rating" required>
                    <option value="" selected>Select Rating</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>

            <div class="form-group">
                <label for="comment">Give Comment</label>
                <textarea name="comment" id="comment" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save Feedback</button>
        </form>
    </div>
@endsection
