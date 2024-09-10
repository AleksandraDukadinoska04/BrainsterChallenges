function fetchVehicles() {
    $.ajax({
        url: '/api/vehicles',  
        method: 'GET',
        success: function(response) {
            console.log(response);  
            populateTable(response.data); 
        },
        error: function(xhr, status, error) {
            console.error('Error fetching vehicles:', error);  
            console.error(xhr.responseText);  
        }
    });
}


function populateTable(vehicles) {
    var tbody = $('#vehicle-table-body');
    tbody.empty();

    vehicles.forEach(function(vehicle) {
        var row = `
            <tr>
                <td>${vehicle.id}</td>
                <td>${vehicle.brand}</td>
                <td>${vehicle.model}</td>
                <td>${vehicle.plate_number}</td>
                <td>${vehicle.insurance_date}</td>
                <td>
                    <a href="dashboard/vehicles/${vehicle.id }/edit" class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger" onclick="deleteVehicle(${vehicle.id})">Delete</button>
                </td>
            </tr>
        `;
        tbody.append(row);
    });
}





