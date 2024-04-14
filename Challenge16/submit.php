<?php

require_once __DIR__ . "/function.php";
require_once __DIR__ . "/autoload.php";


$errors = [
    'coverImage' => false,
    'mainTitle' => false,
    'subtitle' => false,
    'aboutYou' => false,
    'number' => false,
    'location' => false,
    'select' => false,
    'imageOne' => false,
    'descriptionOne' => false,
    'imageTwo' => false,
    'descriptionTwo' => false,
    'imageThree' => false,
    'descriptionThree' => false,
    'companyDescription' => false,
    'linkedin' => false,
    'facebook' => false,
    'twitter' => false,
    'google' => false
];

$submit = true;


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $coverImage = trim($_POST['coverImage']);
    $mainTitle = trim($_POST['mainTitle']);
    $subtitle = trim($_POST['subtitle']);
    $aboutYou = trim($_POST['aboutYou']);
    $number = trim($_POST['number']);
    $location = trim($_POST['location']);
    $select = trim($_POST['select']);
    $imageOne = trim($_POST['imageOne']);
    $descriptionOne = trim($_POST['descriptionOne']);
    $imageTwo = trim($_POST['imageTwo']);
    $descriptionTwo = trim($_POST['descriptionTwo']);
    $imageThree = trim($_POST['imageThree']);
    $descriptionThree = trim($_POST['descriptionThree']);
    $companyDescription = trim($_POST['companyDescription']);
    $linkedin = trim($_POST['linkedin']);
    $facebook = trim($_POST['facebook']);
    $twitter = trim($_POST['twitter']);
    $google = trim($_POST['google']);

    require_once __DIR__ . "/validations.php";


    if ($submit) {

        $infoArray = [
            'coverImage' =>  $coverImage,
            'mainTitle' => $mainTitle,
            'subtitle' => $subtitle,
            'aboutYou' => $aboutYou,
            'number' => $number,
            'location' => $location,
            'services_products' => $select,
            'imageOne' => $imageOne,
            'descriptionOne' => $descriptionOne,
            'imageTwo' => $imageTwo,
            'descriptionTwo' => $descriptionTwo,
            'imageThree' => $imageThree,
            'descriptionThree' => $descriptionThree,
            'companyDescription' => $companyDescription,
            'linkedin' => $linkedin,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'google' => $google
        ];

        $connObj->insertInfoToDB($infoArray);


        $id = $connObj->getLastID();

        header("Location: webpage.php?id=$id");
        die;
    }
}
