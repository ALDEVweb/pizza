<?php

// fragment : affiche le choix de sélection de la base de la pizza

?>

<h3 class="wfit mrlauto mt4">La base</h3>
<div class="w100p mt4">
    <?php
        foreach($bases as $idBase => $base){
            ?>
                <div data-categorie="base" data-ref="<?= $idBase ?>" class="option back-white mt8 radius10 w80p h80 mrlauto pad4 flex j-between a-center <?php if($pizza->base == $idBase) echo "opt-select"; ?>">
                    <img class="h60 wauto radius50p" src="assets/<?= $base->photo ?>.jpg" alt="photo d'une sauce <?= $base->photo ?>">
                    <p class="fs12 w160"><b><?= $base->nom ?> : <?= $base->prix ?>€</b><br><?= $base->description ?></p>
                </div>
            <?php
        }
    ?>
</div>