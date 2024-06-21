<?php

// fragment : affiche le choix de sélection de la taille de la pizza

?>

<h3 class="wfit mrlauto mt4">La taille</h3>
<div class="w100p mt4">
    <?php
        foreach($tailles as $idTaille => $taille){
            ?>
                <div data-categorie="taille" data-ref="<?= $idTaille ?>" class="option back-white mt8 radius10 w80p h80 mrlauto pad4 flex j-between a-center <?php if($pizza->taille == $idTaille) echo "opt-select"; ?>">
                    <img class="h60 wauto radius50p" src="assets/<?= $taille->photo ?>.jpg" alt="photo d'une <?= $taille->photo ?> pizza">
                    <p class="fs12 w160"><b><?= $taille->nom ?> : <?= $taille->prix ?>€</b><br><?= $taille->description ?></p>
                </div>
            <?php
        }
    ?>
</div>