@extends('layouts.app')
<style>
    .container {
        max-width: 1000px;
    }

    .manual {
        padding-left: 100px;
        padding-right: 100px;
        margin-left: auto;
        margin-right: auto;
    }
    /* .table {
        table-layout: auto;
    } */
</style>
@section('content')

    <h3>Dashboard</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card-custom">
                    <h5>Income</h5>
                    <h2>{{$totalIncome}}</h2>
                    <p class="text-light">Income from 1 month</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom">
                    <h5>Completed Service</h5>
                    <h2>{{$bookingsCompleted}}Times</h2>
                    <p class="text-light">Completed from 1 month</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom">
                    <h5>Avg. Rating</h5>
                    <h2>{{$avgRating}}/5</h2>
                    <p class="text-light">Avg. Rating from 1 month</p>
                </div>
            </div>
        </div>
        <h4 class="mt-4">Appointment</h4>
            <div class="appointment-table">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>License Plate</th>
                            <th>Telephone</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $booking->customer_name }}</td>
                            <td>{{ $booking->truck_number }}</td>
                            <td>{{ $booking->customer_phone }}</td>
                            <td>{{ date('d/m/Y', strtotime($booking->booking_date)) }}</td>
                            <td>{{ $booking->booking_time }}</td>
                            <td>
                                @if ($booking->status == 1)
                                    <span class="badge bg-success">Waiting</span>
                                @elseif ($booking->status == 2)
                                    <span class="badge bg-success">In Progress</span>
                                @elseif ($booking->status == 3)
                                    <span class="badge bg-success">Completed</span>
                                @else
                                    <span class="badge bg-danger">Cancelled</span>
                                @endif
                            </td>
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
@endsection
