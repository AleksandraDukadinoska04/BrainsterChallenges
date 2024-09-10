
function deleteVehicle(id) {
    if (confirm('Are you sure you want to delete this vehicle?')) {
        $.ajax({
            url: `/api/vehicles/${id}`,
            method: 'DELETE',
            success: function (response) {
                alert(response.message);
                location.reload() 
            },
            error: function (error) {
                console.log("Error deleting vehicle: ", error);
            }
        });
    }
}


$(document).ready(function () {
    fetchVehicles();
});