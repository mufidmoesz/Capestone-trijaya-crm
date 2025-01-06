@extends('layouts.layoutcontent')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Booking</h2>
    <form action="/bookings/{{ $booking->booking_id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="services_service_id" class="form-label">Service</label>
            <select class="form-select" id="services_service_id" name="service_id" required>
                <option value="" selected>Choose Service</option>
                @foreach ($services as $service)
                <option value="{{ $service->service_id }}" {{ $booking->service_id == $service->service_id ? 'selected' : '' }}>
                    {{ $service->service_name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="customer_name" class="form-label">Customer Name</label>
            <input type="text" class="form-control" id="customers_customer_name" name="customer_name" value="{{ $booking->customer_name }}" required>
        </div>

        <div class="mb-3">
            <label for="customers_customer_phone" class="form-label">Customer Phone</label>
            <input type="text" class="form-control" id="customers_customer_phone" name="customer_phone" value="{{ $booking->customer_phone }}" required>
        </div>

        <div class="mb-3">
            <label for="trucks_truck_number" class="form-label">Truck Number</label>
            <input type="text" class="form-control" id="trucks_truck_number" name="truck_number" value="{{ $booking->truck_number }}" required>
        </div>

        <div class="mb-3">
            <label for="fuel_types_fuel_type" class="form-label">Fuel Type</label>
            <input type="text" class="form-control" id="fuel_types_fuel_type" name="fuel_type" value="{{ $booking->fuel_type }}" required>
        </div>

        <div class="mb-3">
            <label for="bookings_booking_date" class="form-label">Booking Date</label>
            <input type="date" class="form-control" id="bookings_booking_date" name="booking_date" value="{{ $booking->booking_date }}" required>
        </div>

        <div class="mb-3">
            <label for="bookings_booking_time" class="form-label">Booking Time</label>
            <input type="time" class="form-control" id="bookings_booking_time" name="booking_time" value="{{ $booking->booking_time }}" required>
        </div>

        <div class="mb-3">
            <label for="add-ons" class="form-label">Add-ons</label>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Select Add-ons
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach ($addons as $addon)
                    <div class="dropdown-item form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="addons[]"
                            value="{{ $addon->addon_id }}"
                            id="addon_{{ $addon->addon_id }}"
                            {{ in_array($addon->addon_id, $booking->addons->pluck('addon_id')->toArray()) ? 'checked' : '' }}
                        >
                        <label class="form-check-label" for="addon_{{ $addon->addon_id }}">
                            {{ $addon->name }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


        <div class="mb-3">
            <label for="statuses_status_id" class="form-label">Status</label>
            <select class="form-select" id="statuses_status_id" name="status_id" required>
                @foreach ($statuses as $status)
                <option value="{{ $status->status_id }}" {{ $booking->status == $status->status_id ? 'selected' : '' }}>
                    {{ $status->status_name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="bookings_estimated_total_price" class="form-label">Estimated Total Price</label>
            <input type="text" class="form-control" id="bookings_estimated_total_price" name="estimated_total_price" value="{{ $booking->estimated_total_price }}" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{ route('admin.appointment.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

@section('scripts')
<!-- Include Bootstrap and JavaScript for interactivity -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dropdownMenu = document.querySelector('.dropdown-menu');
        const dropdownButton = document.querySelector('#dropdownMenuButton');

        function updateButtonText() {
            const selected = dropdownMenu.querySelectorAll('input:checked').length;
            dropdownButton.textContent = selected > 0 ? `${selected} Add-ons Selected` : 'Select Add-ons';
        }

        // Initial update
        updateButtonText();

        // Add event listener to checkboxes
        dropdownMenu.addEventListener('change', updateButtonText);
    });
</script>


<style>
    .btn-group .btn {
        margin: 5px; /* Add spacing between buttons */
        border-radius: 5px; /* Rounded corners for a modern look */
    }

    .btn-group .btn.active {
        background-color: #007bff; /* Highlighted color for selected options */
        color: white; /* White text for better contrast */
        border-color: #007bff;
    }
</style>
@endsection
