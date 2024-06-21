<?php

// fragment : construit le bouton de sélection d'un ingredient

?>

<div data-categorie="ingredient" data-ref="<?= $idIngredient ?>" class="option back-white mt8 radius10 w80p h40 mrlauto pad4 flex j-between a-center <?php if($compoSelect != 0) echo "opt-select"; else if(count($listeCompo) >= $taille->maxi) echo "opt-unselect" ?>">
    <img class="h30 wauto radius50p" src="assets/<?= $ingredient->photo ?>.jpg" alt="photo de <?= $ingredient->photo ?>">
    <p class="fs12"><b><?= $ingredient->nom ?></b></p>
    <p class="fs12"><b><?= $ingredient->prix ?>€</b></p>
</div>