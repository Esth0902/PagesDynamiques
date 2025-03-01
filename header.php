<?php
$menu = [["/index.php","Accueil"],["/contact.php","Contact"], ["/connexionForm.php","Connexion"], ["/profil.php","Profil"]];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=$metaDescription?>">
    <link rel="stylesheet" type="text/css" href="/assets/css/styleSheet.css">
    <title><?=$pageTitre?></title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>
<body>
<header>
    <nav>
        <!-- Bouton hamburger -->
        <button id="mainMenu-btn-toggleCollapse" aria-controls="mainMenu" aria-expanded="false" aria-label="Afficher le menu">
            <span></span><span></span><span></span>
        </button>

        <!-- menu hamburger -->
        <div id="mainMenu" class="menu">
            <ul>
                <?php
                foreach($menu as $item){
                    $activeClass = ($_SERVER["REQUEST_URI"] == $item[0]) ? "class='active'" : "";
                    ?>
                    <li><a <?=$activeClass?> href="<?=$item[0]?>"><?=$item[1]?></a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </nav>
</header>
<main>
<script defer src="./js/app.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>



