@extends('vehicles.layout.app')

@section('content')

<main>

    <div class="container">
        <div class="w-50 mx-auto">
            <h3 class="mt-5 fw-bold text-center">Add new Vehicle:</h3>

            <form id="vehicleForm">
                @csrf
                <input type="hidden" id="vehicle_id" name="vehicle_id">
                <div class="mb-3">
                    <label for="brand" class="form-label">Brand</label>
                    <input type="text" class="form-control" id="brand" name="brand" required>
                </div>
                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input type="text" class="form-control" id="model" name="model" required>
                </div>
                <div class="mb-3">
                    <label for="plate_number" class="form-label">Plate Number</label>
                    <input type="text" class="form-control" id="plate_number" name="plate_number" required>
                </div>
                <div class="mb-3">
                    <label for="insurance_date" class="form-label">Insurance Date</label>
                    <input type="date" class="form-control" id="insurance_date" name="insurance_date" required>
                </div>
                <button type="submit" class="btn btn-success mt-3">Add</button>

            </form>
        </div>
    </div>
</main>

@endsection