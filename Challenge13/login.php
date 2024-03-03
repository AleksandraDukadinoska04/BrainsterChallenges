<?php
require_once __DIR__ . "/functions.php";

$errors = ['username' => false, 'password' => false];
$login = true;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);


    if (requerdField($username)) {
        $errors['username'] = '<span> Username is requerd! </span>';
        $login = false;
    } elseif (usernameValidation($username)) {
        $errors['username'] = '<span> Username cannot contain empty spaces or special signs! </span>';
        $login = false;
    }

    if (requerdField($password)) {
        $errors['password'] = '<span> Password is requerd! </span>';
        $login = false;
    } elseif (passLength($password)) {
        $errors['password'] = '<span> Password is too short! </span>';
        $login = false;
    } elseif (passwordValidation($password)) {
        $errors['password'] = '<span> Password must have at least one number, <br> one special sign and one uppercase letter! </span>';
        $login = false;
    }


    if ($login) {

        if (checkUser($username, $password)) {
            setcookie('username', $username, time() + 60);

            header("Location: welcome.php");
            die;
        }

        $errors['password'] = '<span> Wrong username/password combination! </span>';
        $errors['username'] = '<span> Wrong username/password combination! </span>';
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <title>LOG IN</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="transparent login">
        <h1>LOG IN FORM</h1>
        <br>
        <br>
        <form action="login.php" method="POST">

            <div class="form-floating mb-3">
                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username">
                <label for="floatingInput">Username:</label>
                <?= $errors['username'] ? $errors['username'] : ''; ?>
                <br>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password:</label>
                <?= $errors['password'] ? $errors['password'] : ''; ?>
                <br>
            </div> <br>
            <a href="/"><button type="submit" class="bn632-hover bn26">LOG IN</button></a>

        </form>
    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>