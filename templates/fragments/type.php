<?php

// fragment : affiche le choix de sélection du type de pâte de la pizza

?>

<h3 class="wfit mrlauto mt4">Le type de pâte</h3>
<div class="w100p mt4">
    <?php
        foreach($types as $idType => $type){
            ?>
                <div data-categorie="type" data-ref="<?= $idType ?>" class="option back-white mt8 radius10 w80p h80 mrlauto pad4 flex j-between a-center <?php if($pizza->type == $idType) echo "opt-select"; ?>">
                    <img class="h60 wauto radius50p" src="assets/<?= $type->photo ?>.jpg" alt="photo d'une pizza <?= $type->photo ?>">
                    <p class="fs12 w160"><b><?= $type->nom ?> : <?= $type->prix ?>€</b><br><?= $type->description ?></p>
                </div>
            <?php
        }
    ?>
</div>