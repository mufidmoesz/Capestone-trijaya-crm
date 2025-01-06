@extends('layouts.layoutcontent')
@section('content')
    <h3>Appointment</h3>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Total Service</th>
                    <th scope="col">Last Appointment</th>
                    <th scope="col">Avarage Rating</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($trucks as $t)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $t->total_services }}</td>
                    <td>{{ $t->last_appointment }}</td>
                    <td>{{ $t->avg_rating }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

