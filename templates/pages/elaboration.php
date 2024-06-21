<?php

// template : Affiche la page d'élaboration d'une pizza :
//              - 1 visuel de chaque option avec image en fond
//              - Prix
//              - btn réinitialiser et finaliser cde
//              - zone de choix de l'option et bouton option suivant ou précédent

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizz'@ la carte - Elaboration de la pizza</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="librairies/swiper/swiper-bundle.css">
</head>
<body>
    <?php include "templates/fragments/header.php"; ?>
    <div id="elaboration" class="arriere-plan w100p h100v-80"></div>
    <main>
        <section id="recap" class="w300 mrlauto"></section>
        <section class="w300 mrlauto">
            <div class="w100p flex j-between mt16 a-center">
                <a href="reinitialiser.php"><button id="raz" class="white back-green btnPad radius5 b-none">Réinitialiser</button></a>
                <p id="prixDirect"><b>Prix : - €</b></p>
                <a href="valider.php"><button id="valide" class="white back-green btnPad radius5 b-none">Valider</button></a>
            </div>
        </section>
        <section id="select-option" class="w300 mrlauto">
            <!-- Slider main container -->
            <div class="swiper radius10 mt16">
            <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide"> <?php include "templates/fragments/taille.php"; ?> </div>
                    <div class="swiper-slide"> <?php include "templates/fragments/type.php"; ?> </div>
                    <div class="swiper-slide"> <?php include "templates/fragments/base.php"; ?> </div>
                    <div class="swiper-slide" id="ingredient"> <?php include "templates/fragments/ingredient.php"; ?> </div>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </section>
    </main>
    <?php
    if($error == 1){
        ?>
        <div id="error" class="blur flex a-center w100p h100v">
            <div class="w300 back-grey mrlauto radius10 pad16">
                <div class="flex j-end"><button class="fermError white back-green btnPad radius5 b-none">×</button></div>
                <ul class="mt32 back-white pad8 radius5">
                    <li><b>Avant de valider, sélectionnez :</b></li>
                    <li class="mt8">- La taille de votre pizza,</li>
                    <li class="mt4">- Le type de pâte souhaté,</li>
                    <li class="mt4">- Sa base,</li>
                    <li class="mt4">- Un minimum de <?= $taille->mini ?> ingrédients</li>
                    <li class="mt4">- Et un maximum de <?= $taille->maxi ?> ingrédients</li>
                </ul>
                <div class="flex j-center mt32"><button class="fermError white back-green btnPad radius5 b-none">Modifier ma pizza</button></div>
            </div>
        </div>
        <?php
    }
    ?>
    <div id="lessOpt" class="blur flex a-center w100p h100v d-none">
        <div class="w300 back-grey mrlauto radius10 pad16">
            <div class="flex j-end"><button class="fermLessOpt white back-green btnPad radius5 b-none">×</button></div>
            <div class="mt32 back-white pad8 radius5">
                <p id="msgTaille">Attention, il y a trop d'ingrédient pour cette taille</p>
                <p id="msgRetrait" class="mt8">Veuillez en retirer</p>
            </div>
            <div class="flex j-center mt32"><button class="fermLessOpt white back-green btnPad radius5 b-none">Modifier ma pizza</button></div>
        </div>
    </div>        
    <script src="js/surveille_recap.js" defer></script>
    <script src="librairies/swiper/swiper-bundle.js" defer></script>
    <script src="js/swiper_init.js" defer></script>
</body>
</html>