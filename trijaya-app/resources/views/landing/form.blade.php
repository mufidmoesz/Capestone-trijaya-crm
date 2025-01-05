@extends('layouts.formlay')
@extends('barbar.navform')

@section('content')
<div class="mt-5 container-xxl custom-home">
    <h1>Booking</h1>
    <form action="bookings" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="customer_name" class="form-label">Nama Pendek</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Becham" required>
        </div>
        <div class="mb-3">
            <label for="customer_phone" class="form-label">No Telp</label>
            <input class="form-control" id="customer_phone" name="customer_phone" rows="3" placeholder="08xxxxxxx" required></input>
        </div>
        <div class="mb-3">
            <label for="truck_number" class="form-label">Plat Nomor</label>
            <input type="text" class="form-control" id="truck_number" name="truck_number" placeholder="B XXXX DTN" required>
        </div>
        <div class="mb-3">
            <label for="fuel_type" class="form-label">Bahan Bakar</label>
            <select class="form-select" name="fuel_type" aria-label="Fuel Type" required>
                <option value="" selected disabled>Pilih Bahan Bakar</option>
                <option value="Solar">Solar</option>
                <option value="Bensin">Bensin</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="booking_date" class="form-label">Tanggal Booking</label>
            <input class="form-control" type="date" id="booking_date" name="booking_date" required>
        </div>
        <div class="mb-3">
            <label for="booking_time" class="form-label">Jam</label>
            <input type="time" class="form-control" id="booking_time" name="booking_time" required>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Submit</button>
    </form>
</div>
<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Booking has been successfully created!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Add a hidden element to pass the session message -->
<div id="success-message" data-success="{{ session('success') }}"></div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    window.addEventListener('DOMContentLoaded', function () {
        // Get the success message from the hidden div
        var successMessage = document.getElementById('success-message').getAttribute('data-success');

        // If the success message exists, show the modal
        if (successMessage) {
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show(); // Show the modal
        }
    });
</script>

@endsection
