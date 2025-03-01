<?php
$metaDescription = "Page d'accueil";
$pageTitre = "Profil";

require_once __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'session.php';
if (isset($_POST['deconnexion'])) {
    deconnexion();}
if (estconnecte() == false) {
    header('location: connexionForm.php');
}

require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php';

?>


<h1>Mon profil</h1>

<p>Pseudo : <?php echo $_SESSION['pseudo']?></p>
<p>Email : <?php echo $_SESSION['email']?></p>

<form action="" method="POST">
    <p>
        <input type="submit" value="Déconnexion" name="deconnexion" id ="deconnexion" />
    </p>
</form>





<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>


