
$('#vehicleForm').on('submit', function(e) {
    e.preventDefault(); 

    var formData = {
        brand: $('#brand').val(),
        model: $('#model').val(),
        plate_number: $('#plate_number').val(),
        insurance_date: $('#insurance_date').val(),
        _token: $('meta[name="csrf-token"]').attr('content') 
    };

  
    $.ajax({
        url: '/api/vehicles', 
        method: 'POST',
        data: formData,
        success: function(response) {
            alert(response.message);
            $('#vehicleForm')[0].reset();  
            window.location.href = '/';  
        },
        error: function(xhr, status, error) {
            console.error('Error creating vehicle:', error);
            alert('Error creating vehicle. Please try again.');
        }
    });
});