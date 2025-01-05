@extends('layouts.layoutcontent')
@section('content')
    <h3>Sparepart</h3>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">License Plate</th>
                    <th scope="col">Service</th>
                    <th scope="col">Addons</th>
                    <th scope="col">Tot.Price</th>
                    <th scope="col">Est. Time</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $booking->customer_name }}</td>
                    <td>{{ $booking->truck_number }}</td>
                    <td>{{ optional($booking->service)->service_name ?? 'N/A' }}</td>
                    <td>
                        <!-- Detail Button -->
                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modal-{{ $booking->booking_id }}">
                            Detail
                        </button>
                    </td>
                    <td>{{ $booking->booking_time }}</td>
                    <td>{{ optional($booking->service)->estimated_time ?? 'N/A' }}</td>
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

                <!-- Modal for each booking -->
                <div class="modal fade" id="modal-{{ $booking->booking_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Addons Detail for {{ $booking->customer_name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if ($booking->addons->isEmpty())
                                <p>No addons available for this booking.</p>
                                @else
                                <ul>
                                    @foreach ($booking->addons as $addon)
                                    <li>
                                        <strong>{{ $addon->name }}:</strong> {{ $addon->description }}
                                        <br><strong>Price:</strong> ${{ $addon->price }}
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
