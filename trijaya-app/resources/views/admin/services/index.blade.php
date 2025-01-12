@extends('layouts.layoutcontent')
@section('content')
    <h3>Appointment</h3>
    <div>
        <div class="text-end mb-3">
            <a href="/services/create" class="btn btn-primary btn-sm">Add</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Service Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Est. Time</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($services as $t)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $t->service_name }}</td>
                    <td>{{ $t->service_description }}</td>
                    <td>{{ $t->service_price }}</td>
                    <td>{{ $t->estimated_time }}</td>
                    <form action = '/services/{{$t->service_id}}' method="POST">
                    @csrf
                    @method('DELETE')
                    <td>
                    <a href="services/{{ $t->service_id }}/edit" class="btn btn-warning btn-sm">Update</a>
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </td>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

