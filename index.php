<?php
$metaDescription = "Page d'accueil";
$pageTitre = "Accueil";
require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php';

?>
    <h1>Accueil</h1>

<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
        </div>
        <div class="swiper-slide">
            <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
        </div>
        <div class="swiper-slide">
            <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
        </div>
        <div class="swiper-slide">
            <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
        </div>
    </div>
</div>

<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>

