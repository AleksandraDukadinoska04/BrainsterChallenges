<?php
require_once __DIR__ . "/functions.php";

$errors = ['username' => false, 'password' => false, 'email' => false];
$signup = true;



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (requerdField($email)) {
        $errors['email'] = '<span> Email is requerd! </span>';
        $signup = false;
    } elseif (invalidEmail($email)) {
        $errors['email'] = '<span>Invalid email! (ex.bob@example.com)</span>';
        $signup = false;
    } elseif (emailValidation($email)) {
        $errors['email'] = '<span>Email must have at least 5 characters before @!</span>';
        $signup = false;
    } elseif (emailTaken($email)) {
        $errors['email'] = '<span class= "text-warning"> A user with this email already exists! </span>';
        $signup = false;
    }

    if (requerdField($username)) {
        $errors['username'] = '<span> Username is requerd! </span>';
        $signup = false;
    } elseif (usernameValidation($username)) {
        $errors['username'] = '<span> Username cannot contain <br> empty spaces or special signs! </span>';
        $signup = false;
    } elseif (usernameTaken($username)) {
        $errors['username'] = '<span> Username is taken! </span>';
        $signup = false;
    }


    if (requerdField($password)) {
        $errors['password'] = '<span> Password is requerd! </span>';
        $signup = false;
    } elseif (passLength($password)) {
        $errors['password'] = '<span> Password is too short! </span>';
        $signup = false;
    } elseif (passwordValidation($password)) {
        $errors['password'] = '<span> Password must have at least one number,<br> one special sign and one uppercase letter! </span>';
        $signup = false;
    }

    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if ($signup) {
        file_put_contents("users.txt", "$email,$username=$password" . PHP_EOL, FILE_APPEND);
        setcookie('username', $username, time() + 60);

        header("Location: welcome.php");
        die;
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <title>SIGN UP</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="transparent signup">
        <h1>SIGN UP FORM</h1>
        <br>
        <br>
        <form action="signup.php" method="POST">

            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Email">
                <label for="floatingInput">Email:</label>
                <?= $errors['email'] ? $errors['email'] : ''; ?>
                <br>
            </div>
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
            <a href="/"><button type="submit" class="bn632-hover bn20">SIGN UP</button></a>
        </form>
    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>