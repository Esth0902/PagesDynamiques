<?php

function connexion_bdd(): ?PDO
{
    $nomDuServeur = "localhost";
    $nomUtilisateur = "root";
    $motDePasse = "";
    $nomBDD = "bdd_projet_web";

    try {
        // Instancier une nouvelle connexion.
        $pdo = new PDO("mysql:host=$nomDuServeur;dbname=$nomBDD;charset=utf8mb4", $nomUtilisateur, $motDePasse);

        // Définir le mode d'erreur sur "exception".
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;

    } // Capturer les exceptions en cas d'erreur de connexion :
    catch (PDOException $e) {
        // Afficher les potentielles erreurs rencontrées lors de la tentative de connexion à la base de données.
        echo "Erreur d'exécution de requête : " . $e->getMessage() . PHP_EOL;
        return null;
    }
}

function inscription_bdd($data)
{
    try
    {
        // Instancier la connexion à la base de données.
        $pdo = connexion_bdd();

        // La requête permettant d'ajouter un nouvel utilisateur à la table "t_utilisateur_uti".
        $requete = "INSERT INTO t_utilisateur_uti (uti_pseudo, uti_email, uti_motdepasse) VALUES (:pseudo, :email, :mot_de_passe)";
        $hashedPasswordBinary = password_hash($data['inscriptionMotDePasse'], PASSWORD_DEFAULT);

        // Préparer la requête SQL.
        $stmt = $pdo->prepare($requete);

        // Lier les variables aux marqueurs :
        $stmt->bindValue(':pseudo', $data['inscriptionPseudo'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $data['inscriptionEmail'], PDO::PARAM_STR);
        $stmt->bindValue(':mot_de_passe', $hashedPasswordBinary, PDO::PARAM_STR);
        // Exécuter la requête.
        $stmt->execute();
        echo "Le formulaire a bien été envoyé !";
    }
    catch(PDOException $e)
    {
        if ($e->getCode() == 23000) {
            echo "<p style='color: rgba(142,3,19,0.8);'>Cet utilisateur existe déjà.";
        }
        else {echo "Erreur d'exécution de requête : " . $e->getMessage() . PHP_EOL;}

    }
}

function connexion_DB($data)
{
    try {
        // Instancier la connexion à la base de données.
        $pdo = connexion_bdd();

        $pseudo = $data['connexionPseudo'];
        $motdepasse = ($data['connexionMotDePasse']);
        $requete = "SELECT * FROM t_utilisateur_uti WHERE uti_pseudo = :pseudo";

        // Préparation de la requête SQL.
        $stmt = $pdo->prepare($requete);

        $stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);

        // Exécution de la requête.
        $estValide = $stmt->execute();
    } catch (PDOException $e) {
        echo "Erreur d'exécution de requête : " . $e->getMessage() . PHP_EOL;
        return false;
    }



    if ($estValide) {
        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$utilisateur) {
            echo "Utilisateur introuvable, réessayez.";
            return false;
        }
        else {
            $hash = trim($utilisateur['uti_motdepasse']);
            if(password_verify($motdepasse, $hash)) {
                return $utilisateur;
            }
            else{echo ("Mot de passe erronné.");}
            return false;
        }

    }
}

