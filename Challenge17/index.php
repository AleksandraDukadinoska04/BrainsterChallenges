<?php
session_start();
if (isset($_SESSION['login'])) {
    header('Location: admin.php');
    return;
}
require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/Classes/Registrations.php';


$errors = ['registrationNumber' => false];
$search = true;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $registrationNumber = trim($_POST['registrationNumber']);

    $checkRegistrationNumber = Registrations::checkRegistrationNumber($registrationNumber, $connection);

    if (empty($registrationNumber)) {
        $errors['registrationNumber'] = "<span class='text-danger fw-bold'> Please enter the registration number! </span> <br>";
        $search = false;
    } elseif (!$checkRegistrationNumber) {
        $errors['registrationNumber'] = "<span class='text-danger fw-bold'> There is no such registration! </span> <br>";
        $search = false;
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Vehicle Registration</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="login.php">Login</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <!-- NAVBAR -->


    <!-- SEARCH -->
    <div class="center text-center w-50 mx-auto my-4 bg-light p-5">
        <h1>Vehicle Registration</h1>
        <form action="" method="POST">
            <label for="registrationNumber" class="d-block">Enter your registration number to check its validity</label>
            <br>
            <input class="w-50 p-1 border border-2 border-light-subtle rounded d-block mx-auto" type="text" id="registrationNumber" name="registrationNumber" placeholder="Registration number">
            <?= $errors['registrationNumber'] ? $errors['registrationNumber'] : ''; ?>
            <br>
            <button class="btn btn-primary">Search</button>
        </form>
    </div>
    <!-- SEARCH -->

    
    <!-- TABLE -->
    <?php if ($_SERVER['REQUEST_METHOD'] == "POST" && $search) { ?>
        <div class="container py-4">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>vehicle model</th>
                        <th>vehicle type</th>
                        <th>vehicle chassis number</th>
                        <th>vehicle production year</th>
                        <th>registration number</th>
                        <th>fuel type</th>
                        <th>registration to</th>
                    </tr>
                </thead>
                <tbody>


                    <tr>
                        <td><?php echo $checkRegistrationNumber['id'] ?></td>
                        <td><?php echo $checkRegistrationNumber['vehicle_model'] ?></td>
                        <td><?php echo $checkRegistrationNumber['vehicle_type'] ?></td>
                        <td><?php echo $checkRegistrationNumber['vehicle_chassis_number'] ?></td>
                        <td><?php echo $checkRegistrationNumber['vehicle_production_year'] ?></td>
                        <td><?php echo $checkRegistrationNumber['registration_number'] ?></td>
                        <td><?php echo $checkRegistrationNumber['fuel_type'] ?></td>
                        <td><?php echo $checkRegistrationNumber['registration_to'] ?></td>
                    </tr>


                </tbody>
            </table>
        </div>

    <?php }  ?>
    <!-- TABLE -->


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>