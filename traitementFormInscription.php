<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'DB.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Validation.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'session.php';

// Traitement du formulaire si des données sont soumises
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    validateCSRFToken();
    validateRequestRate();

    $inscData = [
        'inscriptionPseudo' => $_POST['inscriptionPseudo'] ?? '',
        'inscriptionEmail' => $_POST['inscriptionEmail'] ?? '',
        'inscriptionMotDePasse' => $_POST['inscriptionMotDePasse'] ?? '',
        'inscriptionMotDePasseConfirmation' => $_POST['inscriptionMotDePasseConfirmation'] ?? '',
    ];

    $errorsInsc = validateForm($inscData);

    if (empty($errorsInsc)) {
        inscription_bdd($inscData);
    } else {
        echo "<p style='color: rgba(142,3,19,0.8);'>Le formulaire n'a pas été envoyé !";
    }
}

