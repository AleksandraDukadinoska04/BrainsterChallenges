<?php
session_start();

if (isset($_SESSION['login'])) {
    header('Location: admin.php');
    return;
}
require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/Classes/Admins.php';


$errors = ['email' => false, 'password' => false];
$login = true;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email)) {
        $errors['email'] = "<span class='text-danger fw-bold'> Please enter the email! </span> <br>";
        $login = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "<span class='text-danger fw-bold'> Please enter valid email! </span> <br>";
        $login = false;
    }

    if (empty($password)) {
        $errors['password'] = "<span class='text-danger fw-bold'> Please enter the password! </span> <br>";
        $login = false;
    } elseif (strlen($password) < 6) {
        $errors['password'] = "<span class='text-danger fw-bold'> Password must be minimum 6 characters! </span> <br>";
        $login = false;
    }


    if ($login) {

        $adminExist = Admins::adminExist($email, $password, $connection);

        if ($adminExist) {
            $_SESSION['login'] = true;

            header('Location: admin.php');
            return;
        } else {
            $errors['password'] = "<span class='text-danger fw-bold'> Try again! </span> <br>";
        }
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<!-- NAVBAR -->

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Vehicle Registration</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="index.php">Home</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <!-- NAVBAR -->


    <!-- FORM -->
    <div class="container text-center w-25 mx-auto my-4 bg-light p-5">
        <form action="" method="POST">
            <label for="email" class="d-block fw-bold">Email:</label>
            <input type="email" id="email" name="email" class="w-100 p-1 border border-2 border-light-subtle rounded d-block mx-auto">
            <?= $errors['email'] ? $errors['email'] : ''; ?>

            <br>
            <label for="password" class="d-block fw-bold">Password:</label>
            <input type="password" id="password" name="password" class="w-100 p-1 border border-2 border-light-subtle rounded d-block mx-auto">
            <?= $errors['password'] ? $errors['password'] : ''; ?>

            <br>
            <br>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
    <!-- FORM -->

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>