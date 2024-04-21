<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../../login.php");
    return;
}

require_once '../autoload.php';
require_once '../Classes/Registrations.php';

$errors = ['vehicleModel' => false];
$add = true;


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $vehicleModel = trim($_POST['vehicleModel']);

    $model = Registrations::selectModels('vehicle_model', $vehicleModel, $connection);

    if (empty($vehicleModel)) {
        $errors['vehicleModel'] = "<span class='text-danger fw-bold'> Please enter some vehicle model! </span> <br>";
        $add = false;
    } elseif ($model) {
        $errors['vehicleModel'] = "<span class='text-danger fw-bold'> This model already exist! </span> <br>";
        $add = false;
    }

    if ($add) {

        Registrations::insertModels($vehicleModel, $connection);

        header('Location: vehicle_models.php?message=successfulyAdded');
        die;
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <title>ADD New Vehicle Model</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../admin.php">Vehicle Registration</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="vehicle_models.php">Back</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <!-- NAVBAR -->


    <!-- FORM -->
    <h1 class="text-center m-4">ADD New Vehicle Model</h1>

    <div class="w-50 mx-auto text-center">

        <form action="" method="POST">
            <input type="text" id="vehicleModel" name="vehicleModel" class="w-50 p-1 border border-2 border-light-subtle rounded d-block mx-auto">
            <?= $errors['vehicleModel'] ? $errors['vehicleModel'] : ''; ?>
            <button type="submit" class="btn btn-success mt-4">ADD</button>

        </form>
    </div>
    <!-- FORM -->

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>