<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../../login.php");
    return;
}
require_once '../autoload.php';
require_once '../Classes/Registrations.php';


$models = Registrations::selectAllFrom('vehicle_models', $connection);

?>

<!doctype html>
<html lang="en">

<head>
    <title>Vehicle Models</title>
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
                        <a class="nav-link text-primary" href="../../admin.php">Home</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <!-- NAVBAR -->


    <!-- TABLE -->
    <h1 class="text-center m-4">Vehicle Models</h1>

    <div class="w-25 mx-auto">
        <table class="table ">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Vehicle Model</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($models as $model) { ?>
                    <tr>
                        <td><?php echo $model['id'] ?></td>
                        <td><?php echo $model['vehicle_model'] ?></td>
                        <td>
                            <a href="delete-vehicleModel.php?id=<?= $model['id'] ?>" class="btn btn-danger">Delete</a>
                            <a href="edit-vehicleModel.php?id=<?= $model['id'] ?>" class="btn btn-warning">Edit</a>

                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
        <a href="addNewModel.php" class="btn btn-success">ADD NEW MODEL</a>

    </div>
    <!-- TABLE -->


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>