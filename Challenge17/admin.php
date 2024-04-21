<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    die;
}
require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/Classes/Registrations.php';


$errors = ['vehicleModel' => false, 'vehicleType' => false, 'vehicleChassisNumber' => false, 'vehicleProducionYear' => false, 'vehicleRegistrationNumber' => false, 'fuelType' => false, 'registrationTo' => false];
$successMsg = ['addVehicle' => false];
$submit = true;


if ($_SERVER['REQUEST_METHOD'] == "POST" && !isset($_POST['search'])) {

    $vehicleChassisNumber = trim($_POST['vehicleChassisNumber']);
    $vehicleProducionYear = trim($_POST['vehicleProducionYear']);
    $vehicleRegistrationNumber = trim($_POST['vehicleRegistrationNumber']);
    $registrationTo = trim($_POST['registrationTo']);

    $checkChassisNumber = Registrations::checkChassisNumber($vehicleChassisNumber, $connection);
    $checkRegistrationNumber = Registrations::checkRegistrationNumber($vehicleRegistrationNumber, $connection);


    if (empty($_POST['vehicleModel'])) {
        $errors['vehicleModel'] = "<span class='text-danger fw-bold'> This field is requered! </span> <br>";
        $submit = false;
    } else {
        $vehicleModel = trim($_POST['vehicleModel']);
    }

    if (empty($_POST['vehicleType'])) {
        $errors['vehicleType'] = "<span class='text-danger fw-bold'> This field is requered! </span> <br>";
        $submit = false;
    } else {
        $vehicleType = trim($_POST['vehicleType']);
    }

    if (empty($vehicleChassisNumber)) {
        $errors['vehicleChassisNumber'] = "<span class='text-danger fw-bold'> This field is requered! </span> <br>";
        $submit = false;
    } elseif ($checkChassisNumber) {
        $errors['vehicleChassisNumber'] = "<span class='text-danger fw-bold'> Vehicle with this chassis number already exist! </span> <br>";
        $submit = false;
    }

    if (empty($vehicleProducionYear)) {
        $errors['vehicleProducionYear'] = "<span class='text-danger fw-bold'> This field is requered! </span> <br>";
        $submit = false;
    }

    if (empty($vehicleRegistrationNumber)) {
        $errors['vehicleRegistrationNumber'] = "<span class='text-danger fw-bold'> This field is requered! </span> <br>";
        $submit = false;
    } elseif ($checkRegistrationNumber) {
        $errors['vehicleRegistrationNumber'] = "<span class='text-danger fw-bold'> Vehicle with this registration number already exist! </span> <br>";
        $submit = false;
    }

    if (empty($_POST['fuelType'])) {
        $errors['fuelType'] = "<span class='text-danger fw-bold'> This field is requered! </span> <br>";
        $submit = false;
    } else {
        $fuelType = $_POST['fuelType'];
    }

    if (empty($registrationTo)) {
        $errors['registrationTo'] = "<span class='text-danger fw-bold'> This field is requered! </span> <br>";
        $submit = false;
    }

    if ($submit) {

        $array = [
            ':vehicle_model' => $vehicleModel,
            ':vehicle_type' => $vehicleType,
            ':vehicle_chassis_number' => $vehicleChassisNumber,
            ':vehicle_production_year' => $vehicleProducionYear,
            ':registration_number' => $vehicleRegistrationNumber,
            ':fuel_type' => $fuelType,
            ':registration_to' => $registrationTo
        ];

        Registrations::insertIntoRegistrations($array, $connection);

        $successMsg['addVehicle'] = "<span class='text-success fw-bold'> New Vehicle Added! </span> <br>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['search']) && !empty($_POST['search'])) {
    $search = trim($_POST['search']);

    $searchResult = Registrations::search($search, $connection);
}


$models = Registrations::selectAllFrom('vehicle_models', $connection);
$types = Registrations::selectAllFrom('vehicle_types', $connection);
$fuels = Registrations::selectAllFrom('fuel_types', $connection);

$vehicles = Registrations::selectFromRegistrations($connection);

?>

<!doctype html>
<html lang="en">

<head>
    <title>Admin</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin.php">Vehicle Registration</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                    <li class="nav-item ">
                        <a class="nav-link" href="./VehicleModels-CRUD//vehicle_models.php">Vehicle Models</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="logout.php">Logout</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <!-- NAVBAR -->

    <!-- FORM -->
    <h1 class="text-center m-4">Vehicle Registration</h1>

    <div class="d-flex flex-wrap w-50 mx-auto">

        <form action="" method="POST">
            <div class="row g-4">
                <div class="col-6">
                    <label for="vehicleModel" class="d-block fw-bold">Vehicle Model</label>
                    <select name="vehicleModel" id="vehicleModel" class="w-100 p-1 border border-2 border-light-subtle rounded d-block">
                        <option value="" disabled selected>Choose vehicle model</option>

                        <?php foreach ($models as $model) { ?>
                            <option value=" <?= $model['id'] ?> "><?= $model['vehicle_model'] ?></option>
                        <?php } ?>

                    </select>
                    <?= $errors['vehicleModel'] ? $errors['vehicleModel'] : ''; ?>


                </div>

                <div class="col-6">
                    <label for="vehicleType" class="d-block fw-bold">Vehicle Type</label>
                    <select name="vehicleType" id="vehicleType" class="w-100 p-1 border border-2 border-light-subtle rounded d-block">
                        <option value="" selected disabled>Choose vehicle type</option>

                        <?php foreach ($types as $type) { ?>
                            <option value="<?= $type['id'] ?> "><?= $type['vehicle_type'] ?></option>
                        <?php } ?>

                    </select>
                    <?= $errors['vehicleType'] ? $errors['vehicleType'] : ''; ?>

                </div>

                <div class=" col-6">
                    <label for="vehicleChassisNumber" class="d-block fw-bold">Vehicle Chassis Number</label>
                    <input type="text" id="vehicleChassisNumber" name="vehicleChassisNumber" class="w-100 p-1 border border-2 border-light-subtle rounded d-block">
                    <?= $errors['vehicleChassisNumber'] ? $errors['vehicleChassisNumber'] : ''; ?>

                </div>

                <div class="col-6">
                    <label for="vehicleProducionYear" class="d-block fw-bold">Vehicle Producion Year</label>
                    <input type="date" id="vehicleProducionYear" name="vehicleProducionYear" class="w-100 p-1 border border-2 border-light-subtle rounded d-block">
                    <?= $errors['vehicleProducionYear'] ? $errors['vehicleProducionYear'] : ''; ?>

                </div>

                <div class="col-6">
                    <label for="vehicleRegistrationNumber" class="d-block fw-bold">Vehicle Registration Number</label>
                    <input type="text" id="vehicleRegistrationNumber" name="vehicleRegistrationNumber" class="w-100 p-1 border border-2 border-light-subtle rounded d-block">
                    <?= $errors['vehicleRegistrationNumber'] ? $errors['vehicleRegistrationNumber'] : ''; ?>

                </div>

                <div class="col-6">
                    <label for="fuelType" class="d-block fw-bold">Fuel Type</label>
                    <select name="fuelType" id="fuelType" class="w-100 p-1 border border-2 border-light-subtle rounded d-block">
                        <option value="" disabled selected>Choose fuel type</option>

                        <?php foreach ($fuels as $fuel) { ?>
                            <option value="<?= $fuel['id'] ?> "><?= $fuel['fuel_type'] ?></option>
                        <?php } ?>

                    </select>
                    <?= $errors['fuelType'] ? $errors['fuelType'] : ''; ?>

                </div>

                <div class="col-6">
                    <label for="registrationTo" class="d-block fw-bold">Registration to</label>
                    <input type="date" id="registrationTo" name="registrationTo" class="w-100 p-1 border border-2 border-light-subtle rounded d-block">
                    <?= $errors['registrationTo'] ? $errors['registrationTo'] : ''; ?>

                </div>

                <div class="col-6">
                    <button type="submit" class="btn btn-primary w-100 mt-4">Submit</button>
                </div>

            </div>
        </form>
    </div>
    <!-- FORM -->


    <!-- TABLE -->
    <div class="container my-4 py-4 ">
        <?= $successMsg['addVehicle'] ? $successMsg['addVehicle'] : ''; ?>

        <!-- SEARCH -->
        <form action="" method="POST" class="text-end bg-light p-2">
            <input type="text" id="search" name="search" placeholder="Search..." class="w-25 p-1 border border-2 border-light-subtle rounded ">
            <button type="submit" class="btn btn-primary mx-1">Search</button>
        </form>
        <!-- SEARCH -->

        <table class="table ">
            <thead>
                <tr>
                    <th>#</th>
                    <th>vehicle model</th>
                    <th>vehicle type</th>
                    <th>vehicle chassis number</th>
                    <th>vehicle production year</th>
                    <th>registration number</th>
                    <th>fuel type</th>
                    <th>registration to</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['search']) && !empty($_POST['search'])) { ?>

                <tbody>

                    <?php foreach ($searchResult as $vehicle) { ?>
                        <tr>
                            <td <?= Registrations::expiredDate($vehicle) ?>><?php echo $vehicle['id'] ?></td>
                            <td <?= Registrations::expiredDate($vehicle) ?>><?php echo $vehicle['vehicle_model'] ?></td>
                            <td <?= Registrations::expiredDate($vehicle) ?>><?php echo $vehicle['vehicle_type'] ?></td>
                            <td <?= Registrations::expiredDate($vehicle) ?>><?php echo $vehicle['vehicle_chassis_number'] ?></td>
                            <td <?= Registrations::expiredDate($vehicle) ?>><?php echo $vehicle['vehicle_production_year'] ?></td>
                            <td <?= Registrations::expiredDate($vehicle) ?>><?php echo $vehicle['registration_number'] ?></td>
                            <td <?= Registrations::expiredDate($vehicle) ?>><?php echo $vehicle['fuel_type'] ?></td>
                            <td <?= Registrations::expiredDate($vehicle) ?>><?php echo $vehicle['registration_to'] ?></td>
                            <td>
                                <a href="deleteVehicle.php?id=<?= $vehicle['id'] ?>" class="btn btn-danger">Delete</a>
                                <a href="editVehicle.php?id=<?= $vehicle['id'] ?>" class="btn btn-warning">Edit</a>
                                <?php
                                $exparedDate = Registrations::expiredDate($vehicle);
                                if ($exparedDate) {
                                ?>
                                    <a href='extend.php?id=<?= $vehicle['id'] ?>' class='btn btn-success'>Extend</a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
        </table>


    <?php } else { ?>

        <tbody>

            <?php foreach ($vehicles as $vehicle) { ?>
                <tr>
                    <td <?= Registrations::expiredDate($vehicle) ?>><?php echo $vehicle['id'] ?></td>
                    <td <?= Registrations::expiredDate($vehicle) ?>><?php echo $vehicle['vehicle_model'] ?></td>
                    <td <?= Registrations::expiredDate($vehicle) ?>><?php echo $vehicle['vehicle_type'] ?></td>
                    <td <?= Registrations::expiredDate($vehicle) ?>><?php echo $vehicle['vehicle_chassis_number'] ?></td>
                    <td <?= Registrations::expiredDate($vehicle) ?>><?php echo $vehicle['vehicle_production_year'] ?></td>
                    <td <?= Registrations::expiredDate($vehicle) ?>><?php echo $vehicle['registration_number'] ?></td>
                    <td <?= Registrations::expiredDate($vehicle) ?>><?php echo $vehicle['fuel_type'] ?></td>
                    <td <?= Registrations::expiredDate($vehicle) ?>><?php echo $vehicle['registration_to'] ?></td>
                    <td>
                        <a href="deleteVehicle.php?id=<?= $vehicle['id'] ?>" class="btn btn-danger">Delete</a>

                        <a href="editVehicle.php?id=<?= $vehicle['id'] ?>" class="btn btn-warning">Edit</a>

                        <?php
                        $exparedDate = Registrations::expiredDate($vehicle);
                        if ($exparedDate) {
                        ?>
                            <a href='extend.php?id=<?= $vehicle['id'] ?>' class='btn btn-success'>Extend</a>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>

        </tbody>
        </table>
    <?php } ?>
    </div>
    <!-- TABLE -->



    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>