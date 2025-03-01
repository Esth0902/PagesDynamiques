<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'Validation.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'session.php';

// Traitement du formulaire si des données sont soumises

//Vérification TokenCSRF
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Vérification TokenCSRF
    validateCSRFToken();
    //Vérification fréquence requêtes
    validateRequestRate();

    $formContact = [
        'nom' => $_POST['nom'] ?? '',
        'prenom' => $_POST['prenom'] ?? '',
        'eMail' => $_POST['eMail'] ?? '',
        'message' => $_POST['message'] ?? '',
    ];

    $errors = validateForm($formContact);

    if (empty($errors)) {
        $expediteur = $formContact['eMail'];
        $destinataire = "esther.stassin@gmail.com";
        $sujet = "Formulaire de contact - ".$formContact['nom']." ".$formContact['prenom'];
        $entetes = [
            "From" => $expediteur,
            "MIME-Version" => "1.0",
            "Content-Type" => "text/html; charset=UTF-8",
            "Content-Transfer-Encoding" => "quoted-printable"
        ];

        $message = "<html><body>".$formContact['message']."</body></html>";


        if (mail($destinataire, $sujet, $message, $entetes)) {
            echo "Votre message a bien été envoyé !";
        } else {
            echo "L'envoi du message a échoué.";
        }
    } else {
        echo "<p style='color: rgba(142,3,19,0.8);'>Le formulaire n'a pas été envoyé !";
    }
}


?>