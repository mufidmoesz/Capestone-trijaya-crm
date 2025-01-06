@extends('layouts.layoutcontent')

@section('content')
    <div class="container">
        <h1>Create New Service</h1>

        <form action="{{ route('admin.services.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="service_name">Service Name</label>
                <input type="text" name="service_name" id="service_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="service_description">Service Description</label>
                <textarea name="service_description" id="service_description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="service_price">Service Price</label>
                <input type="float" name="service_price" id="service_price" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="estimated_time">Estimated Time</label>
                <input type="text" name="estimated_time" id="estimated_time" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Service</button>
        </form>
    </div>
@endsection
