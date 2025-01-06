@extends('layouts.layoutcontent')
@section('content')
    <h3>Feedbacks</h3>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Plat Nomor</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Comment</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach($feedbacks as $booking)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $booking->customer_name }}</td>
                        <td>{{ $booking->truck_number }}</td>
                        <td>{{ $booking->feedback?->rating ?? 'N/A' }}</td>
                        <td>{{ $booking->feedback?->comment ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Modal -->

@endsection
