<?php
require_once __DIR__ . "/submit.php";

?>

<!doctype html>
<html lang="en">

<head>
    <title>Create your Webpage</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="back_graound text-white  text-center">
        <h2 class="fst-italic mb-5 bg fw-bold">You are one step away from your webpage</h2>

        <form action="" method="POST">

            <div class=" w-100 d-flex justify-content-around align-items-start text-start text-black">

                <div class="groupOne ">
                    <div class="top bg-white rounded-1">
                        <label for="coverImage" class="d-block fw-bold">Cover Image URL</label>
                        <input type="text" class="form-control rounded-2 w-100 d-block p-2 border border-2 border-dark-subtle" id="coverImage" name="coverImage" value="<?= isset($_POST['coverImage']) ? $_POST['coverImage'] : '' ?>">
                        <?= $errors['coverImage'] ? $errors['coverImage'] : ''; ?>
                        <br>
                        <label for="mainTitle" class="d-block fw-bold">Main Title of Page</label>
                        <input type="text" class="form-control rounded-2 w-100 d-block p-2 border border-2 border-dark-subtle" id="mainTitle" name="mainTitle" value="<?= isset($_POST['mainTitle']) ? $_POST['mainTitle'] : '' ?>">
                        <?= $errors['mainTitle'] ? $errors['mainTitle'] : ''; ?>
                        <br>
                        <label for="subtitle" class="d-block fw-bold">Subtitle of Page</label>
                        <input type="text" class="form-control rounded-2 w-100 d-block p-2 border border-2 border-dark-subtle" id="subtitle" name="subtitle" value="<?= isset($_POST['subtitle']) ? $_POST['subtitle'] : '' ?>">
                        <?= $errors['subtitle'] ? $errors['subtitle'] : ''; ?>
                        <br>
                        <label for="aboutYou" class="d-block fw-bold">Something about you</label>
                        <textarea name="aboutYou" id="aboutYou" class="form-control rounded-2 w-100 d-block p-2 border border-2 border-dark-subtle" cols="30" rows="3"><?= isset($_POST['aboutYou']) ? $_POST['aboutYou'] : '' ?></textarea>
                        <?= $errors['aboutYou'] ? $errors['aboutYou'] : ''; ?>
                        <br>
                        <label for="number" class="d-block fw-bold">Your telephone number</label>
                        <input type="text" class="form-control rounded-2 w-100 d-block p-2 border border-2 border-dark-subtle" id="number" name="number" value="<?= isset($_POST['number']) ? $_POST['number'] : '' ?>">
                        <?= $errors['number'] ? $errors['number'] : ''; ?>
                        <br>
                        <label for="location" class="d-block fw-bold">Location</label>
                        <input type="text" class="form-control rounded-2 w-100 d-block p-2 border border-2 border-dark-subtle" id="location" name="location" value="<?= isset($_POST['location']) ? $_POST['location'] : '' ?>">
                        <?= $errors['location'] ? $errors['location'] : ''; ?>
                        <br>
                        <br>
                    </div>
                    <br>
                    <br>


                    <div class="bottom bg-white rounded-1">
                        <label for="select" class="d-block fw-bold">Do you provide services or products?</label>

                        <select name="select" id="select" class="form-select rounded-2 w-100 d-block p-2 border border-2 border-dark-subtle">
                            <option value="" selected>Choose</option>
                            <option value="services" <?= isset($_POST['select']) && $_POST['select'] == 'services' ? 'selected' : ''  ?>>Services</option>
                            <option value="products" <?= isset($_POST['select']) && $_POST['select'] == 'products' ? 'selected' : ''  ?>>Products</option>

                        </select>
                        <?= $errors['select'] ? $errors['select'] : ''; ?>

                    </div>
                </div>

                <div class="group bg-white rounded-1">
                    <p>Provide url for an image and description of your service/product</p>

                    <label for="imageOne" class="d-block fw-bold">Image URL</label>
                    <input type="text" class="form-control rounded-2 w-100 d-block p-2 border border-2 border-dark-subtle" id="imageOne" name="imageOne" value="<?= isset($_POST['imageOne']) ? $_POST['imageOne'] : '' ?>">
                    <?= $errors['imageOne'] ? $errors['imageOne'] : ''; ?>
                    <br>
                    <label for="descriptionOne" class="d-block fw-bold">Description of service/product</label>
                    <textarea name="descriptionOne" id="descriptionOne" class="form-control rounded-2 w-100 d-block p-2 border border-2 border-dark-subtle" cols="25" rows="3"><?= isset($_POST['descriptionOne']) ? $_POST['descriptionOne'] : '' ?></textarea>
                    <?= $errors['descriptionOne'] ? $errors['descriptionOne'] : ''; ?>
                    <br>
                    <label for="imageTwo" class="d-block fw-bold">Image URL</label>
                    <input type="text" class="form-control rounded-2 w-100 d-block p-2 border border-2 border-dark-subtle" id="imageTwo" name="imageTwo" value="<?= isset($_POST['imageTwo']) ? $_POST['imageTwo'] : '' ?>">
                    <?= $errors['imageTwo'] ? $errors['imageTwo'] : ''; ?>
                    <br>
                    <label for="descriptionTwo" class="d-block fw-bold">Description of service/product</label>
                    <textarea name="descriptionTwo" id="descriptionTwo" class="form-control rounded-2 w-100 d-block p-2 border border-2 border-dark-subtle" cols="25" rows="3"><?= isset($_POST['descriptionTwo']) ? $_POST['descriptionTwo'] : '' ?></textarea>
                    <?= $errors['descriptionTwo'] ? $errors['descriptionTwo'] : ''; ?>
                    <br>
                    <label for="imageThree" class="d-block fw-bold">Image URL</label>
                    <input type="text" class="form-control rounded-2 w-100 d-block p-2 border border-2 border-dark-subtle" id="imageThree" name="imageThree" value="<?= isset($_POST['imageThree']) ? $_POST['imageThree'] : '' ?>">
                    <?= $errors['imageThree'] ? $errors['imageThree'] : ''; ?>
                    <br>
                    <label for="descriptionThree" class="d-block fw-bold">Description of service/product</label>
                    <textarea name="descriptionThree" id="descriptionThree" class="form-control rounded-2 w-100 d-block p-2 border border-2 border-dark-subtle" cols="25" rows="3"><?= isset($_POST['descriptionThree']) ? $_POST['descriptionThree'] : '' ?></textarea>
                    <?= $errors['descriptionThree'] ? $errors['descriptionThree'] : ''; ?>

                    <br>

                </div>


                <div class="group bg-white rounded-1">
                    <label for="companyDescription" class="d-block fw-bold">Provide a description of your company, something people should be aware of before they contact you:</label>
                    <textarea name="companyDescription" id="companyDescription" class="form-control rounded-2 w-100 d-block p-2 border border-2 border-dark-subtle" cols="25" rows="3"><?= isset($_POST['companyDescription']) ? $_POST['companyDescription'] : '' ?></textarea>
                    <?= $errors['companyDescription'] ? $errors['companyDescription'] : ''; ?>
                    <br>
                    <hr>
                    <label for="linkedin" class="d-block fw-bold">Linkedin</label>
                    <input type="text" class="form-control rounded-2 w-100 d-block p-2 border border-2 border-dark-subtle" id="linkedin" name="linkedin" value="<?= isset($_POST['linkedin']) ? $_POST['linkedin'] : '' ?>">
                    <?= $errors['linkedin'] ? $errors['linkedin'] : ''; ?>

                    <label for="facebook" class="d-block fw-bold">Facebook</label>
                    <input type="text" class="form-control rounded-2 w-100 d-block p-2 border border-2 border-dark-subtle" id="facebook" name="facebook" value="<?= isset($_POST['facebook']) ? $_POST['facebook'] : '' ?>">
                    <?= $errors['facebook'] ? $errors['facebook'] : ''; ?>

                    <label for="twitter" class="d-block fw-bold">Twitter</label>
                    <input type="text" class="form-control rounded-2 w-100 d-block p-2 border border-2 border-dark-subtle" id="twitter" name="twitter" value="<?= isset($_POST['twitter']) ? $_POST['twitter'] : '' ?>">
                    <?= $errors['twitter'] ? $errors['twitter'] : ''; ?>

                    <label for="google" class="d-block fw-bold">Google+</label>
                    <input type="text" class="form-control rounded-2 w-100 d-block p-2 border border-2 border-dark-subtle" id="google" name="google" value="<?= isset($_POST['google']) ? $_POST['google'] : '' ?>">
                    <?= $errors['google'] ? $errors['google'] : ''; ?>

                </div>
            </div>

            <button type="submit" class="btn btn-secondary w-50 m-5 fw-bold">SUBMIT</button>

        </form>
    </div>





    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>