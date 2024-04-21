<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    die;
}
if (!isset($_GET['id'])) {
    header('Location: admin.php');
    return;
}
require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/Classes/Registrations.php';


$errors = ['vehicleModel' => false, 'vehicleType' => false, 'vehicleChassisNumber' => false, 'vehicleProducionYear' => false, 'vehicleRegistrationNumber' => false, 'fuelType' => false, 'registrationTo' => false];
$edit = true;

$id = $_GET['id'];
$vehicleFromID = Registrations::selectWhereID($id, $connection);


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $vehicleChassisNumber = trim($_POST['vehicleChassisNumber']);
    $vehicleProducionYear = trim($_POST['vehicleProducionYear']);
    $vehicleRegistrationNumber = trim($_POST['vehicleRegistrationNumber']);
    $registrationTo = trim($_POST['registrationTo']);


    $allChassisNumbers = Registrations::selectAllExcept('registrations', $id, 'id', $connection);
    $allRegistrationNumbers = Registrations::selectAllExcept('registrations', $id, 'id', $connection);

    $checkChassisNumber = false;
    $checkRegistrationNumber = false;


    foreach ($allChassisNumbers as $row) {
        if ($row['vehicle_chassis_number'] === $vehicleChassisNumber) {
            $checkChassisNumber = true;
        }
    }
    foreach ($allRegistrationNumbers as $row) {
        if ($row['vehicle_chassis_number'] === $vehicleChassisNumber) {
            $checkRegistrationNumber = true;
        }
    }



    if (empty($_POST['vehicleModel'])) {
        $errors['vehicleModel'] = "<span class='text-danger fw-bold'> This field is requered! </span> <br>";
        $edit = false;
    } else {
        $vehicleModel = $_POST['vehicleModel'];
    }

    if (empty($_POST['vehicleType'])) {
        $errors['vehicleType'] = "<span class='text-danger fw-bold'> This field is requered! </span> <br>";
        $edit = false;
    } else {
        $vehicleType = $_POST['vehicleType'];
    }

    if (empty($vehicleChassisNumber)) {
        $errors['vehicleChassisNumber'] = "<span class='text-danger fw-bold'> This field is requered! </span> <br>";
        $edit = false;
    } elseif ($checkChassisNumber) {
        $errors['vehicleChassisNumber'] = "<span class='text-danger fw-bold'> Vehicle with his chassis number already exist! </span> <br>";
        $edit = false;
    }

    if (empty($vehicleProducionYear)) {
        $errors['vehicleProducionYear'] = "<span class='text-danger fw-bold'> This field is requered! </span> <br>";
        $edit = false;
    }

    if (empty($vehicleRegistrationNumber)) {
        $errors['vehicleRegistrationNumber'] = "<span class='text-danger fw-bold'> This field is requered! </span> <br>";
        $edit = false;
    } elseif ($checkRegistrationNumber) {
        $errors['vehicleRegistrationNumber'] = "<span class='text-danger fw-bold'> Vehicle with his registration number already exist! </span> <br>";
        $edit = false;
    }

    if (empty($_POST['fuelType'])) {
        $errors['fuelType'] = "<span class='text-danger fw-bold'> This field is requered! </span> <br>";
        $edit = false;
    } else {
        $fuelType = $_POST['fuelType'];
    }

    if (empty($registrationTo)) {
        $errors['registrationTo'] = "<span class='text-danger fw-bold'> This field is requered! </span> <br>";
        $edit = false;
    }

    if ($edit) {

        $array = [
            ':vehicle_model' => $vehicleModel,
            ':vehicle_type' => $vehicleType,
            ':vehicle_chassis_number' => $vehicleChassisNumber,
            ':vehicle_production_year' => $vehicleProducionYear,
            ':registration_number' => $vehicleRegistrationNumber,
            ':fuel_type' => $fuelType,
            ':registration_to' => $registrationTo,
            ':id' => $id

        ];

        Registrations::updateWhereID($array, $connection);

        header('Location: admin.php?message=successfulyEdited');
        return;
    }
}


$models = Registrations::selectAllFrom('vehicle_models', $connection);
$types = Registrations::selectAllFrom('vehicle_types', $connection);
$fuels = Registrations::selectAllFrom('fuel_types', $connection);
$vehicles = Registrations::selectAllFrom('registrations', $connection);

?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />


</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Vehicle Registration</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="admin.php">Home</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <!-- NAVBAR -->


    <!-- FORM -->
    <h1 class="text-center m-4">Edit Vehicle</h1>

    <div class="d-flex flex-wrap w-50 mx-auto">

        <form action="" method="POST">
            <div class="row g-4">
                <div class="col-6">
                    <label for="vehicleModel" class="d-block fw-bold">Vehicle Model</label>
                    <select name="vehicleModel" id="vehicleModel" class="w-100 p-1 border border-2 border-light-subtle rounded d-block">
                        <option value="" disabled selected>Choose vehicle model</option>

                        <?php foreach ($models as $model) { ?>
                            <option value=" <?= $model['id'] ?>" <?= $vehicleFromID['vehicle_model'] == $model['vehicle_model'] ? 'selected' : ''  ?>> <?= $model['vehicle_model'] ?></option>
                        <?php } ?>

                    </select>
                    <?= $errors['vehicleModel'] ? $errors['vehicleModel'] : ''; ?>
                </div>

                <div class="col-6">
                    <label for="vehicleType" class="d-block fw-bold">Vehicle Type</label>
                    <select name="vehicleType" id="vehicleType" class="w-100 p-1 border border-2 border-light-subtle rounded d-block">
                        <option value="" selected disabled>Choose vehicle type</option>

                        <?php foreach ($types as $type) { ?>
                            <option value="<?= $type['id'] ?> " <?= $vehicleFromID['vehicle_type'] == $type['vehicle_type'] ? 'selected' : ''  ?>><?= $type['vehicle_type'] ?></option>
                        <?php } ?>

                    </select>
                    <?= $errors['vehicleType'] ? $errors['vehicleType'] : ''; ?>

                </div>

                <div class=" col-6">
                    <label for="vehicleChassisNumber" class="d-block fw-bold">Vehicle Chassis Number</label>
                    <input type="text" id="vehicleChassisNumber" name="vehicleChassisNumber" class="w-100 p-1 border border-2 border-light-subtle rounded d-block" value="<?= $vehicleFromID['vehicle_chassis_number'] ?>">
                    <?= $errors['vehicleChassisNumber'] ? $errors['vehicleChassisNumber'] : ''; ?>

                </div>

                <div class="col-6">
                    <label for="vehicleProducionYear" class="d-block fw-bold">Vehicle Producion Year</label>
                    <input type="date" id="vehicleProducionYear" name="vehicleProducionYear" class="w-100 p-1 border border-2 border-light-subtle rounded d-block" value="<?= $vehicleFromID['vehicle_production_year'] ?>-01-01">
                    <?= $errors['vehicleProducionYear'] ? $errors['vehicleProducionYear'] : ''; ?>

                </div>

                <div class="col-6">
                    <label for="vehicleRegistrationNumber" class="d-block fw-bold">Vehicle Registration Number</label>
                    <input type="text" id="vehicleRegistrationNumber" name="vehicleRegistrationNumber" class="w-100 p-1 border border-2 border-light-subtle rounded d-block" value="<?= $vehicleFromID['registration_number'] ?>">
                    <?= $errors['vehicleRegistrationNumber'] ? $errors['vehicleRegistrationNumber'] : ''; ?>

                </div>

                <div class="col-6">
                    <label for="fuelType" class="d-block fw-bold">Fuel Type</label>
                    <select name="fuelType" id="fuelType" class="w-100 p-1 border border-2 border-light-subtle rounded d-block">
                        <option value="" disabled selected>Choose fuel type</option>

                        <?php foreach ($fuels as $fuel) { ?>
                            <option value="<?= $fuel['id'] ?> " <?= $vehicleFromID['fuel_type'] == $fuel['fuel_type'] ? 'selected' : ''  ?>> <?= $fuel['fuel_type'] ?></option>
                        <?php } ?>

                    </select>
                    <?= $errors['fuelType'] ? $errors['fuelType'] : ''; ?>

                </div>

                <div class="col-6">
                    <label for="registrationTo" class="d-block fw-bold">Registration to</label>
                    <input type="date" id="registrationTo" name="registrationTo" class="w-100 p-1 border border-2 border-light-subtle rounded d-block" value="<?= $vehicleFromID['registration_to'] ?>">
                    <?= $errors['registrationTo'] ? $errors['registrationTo'] : ''; ?>

                </div>

                <div class="col-6">
                    <button type="submit" class="btn btn-warning w-100 mt-4">Edit</button>
                </div>

            </div>
        </form>
    </div>
    <!-- FORM -->






    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>