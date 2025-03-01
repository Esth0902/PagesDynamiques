<?php

ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
ini_set('session.use_only_cookies', 1);
session_start();

function generateCSRFToken() {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    return $_SESSION['csrf_token'];
}

function validateCSRFToken() {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur CSRF : requête invalide !");}
}

function validateRequestRate() {
    $max_requests = 2;
    $time_limit = 10;

    if (!isset($_SESSION['timestamp'])) {
        $_SESSION['timestamp'] = time();
        $_SESSION['request_count'] = 0;
    }
    $time_diff = time() - $_SESSION['timestamp'];
    if ($time_diff > $time_limit) {
        $_SESSION['timestamp'] = time();
        $_SESSION['request_count'] = 1;
    }
    else {
        $_SESSION['request_count']++;
        if ($_SESSION['request_count'] >= $max_requests) {
            die("Limite de requêtes atteinte. Essayez plus tard.");
        }
    }
}

function connecter_utilisateur($uti){

    if ($uti) {
        $_SESSION['pseudo'] = $uti['uti_pseudo'];
        $_SESSION['email'] = $uti['uti_email'];
        $_SESSION['id'] = $uti['uti_id'];

        header("Location: profil.php");
        exit();
    }
}

function deconnexion() : void
{   session_unset();
    session_destroy();
    header("Location: connexionForm.php");
    exit();
}

function estconnecte()
{
    if (isset($_SESSION['id'])) { // utilise l'ID de la BD pour vérifier la connexion
        return true;
    }
    else {return false;}
}

function getJokes() {
    // L'URL de l'API JokeAPI pour récupérer des blagues
    $apiUrl = "https://v2.jokeapi.dev/joke/Any?type=single&amount=5";  // Changez les paramètres si nécessaire

    // Utiliser file_get_contents pour récupérer les données de l'API
    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);

    // Vérifier si l'API a retourné des blagues
    if (isset($data['jokes'])) {
        return $data['jokes'];
    }

    return [];
}

?>


