@extends('layouts.layoutcontent')
@section('content')
    <h3>Sparepart</h3>
    <div>
        <button class="btn btn-light">+</button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($addons as $addon)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $addon->name }}</td>
                    <td>{{ $addon->description }}</td>
                    <td>{{ $addon->price}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
