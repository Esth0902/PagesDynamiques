<?php
$metaDescription = "Contact";
$pageTitre = "Contact";
require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'traitementFormContact.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'session.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Validation.php';

?>
<h1>Contact</h1>
<form action = "" method = "post">
    <fieldset>
        <p>
            <label for="nom">Nom* : </label>
            <input
                    type="text" id="nom" name="nom" minlength="2" maxlength="255" required placeholder="Votre nom"
                    value="<?php echo (!empty($errors) && !empty($formContact['nom']) ? htmlspecialchars($formContact['nom']) : ''); ?>"
                    aria-required="true"
                    aria-invalid="<?php echo isset($errors['nom']) ? 'true' : 'false'; ?>"
                    aria-describedby="nomError"
            />
        </p>
        <div id="nomError" style="color: rgba(142,3,19,0.8);">
            <?php echo (isset($errors['nom']) ? htmlspecialchars($errors['nom']) : ''); ?>
        </div>


        <p>
            <label for="prenom">Prénom : </label>
            <input type="text" id="prenom" name="prenom" minlength="2" maxlength="255" placeholder = "Votre prénom"
                   value="<?php echo (!empty($errors) && !empty($formContact['prenom']) ? htmlspecialchars($formContact['prenom']): ''); ?>"
            aria-invalid="<?php echo isset($errors['prenom']) ? 'true' : 'false'; ?>"
            aria-describedby="nomError"/>
        </p>
        <div id="nomError" style="color: rgba(142,3,19,0.8);">
            <?php echo (isset($errors['prenom']) ? htmlspecialchars($errors['prenom']) : ''); ?>
        </div>

        <p>
            <label for="email">E-mail* : </label>
            <input type="email" id="email" name="eMail" required placeholder = "Votre adresse e-mail"
                   value="<?php echo (!empty($errors) && !empty($formContact['eMail']) ? htmlspecialchars($formContact['eMail']) :
                       (estconnecte() ? htmlspecialchars($_SESSION['email']) : '')); ?>"
            aria-invalid="<?php echo isset($errors['email']) ? 'true' : 'false'; ?>"
            aria-describedby="nomError"/>
        </p>
        <div id="nomError" style="color: rgba(142,3,19,0.8);">
            <?php echo (isset($errors['email']) ? htmlspecialchars($errors['email']) : ''); ?>
        </div>

    <p>
        <label for="message">Message* : </label>
        <textarea
                id="message"
                name="message"
                required
                placeholder="Votre message"
                minlength="10"
                maxlength="3000"
                aria-invalid="<?php echo isset($errors['message']) ? 'true' : 'false'; ?>"
                aria-describedby="messageError"
        ><?php echo (!empty($errors) && !empty($formContact['message']) ? htmlspecialchars($formContact['message']) : ''); ?></textarea>
        <div id="messageError" style="color: rgba(142, 3, 19, 0.8);">
            <?php echo (isset($errors['message']) ? htmlspecialchars($errors['message']) : ''); ?>
        </div>
        <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">

        <input type = "submit" value = "Envoyer" />
    </p>
    </fieldset>
</form>


<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>


