<?php

require_once __DIR__ . "/Database/Connection.php";

$connObj = new Connection("mysql", "localhost", "challenge_16", 3307, "root", "");
$connObj->connectToDB();
$connection = $connObj->getConnection();
