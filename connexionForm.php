<?php

$metaDescription = "Connexion";
$pageTitre = "Connexion";
require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . 'traitementFormConnexion.php';
if (estconnecte()){
    header('Location: index.php');
}

?>
<h1>Connexion</h1>
<form action = "" method = "post">
    <fieldset>

        <p>
            <label for="connexionPseudo">Pseudo* : </label>
            <input
                type="text" id="connexionPseudo" name="connexionPseudo" minlength="2" maxlength="255" required placeholder="Votre pseudo"
                value="<?php echo (!empty($errorsConnexion) ? htmlspecialchars($connexionData['connexionPseudo']) : ''); ?>"
                aria-required="true"
                aria-invalid="<?php echo isset($errorsConnexion['connexionPseudo']) ? 'true' : 'false'; ?>"
                aria-describedby="nomError"
            />
        </p>
        <div id="nomError" style="color: rgba(142,3,19,0.8);">
            <?php echo (isset($errorsConnexion['connexionPseudo']) ? htmlspecialchars($errorsConnexion['connexionPseudo']) : ''); ?>
        </div>

        <p>
            <label for="connexionMotDePasse">Mot de passe* : </label>
            <input type="password" id="connexionMotDePasse" name="connexionMotDePasse" required minlength="8" maxlength="72"
        </p>
        <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">

        <p>
            <input type = "submit" value = "Envoyer" />
        </p>

        <p>
            <a href = "\inscriptionForm.php">Inscrivez-vous !</a>
        </p>

</form>

<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>
