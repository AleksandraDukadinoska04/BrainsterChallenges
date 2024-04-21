<?php

require_once __DIR__ . "/Database/Connection.php";

$connObj = new Connection("mysql", "localhost", "vehicle_registrations", 3307, "root", "");
$connObj->connectToDB();
$connection = $connObj->getConnection();
