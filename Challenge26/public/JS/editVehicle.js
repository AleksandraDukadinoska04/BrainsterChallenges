$('#editVehicleForm').on('submit', function(e) {
    e.preventDefault();

    var vehicleId = $('#vehicle_id').val(); 

    var formData = {
        brand: $('#brand').val(),
        model: $('#model').val(),
        plate_number: $('#plate_number').val(),
        insurance_date: $('#insurance_date').val(),
        _token: $('meta[name="csrf-token"]').attr('content'), 
        _method: 'PUT' 
    };

   
    $.ajax({
        url: '/api/vehicles/' + vehicleId, 
        method: 'POST',  
        data: formData,
        success: function(response) {
            alert(response.message);
            window.location.href = '/';  
        },
        error: function(xhr, status, error) {
            console.error('Error updating vehicle:', error);
            alert('Error updating vehicle. Please try again.');
        }
    });
});