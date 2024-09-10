@extends('vehicles.layout.app')

@section('content')

<main>

    <div class="container">
        <div class="w-50 mx-auto">
            <h3 class="mt-5 fw-bold text-center">Edit Vehicle:</h3>

            <form id="editVehicleForm">
                @csrf
                @method('PUT')

                <input type="hidden" id="vehicle_id" value="{{ $vehicle->id }}">

                <div class="form-group mb-3">
                    <label for="brand" class="form-label">Brand</label>
                    <input type="text" id="brand" name="brand" class="form-control" value="{{ $vehicle->brand }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input type="text" id="model" name="model" class="form-control" value="{{ $vehicle->model }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="plate_number" class="form-label">Plate Number</label>
                    <input type="text" id="plate_number" name="plate_number" class="form-control" value="{{ $vehicle->plate_number }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="insurance_date" class="form-label">Insurance Date</label>
                    <input type="date" id="insurance_date" name="insurance_date" class="form-control" value="{{ $vehicle->insurance_date }}" required>
                </div>

                <button type="submit" class="btn btn-success mt-3">Update Vehicle</button>
            </form>
        </div>
    </div>
</main>
@endsection