@extends('layouts.layoutcontent')

@section('content')
    <div class="container">
        <h1>Create New Service</h1>

        <form action="/services/{{$service->service_id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="service_name">Service Name</label>
                <input type="text" name="service_name" id="service_name" class="form-control" value="{{ $service->service_name }}" required>
            </div>

            <div class="form-group">
                <label for="service_description">Service Description</label>
                <textarea name="service_description" id="service_description" class="form-control" required>{{ $service->service_description }}</textarea>
            </div>

            <div class="form-group">
                <label for="service_price">Service Price</label>
                <input type="number" name="service_price" id="service_price" class="form-control"  value="{{ $service->service_price }}"  required>
            </div>

            <div class="form-group">
                <label for="estimated_time">Estimated Time</label>
                <input type="text" name="estimated_time" id="estimated_time" class="form-control"  value="{{ $service->estimated_time }}"  required>
            </div>

            <button type="submit" class="btn btn-primary">Update Service</button>
        </form>
    </div>
@endsection
