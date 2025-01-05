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
    .table {
        table-layout: auto;
    }
</style>
@section('content')

<div class="container">
    <div class="row ">
        <div class="col-12">
            <h1 class="mt-3">Daftar Booking</h1>
            <a href="{{ route('form') }}" class="btn btn-primary my-3">Tambah Booking Baru</a>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
</div>
<div class="container">
<div class="container-fluid">
            <h3>Dashboard</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="card-custom">
                        <h5>Income</h5>
                        <h2>IDR 90.852.000</h2>
                        <p>Income from 1 month</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-custom">
                        <h5>Completed Service</h5>
                        <h2>150 Times</h2>
                        <p>Completed from 1 month</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-custom">
                        <h5>Avg. Rating</h5>
                        <h2>5/5</h2>
                        <p>Avg. Rating from 1 month</p>
                    </div>
                </div>
            </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Nomor Telepon</th>
                <th scope="col">Nomor Truk</th>
                <th scope="col">Jenis Bahan Bakar</th>
                <th scope="col">Tanggal Booking</th>
                <th scope="col">Waktu Booking</th>
                <th scope="col">Status</th>
                <th scope="col" style="width: 170px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach ($bookings as $booking)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $booking->customer_name }}</td>
                <td>{{ $booking->customer_phone }}</td>
                <td>{{ $booking->truck_number }}</td>
                <td>{{ $booking->fuel_type }}</td>
                <td>{{ date('d F Y', strtotime($booking->booking_date)) }}</td>
                <td>{{ $booking->booking_time }}</td>
                <td>
                    @if ($booking->status == 1)
                        <span class="badge bg-success">Completed</span>
                    @else
                        <span class="badge bg-warning">Pending</span>
                    @endif
                </td>
                <td>
                    <a href="/booking/{{ $booking->id }}/edit" class="btn btn-success">Ubah</a>
                    <form action="/booking/{{ $booking->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
