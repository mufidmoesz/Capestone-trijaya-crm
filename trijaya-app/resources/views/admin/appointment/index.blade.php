@extends('layouts.layoutcontent')
@section('content')
<div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
    <h3>Dashboard</h3>
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
                            <td><button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal">Detail</button></td>
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
                        @endforeach
                </tbody>
            </table>
        </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Addons Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
