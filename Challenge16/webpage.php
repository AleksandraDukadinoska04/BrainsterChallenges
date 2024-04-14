<?php
require_once __DIR__ . "/autoload.php";


if (!isset($_GET['id'])) {
    header("Location: index.php");
    die;
}

$id = $_GET['id'];

if ($connObj->existingID($id)) {
    header("Location: index.php");
    die;
}

$result = $connObj->getInfoFromID($id);


?>


<!doctype html>
<html lang="en">

<head>
    <title>Webpage</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <link rel="stylesheet" href="style.css" />

    <style>
        .imageCover {
            background-image: url(<?= $result['coverImage'] ?>);
        }
    </style>


</head>

<body class="py-5 ">
    <!-- NAVBAR -->
    <nav class=" navbar navbar-expand-sm navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="webpage.php?id=<?= $id ?>">Webster</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="hover nav-link" href="#home" aria-current="page">Home
                            <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#aboutUs">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-capitalize" href="#<?= $result['services_products'] ?>"><?= $result['services_products'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    <!-- HOME -->
    <div class="imageCover text-white text-end d-flex flex-column align-items-end justify-content-center" id="home">
        <h1 class="text-decoration-underline mw-75"><?= $result['mainTitle'] ?></h1>
        <h2 class="subtitle fst-italic font-monospace mw-50"><?= $result['subtitle'] ?></h2>
    </div>



    <!-- ABOUT US -->
    <div class="aboutUs text-center mx-auto w-50" id="aboutUs">
        <h2 class="fst-italic text-decoration-underline">About us</h2>
        <p><?= $result['aboutYou'] ?></p>
        <hr>
        <small class="d-block"><strong>Tel: </strong><?= $result['number'] ?></small>
        <small class="d-block"><strong> LOCATION: </strong><?= $result['location'] ?></small>
    </div>


    <!-- SERVICES/PRODUCTS -->
    <div class="container py-5" id="<?= $result['services_products'] ?>">
        <h3 class="text-capitalize mb-3 fst-italic text-decoration-underline"><?= $result['services_products'] ?></h3>
        <div class="row ">
            <div class="col-4">
                <div class="card  border border-2 border-dark " style="width: 23rem;">
                    <img src="<?= $result['imageOne'] ?>" class="card-img-top" alt="...">
                    <div class="card-body text-white bg-dark">
                        <h5 class="card-title text-capitalize fst-italic"><?= $result['services_products'] == "services" ? "Service" : "Product" ?> One Description</h5>
                        <p class="card-text"><?= $result['descriptionOne'] ?></p>
                        <small>Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>

            <div class="col-4">

                <div class="card border border-2 border-dark" style="width: 23rem;">
                    <img src="<?= $result['imageTwo'] ?>" class="card-img-top" alt="...">
                    <div class="card-body text-white bg-dark">
                        <h5 class="card-title text-capitalize fst-italic"><?= $result['services_products'] == "services" ? "Service" : "Product" ?> Two Description</h5>
                        <p class="card-text"><?= $result['descriptionTwo'] ?></p>
                        <small>Last updated 3 mins ago</small>
                    </div>

                </div>
            </div>

            <div class="col-4">

                <div class="card border border-2 border-dark" style="width: 23rem;">
                    <img src="<?= $result['imageThree'] ?> " class="card-img-top" alt="...">
                    <div class="card-body text-white bg-dark ">
                        <h5 class="card-title text-capitalize fst-italic"><?= $result['services_products'] == "services" ? "Service" : "Product" ?> Three Description</h5>
                        <p class="card-text"><?= $result['descriptionThree'] ?></p>
                        <small>Last updated 3 mins ago</small>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <hr>
    </div>


    <!-- CONTACT -->
    <div class="container py-5" id="contact">
        <div class="row">
            <div class="col-6">
                <h3 class="fst-italic text-decoration-underline">Contact</h3>
                <p><?= $result['companyDescription'] ?></p>
            </div>

            <div class="col-6">
                <form action="">
                    <label for="name" class="d-block fw-bold">Name</label>
                    <input type="text" id="name" name="name" class="w-100 form-control rounded-2 d-block border border-2 border-dark-subtle">
                    <br>
                    <label for="email" class="d-block fw-bold">Email</label>
                    <input type="email" id="email" name="email" class="w-100 form-control rounded-2 d-block border border-2 border-dark-subtle">
                    <br>
                    <label for="message" class="d-block fw-bold">Message</label>
                    <textarea name="message" id="message" cols="30" rows="3" class="w-100 form-control rounded-2 d-block border border-2 border-dark-subtle"></textarea>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-info text-white d-block mx-auto">Send</button>
                </form>
            </div>
        </div>
    </div>


    <!-- FOOTER -->
    <footer class="fixed-bottom text-white bg-dark text-center p-1">
        <a href="<?= $result['linkedin'] ?>" target="_blank"><i class="fa-brands fa-linkedin fa-xl mx-2"></i></a>
        <a href="<?= $result['facebook'] ?>" target="_blank"><i class="fa-brands fa-square-facebook fa-xl mx-2"></i></a>
        <a href="<?= $result['twitter'] ?>" target="_blank"><i class="fa-brands fa-square-twitter fa-xl mx-2"></i></a>
        <a href="<?= $result['google'] ?>" target="_blank"><i class="icon fa-brands fa-square-google-plus fa-xl mx-2"></i></a>
        <br>
        <small>Copyright by Aleksandra @ Brainster</small>


    </footer>




    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>