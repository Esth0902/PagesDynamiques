<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'DB.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'session.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Validation.php';

// Traitement du formulaire si des données sont soumises
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    validateCSRFToken();
    validateRequestRate();

    $connexionData = [
        'connexionPseudo' => $_POST['connexionPseudo'] ?? '',
        'connexionMotDePasse' => $_POST['connexionMotDePasse'] ?? '',
    ];
    $errorsConnexion = validateForm($connexionData);

    if (empty($errorsConnexion)) {
        $uti = connexion_DB($connexionData);
        connecter_utilisateur($uti);
    }
}
?>
