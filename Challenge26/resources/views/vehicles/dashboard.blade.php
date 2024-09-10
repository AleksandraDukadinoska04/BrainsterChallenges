@extends('vehicles.layout.app')

@section('content')

<div class="container py-5">


    <h1 class="text-center">Vehicle Dashboard</h1>

    <div class="w-25 ms-auto d-flex align-itemns-center justify-content-end mt-5">
        <a href="{{ route('dashboard.vehicle.create') }}" class="btn btn-success  ">Add Vehicle</a>
    </div>

    <table class="table table-striped table-bordered mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Plate Number</th>
                <th>Insurance Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="vehicle-table-body">

        </tbody>
    </table>
</div>


@endsection