<?php

$metaDescription = "Inscription";
$pageTitre = "Inscription";
require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . 'traitementFormInscription.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'session.php';

if (estconnecte()){
    header('Location: index.php');
}

?>
<h1>Formulaire d'inscription</h1>
<form action = "" method = "post">
    <fieldset>

        <p>
            <label for="inscriptionPseudo">Pseudo* : </label>
            <input
                type="text" id="inscriptionPseudo" name="inscriptionPseudo" minlength="2" maxlength="255" required placeholder="Votre pseudo"
                value="<?php echo (!empty($errorsInsc) ? htmlspecialchars($inscData['inscriptionPseudo']) : ''); ?>"
                aria-required="true"
                aria-invalid="<?php echo isset($errorsInsc['inscriptionPseudo']) ? 'true' : 'false'; ?>"
                aria-describedby="nomError"
            />
        </p>
        <div id="nomError" style="color: rgba(142,3,19,0.8);">
            <?php echo (isset($errorsInsc['inscriptionPseudo']) ? htmlspecialchars($errorsInsc['inscriptionPseudo']) : ''); ?>
        </div>

        <p>
            <label for="inscriptionEmail">Email* : </label>
            <input type="email" id="inscriptionEmail" name="inscriptionEmail" required placeholder = "Votre adresse e-mail"
                   value="<?php echo (!empty($errorsInsc) ? htmlspecialchars($inscData['inscriptionEmail']) : ''); ?>"
                   aria-required="true"
                   aria-invalid="<?php echo isset($errorsInsc['inscriptionEmail']) ? 'true' : 'false'; ?>"
                   aria-describedby="nomError"
        </p>
        <div id="nomError" style="color: rgba(142,3,19,0.8);">
            <?php echo (isset($errorsInsc['inscriptionEmail']) ? htmlspecialchars($errorsInsc['inscriptionEmail']) : ''); ?>
        </div>

        <p>
            <label for="inscriptionMotDePasse">Mot de passe* : </label>
            <input type="password" id="inscriptionMotDePasse" name="inscriptionMotDePasse" minlength="8" maxlength="72" required
                   value="<?php echo (!empty($errorsInsc) ? htmlspecialchars($inscData['inscriptionMotDePasse']) : ''); ?>"
                   aria-required="true"
                   aria-invalid="<?php echo isset($errorsInsc['inscriptionMotDePasse']) ? 'true' : 'false'; ?>"
                   aria-describedby="nomError"
        </p>
        <div id="nomError" style="color: rgba(142,3,19,0.8);">
            <?php echo (isset($errorsInsc['inscriptionMotDePasse']) ? htmlspecialchars($errorsInsc['inscriptionMotDePasse']) : ''); ?>
        </div>
        <p>
            <label for="inscriptionMotDePasseConfirmation">Confirmation mot de passe* : </label>
            <input type="password" id="inscriptionMotDePasseConfirmation" name="inscriptionMotDePasseConfirmation" minlength="8" maxlength="72" required
                   aria-required="true"
                   aria-invalid="<?php echo isset($errorsInsc['inscriptionMotDePasseConfirmation']) ? 'true' : 'false'; ?>"
                   aria-describedby="nomError"
        </p>
        <div id="nomError" style="color: rgba(142,3,19,0.8);">
            <?php echo (isset($errorsInsc['inscriptionMotDePasseConfirmation']) ? htmlspecialchars($errorsInsc['inscriptionMotDePasseConfirmation']) : ''); ?>
        </div>
        <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">

        <p>
        <input type = "submit" value = "Envoyer" />
        </p>

</form>

<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>
