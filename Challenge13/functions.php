<?php

function requerdField($field)
{
    if (empty($field)) {
        return true;
    }
    return false;
}

function allUsers()
{
    $allUsers = file_get_contents("users.txt");
    $allUsers = trim($allUsers);
    $allUsers = explode(PHP_EOL, $allUsers);
    return $allUsers;
}

function usernameTaken($username)
{
    $allUsers = allUsers();
    foreach ($allUsers as $userRow) {
        $info = explode("=", $userRow);
        $userpass = explode(",", $info[0]);
        if ($userpass[1] == $username) {
            return true;
        }
    }
    return false;
}

function invalidEmail($email)
{
    if ($email !== filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

function emailTaken($email)
{
    $allUsers = allUsers();
    foreach ($allUsers as $userRow) {
        $info = explode(",", $userRow);
        if ($email == $info[0]) {
            return true;
        }
    }
    return false;
}

function passLength($password)
{
    if (strlen($password) < 6) {
        return true;
    }
    return false;
}

function checkUser($username, $password)
{
    $allUsers = allUsers();
    foreach ($allUsers as $userRow) {
        $info = explode(",", $userRow);
        $userpass = explode("=", $info[1]);
        if ($userpass[0] == $username && password_verify($password, $userpass[1])) {
            return true;
        }
    }
    return false;
}

function usernameValidation($username)
{
    if (preg_match('/\s/', $username) || preg_match('/[^\w\s]/', $username)) {
        return true;
    }
    return false;
}

function emailValidation($email)
{
    if (!preg_match('/^.{5,}@/', $email)) {
        return true;
    }
    return false;
}

function passwordValidation($password)
{
    if (!preg_match('/^(?=.*[0-9])(?=.*[A-Z])(?=.*[^\w\s]).{8,}$/', $password)) {
        return true;
    }
    return false;
}
