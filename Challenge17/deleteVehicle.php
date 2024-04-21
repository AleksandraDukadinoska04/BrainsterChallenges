<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    die;
}

if (!isset($_GET['id'])) {
    header('Location: admin.php');
    return;
}

require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/Classes/Registrations.php';


$id = $_GET['id'];

Registrations::deleteWhereID($id, 'registrations',  $connection);

header("Location: admin.php?successfulyDeleted=$id");
return;
