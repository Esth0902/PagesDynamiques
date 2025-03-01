<?php


// vérifie qu'un champ requis n'est pas vide
function isRequired($field) {
    return isset($field) && !empty(trim($field));
}

// vérifie la longueur d'un champ (minimum et maximum)
function isValidLength($field, $minLength, $maxLength) {
    $length = mb_strlen(trim($field)); //mb_strlen pour caractères accentués
    return ($length >= $minLength && $length <= $maxLength);
}

// vérifie la validité de l'email
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}