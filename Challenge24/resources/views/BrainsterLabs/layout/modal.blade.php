<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">Вработи наши студенти</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div id="successMsg" class=" alert alert-success alert-dismissible fade show my-2 px-3 mx-auto w-100 d-none" role="alert">
                    <p class="fw-bold m-0 p-0 text-success " id="formSuccess"></p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <small class="text-muted mt-2">Внесете ваши иформации за да стапиме во контакт:</small>

                <form action="{{ route('storeCompany') }}" method="POST" id="companyForm">
                    @csrf

                    <input type="text" hidden id="created_at" name="created_at" value="{{ now() }}">
                    <input type="text" hidden id="updated_at" name="updated_at" value="{{ now() }}">

                    <div class="my-4">
                        <label for="email" class="form-label">Е-мејл</label>
                        <input type="email" required class="form-control" id="email" name="email" value="{{ old('email') }}">
                        <small id="emailError" class="text-danger fw-bold"></small>
                    </div>
                    <div class="my-4">
                        <label for="phoneNumber" class="form-label">Телефон</label>
                        <input type="number" required class="form-control" id="phoneNumber" name="phoneNumber" value="{{ old('phoneNumber') }}">
                        <small id="phoneNumberError" class="text-danger fw-bold"></small>
                    </div>
                    <div class="my-4">
                        <label for="company" class="form-label">Компанија</label>
                        <input type="text" required class="form-control" id="company" name="company" value="{{ old('company') }}">
                        <small id="companyError" class="text-danger fw-bold"></small>
                    </div>

                    <button type="submit" id="companySubmit" class="btn w-100 gold fw-bold">Испрати</button>
                </form>
            </div>

        </div>
    </div>
</div>