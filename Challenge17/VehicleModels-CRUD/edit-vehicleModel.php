<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../../login.php.php");
    return;
}

if (!isset($_GET['id'])) {
    header('Location: vehicle_models.php');
    return;
}

require_once '../autoload.php';
require_once '../Classes/Registrations.php';

$errors = ['vehicleModel' => false];
$edit = true;

$id = $_GET['id'];

$vehicleModel = Registrations::selectModels('id', $id, $connection);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $vehicle_model = trim($_POST['vehicleModel']);


    $allModels = Registrations::selectAllExcept('vehicle_models', $id, 'id', $connection);
    $checkModel = false;


    foreach ($allModels as $row) {
        if ($row['vehicle_model'] == $vehicle_model) {
            $checkModel = true;
        }
    }



    if (empty($vehicle_model)) {
        $errors['vehicleModel'] = "<span class='text-danger fw-bold'> Please enter some vehicle model! </span> <br>";
        $edit = false;
    } elseif ($checkModel) {
        $errors['vehicleModel'] = "<span class='text-danger fw-bold'> This model already exist! </span> <br>";
        $edit = false;
    }

    if ($edit) {
        Registrations::updateModels($id, $vehicle_model, $connection);

        header('Location: vehicle_models.php?message=successfulyEdited');
        return;
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <title>Edit Vehicle Model</title>
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
    <h1 class="text-center m-4">Edit Vehicle</h1>

    <div class="w-50 mx-auto text-center">

        <form action="" method="POST">
            <input type="text" id="vehicleModel" name="vehicleModel" class="w-50 p-1 border border-2 border-light-subtle rounded d-block mx-auto" value=" <?= $vehicleModel['vehicle_model'] ?>">
            <?= $errors['vehicleModel'] ? $errors['vehicleModel'] : ''; ?>
            <button type="submit" class="btn btn-warning mt-4">Edit</button>

        </form>
    </div>
    <!-- FORM -->


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>