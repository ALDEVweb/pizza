<?php

// ajout en plus du cahier des charges

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
    <title>Pizz'@ la carte - récapitulatif de la pizza finalisée</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include "templates/fragments/header.php"; ?>
    <div id="finalisation" class="arriere-plan w100p h100v-80"></div>
    <main class="w300 mrlauto">
        <h2 class="mt32">Pizza en préparation</h2>
        <h3 class="mt32">Pizza n°<?= $pizza->id() ?> : <?= $prixTotal ?> €</h3>
        <div class="flex a-center mt16">
            <p class="mr16"><b>Taille :</b> <?= $infosPizz["nomTaille"] ?></p>
            <img class="h30 wauto radius50p" src="assets/<?= $infosPizz["photoTaille"] ?>.jpg" alt="photo d'une <?= $infosPizz["photoTaille"] ?> pizza">
        </div>
        <div class="flex a-center mt4">
            <p class="mr16"><b>Type de pâte :</b> <?= $infosPizz["nomType"] ?></p>
            <img class="h30 wauto radius50p" src="assets/<?= $infosPizz["photoType"] ?>.jpg" alt="photo d'une pâte <?= $infosPizz["photoType"] ?>">
        </div>
        <div class="flex a-center mt4">
            <p class="mr16"><b>Base :</b> <?= $infosPizz["nomBase"] ?></p>
            <img class="h30 wauto radius50p" src="assets/<?= $infosPizz["photoBase"] ?>.jpg" alt="photo d'une sauce <?= $infosPizz["photoBase"] ?>">
        </div>
        <p class="mt4"><b>Ingrédients :</b></p>
        <?php
        foreach($listeCompo as $id => $compo){
            // récupération de 'lingrédient
            $ingredient = $compo->getTarget("ingredient");
            ?>
            <div class="flex a-center mt4">
                <img class="h30 wauto radius50p mr16" src="assets/<?= $ingredient->photo ?>.jpg" alt="photo d'une sauce <?= $ingredient->photo ?>">
                <p><?= $ingredient->nom ?></p>
            </div>
            <?php
        }
        ?>
        <a href="afficher_elaboration.php"><button class="white back-green btnPad radius5 b-none mt32">Céer une nouvelle pizza</button></a>
    </main>
    </body>
</html>