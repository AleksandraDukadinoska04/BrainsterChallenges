<?php
require_once __DIR__ . "/function.php";



if (requerdField($coverImage)) {
    $errors['coverImage'] = '<span class="text-danger fw-bold"> Cover image is requerd! <br> </span>';
    $submit = false;
} elseif (!imageValidation($coverImage)) {
    $errors['coverImage'] = '<span class="text-danger fw-bold">Invalid image URL! <br></span>';
    $submit = false;
}

if (requerdField($mainTitle)) {
    $errors['mainTitle'] = '<span class="text-danger fw-bold"> Main Title is requerd! <br> </span>';
    $submit = false;
} elseif (str_word_count($mainTitle) > 20) {
    $errors['mainTitle'] = '<span class="text-danger fw-bold"> Maximum 20 words! <br> </span>';
    $submit = false;
}

if (requerdField($subtitle)) {
    $errors['subtitle'] = '<span class="text-danger fw-bold"> Subtitle is requerd! <br> </span>';
    $submit = false;
} elseif (str_word_count($subtitle) > 30) {
    $errors['subtitle'] = '<span class="text-danger fw-bold"> Maximum 30 words! <br> </span>';
    $submit = false;
}

if (requerdField($aboutYou)) {
    $errors['aboutYou'] = '<span class="text-danger fw-bold"> This field is requerd!  <br></span>';
    $submit = false;
} elseif (str_word_count($aboutYou) > 50) {
    $errors['aboutYou'] = '<span class="text-danger fw-bold"> Maximum 60 words! <br> </span>';
    $submit = false;
}

if (requerdField($number)) {
    $errors['number'] = '<span class="text-danger fw-bold"> Telephone number is requerd!  <br></span>';
    $submit = false;
} elseif (checkNumberLength($number) || checkValidNumber($number)) {
    $errors['number'] = '<span class="text-danger fw-bold">Invalid number! <br></span>';
    $submit = false;
}

if (requerdField($location)) {
    $errors['location'] = '<span class="text-danger fw-bold"> Location is requerd!  <br></span>';
    $submit = false;
} elseif (validLocation($location)) {
    $errors['location'] = '<span class="text-danger fw-bold">Invalid location! <br></span>';
    $submit = false;
}

if (requerdField($select)) {
    $errors['select'] = '<span class="text-danger fw-bold"> Please choose one option! <br> </span>';
    $submit = false;
}

if (requerdField($imageOne)) {
    $errors['imageOne'] = '<span class="text-danger fw-bold"> Image URL is requerd! <br> </span>';
    $submit = false;
} elseif (!imageValidation($imageOne)) {
    $errors['imageOne'] = '<span class="text-danger fw-bold">Invalid image URL! <br></span>';
    $submit = false;
}

if (requerdField($imageTwo)) {
    $errors['imageTwo'] = '<span class="text-danger fw-bold">Image URL is requerd! <br> </span>';
    $submit = false;
} elseif (!imageValidation($imageTwo)) {
    $errors['imageTwo'] = '<span class="text-danger fw-bold">Invalid image URL! <br></span>';
    $submit = false;
}

if (requerdField($imageThree)) {
    $errors['imageThree'] = '<span class="text-danger fw-bold"> Image URL is requerd! <br> </span>';
    $submit = false;
} elseif (!imageValidation($imageThree)) {
    $errors['imageThree'] = '<span class="text-danger fw-bold">Invalid image URL! <br></span>';
    $submit = false;
}

if (requerdField($descriptionOne)) {
    $errors['descriptionOne'] = '<span class="text-danger fw-bold"> Description is requerd! <br> </span>';
    $submit = false;
} elseif (str_word_count($descriptionOne) > 100) {
    $errors['descriptionOne'] = '<span class="text-danger fw-bold"> Maximum 100 words! <br> </span>';
    $submit = false;
}

if (requerdField($descriptionTwo)) {
    $errors['descriptionTwo'] = '<span class="text-danger fw-bold">Description is requerd! <br></span>';
    $submit = false;
} elseif (str_word_count($descriptionTwo) > 100) {
    $errors['descriptionTwo'] = '<span class="text-danger fw-bold"> Maximum 100 words! <br> </span>';
    $submit = false;
}

if (requerdField($descriptionThree)) {
    $errors['descriptionThree'] = '<span class="text-danger fw-bold">Description is requerd! <br></span>';
    $submit = false;
} elseif (str_word_count($descriptionThree) > 100) {
    $errors['descriptionThree'] = '<span class="text-danger fw-bold"> Maximum 100 words! <br> </span>';
    $submit = false;
}

if (requerdField($companyDescription)) {
    $errors['companyDescription'] = '<span class="text-danger fw-bold">Description is requerd! <br></span>';
    $submit = false;
} elseif (str_word_count($companyDescription) > 60) {
    $errors['companyDescription'] = '<span class="text-danger fw-bold"> Maximum 60 words! <br> </span>';
    $submit = false;
}

if (requerdField($linkedin)) {
    $errors['linkedin'] = '<span class="text-danger fw-bold"> Linkedin URL is requerd! <br> </span>';
    $submit = false;
} elseif (!linkedinValidation($linkedin)) {
    $errors['linkedin'] = '<span class="text-danger fw-bold">Invalid Linkedin URL! <br></span>';
    $submit = false;
}

if (requerdField($facebook)) {
    $errors['facebook'] = '<span class="text-danger fw-bold"> Facebook URL is requerd! <br> </span>';
    $submit = false;
} elseif (!facebookValidation($facebook)) {
    $errors['facebook'] = '<span class="text-danger fw-bold">Invalid Facebook URL! <br></span>';
    $submit = false;
}

if (requerdField($twitter)) {
    $errors['twitter'] = '<span class="text-danger fw-bold"> Twitter URL is requerd! <br> </span>';
    $submit = false;
} elseif (!twitterValidation($twitter)) {
    $errors['twitter'] = '<span class="text-danger fw-bold">Invalid Twitter URL! <br></span>';
    $submit = false;
}

if (requerdField($google)) {
    $errors['google'] = '<span class="text-danger fw-bold"> Google+ URL is requerd! <br> </span>';
    $submit = false;
} elseif (!googleValidation($google)) {
    $errors['google'] = '<span class="text-danger fw-bold">Invalid Google+ URL! <br></span>';
    $submit = false;
}
