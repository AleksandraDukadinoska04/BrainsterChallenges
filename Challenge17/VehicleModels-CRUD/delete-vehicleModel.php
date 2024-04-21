<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../../login.php");
    return;
}

if (!isset($_GET['id'])) {
    header('Location: vehicle_models.php');
    return;
}

require_once '../autoload.php';
require_once '../Classes/Registrations.php';

$id = $_GET['id'];

Registrations::deleteWhereID($id, 'vehicle_models', $connection);


header('Location: vehicle_models.php?successfulyDeleted');
return;
