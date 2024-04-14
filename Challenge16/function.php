<?php


function requerdField($field)
{
    if (empty($field)) {
        return true;
    }
    return false;
}

function checkNumberLength($number)
{
    if (strlen($number) != 9) {
        return true;
    }
    return false;
}

function checkValidNumber($number)
{
    if (!is_numeric($number)) {
        return true;
    }
    return false;
}


function imageValidation($imageUrl)
{
    if (filter_var($imageUrl, FILTER_VALIDATE_URL) === false) {
        return false;
    }

    $ch = curl_init($imageUrl);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    curl_exec($ch);

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    return ($httpCode == 200 && preg_match('/^image\//', curl_getinfo($ch, CURLINFO_CONTENT_TYPE)));
}

function validLocation($location)
{
    $apiKey = 'YOUR_GOOGLE_MAPS_API_KEY';

    $url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($location) . '&key=' . $apiKey;

    $response = file_get_contents($url);
    if ($response === false) {
        return false;
    }

    $data = json_decode($response, true);

    if (isset($data['status']) && $data['status'] === 'OK' && isset($data['results']) && !empty($data['results'])) {
        return true;
    } else {
        return false;
    }
}

function linkedinValidation($url)
{
    if (filter_var($url, FILTER_VALIDATE_URL) === false) {
        return false;
    }

    // $domain = parse_url($url, PHP_URL_HOST);

    // if ($domain !== 'www.linkedin.com') {
    //     return false;
    // }

    // $path = parse_url($url, PHP_URL_PATH);
    // if (!preg_match('~^/in/[a-zA-Z0-9_-]+/?$~', $path)) {
    //     return false;
    // }

    return true;
}

function facebookValidation($url)
{
    if (filter_var($url, FILTER_VALIDATE_URL) === false) {
        return false;
    }

    // $pattern = '/^(https?:\/\/)?(www\.)?facebook\.com\/(?:\w+\/)?(?:pages\/)?(?:[\w\-\.]+\/)?(?:profile\.php\?id=\d+|[\w\-]+)\/?$/i';

    // if (preg_match($pattern, $url)) {
    //     return true;
    // }

    return true;
}

function twitterValidation($url)
{
    if (filter_var($url, FILTER_VALIDATE_URL) === false) {
        return false;
    }

    // $pattern = '/^(https?:\/\/)?(www\.)?twitter\.com\/(?:#!\/)?(\w+)(\/status\/\d+)?$/i';

    // if (preg_match($pattern, $url)) {
    //     return true;
    // }

    return true;
}

function googleValidation($url)
{
    if (filter_var($url, FILTER_VALIDATE_URL) === false) {
        return false;
    }

    // $domain = parse_url($url, PHP_URL_HOST);

    // if ($domain !== 'plus.google.com') {
    //     return false;
    // }

    // $path = parse_url($url, PHP_URL_PATH);
    // if (!preg_match('~^/u/\d+/?$~', $path)) {
    //     return false;
    // }

    return true;
}
