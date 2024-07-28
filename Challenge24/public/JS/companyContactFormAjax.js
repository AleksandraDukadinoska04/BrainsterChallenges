$(document).ready(function () {
    $('#companyForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: 'storeCompany',
            type: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                $('#successMsg').removeClass('d-none');
                $('#formSuccess').text(response.success);
                $('#formErrors').empty();

                $('#email').val('');
                $('#phoneNumber').val('');
                $('#company').val('');

                $('#emailError').text('');
                $('#phoneNumberError').text('');
                $('#companyError').text('');
            },
            error: function (xhr) {
                $('#formErrors').empty();
                const errors = xhr.responseJSON.errors;
                $('#emailError').text(errors['email']);
                $('#phoneNumberError').text(errors['phoneNumber']);
                $('#companyError').text(errors['company']);
            }
        });
    });
});