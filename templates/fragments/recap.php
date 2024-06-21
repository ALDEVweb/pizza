<?php

// ajout en plus du cahier des charges

// template : affiche le recap de la pizza - taille-type-base-ingredient-prix
// parametre : aucun

?>


<div id="recap-pizza" class="flex j-between mt16">
    <div class="recap flex j-center a-center ">
        <div class="back <?= $photoTaille ?>"></div>
        <?php
            if(!is_null($infosPizz["nomTaille"])){
                 ?>
                 <p class='fs12 w100p vert back-recap padRecap txt-center'><b><?= $infosPizz["nomTaille"] ?></b></p>
                 <?php
            }
            else echo "<p>Taille</p>"; 
        ?>
    </div><div class="recap flex j-center a-center ">
    <div class="back <?= $photoType ?>"></div>
        <?php
            if(!is_null($infosPizz["nomType"])){ 
                ?>
                <p class='fs12 w100p vert back-recap padRecap txt-center'><b><?= $infosPizz["photoType"] ?></b></p>
                <?php
            }
            else echo "<p>Type</p>"; 
        ?>
    </div><div class="recap flex j-center a-center ">
    <div class="back <?= $photoBase ?>"></div>
        <?php
            if(!is_null($infosPizz["nomBase"])){ 
                ?>
                <p class='fs12 w100p vert back-recap padRecap txt-center'><b><?= $infosPizz["photoBase"] ?></b></p>
                <?php
            }
            else echo "<p>Base</p>"; 
        ?>
    </div>
</div>
<div id="recap-compo" class="flex j-between mt8">
    <?php
    foreach($listeCompo as $id => $compo){
        // récupération de 'lingrédient
        $ingredient = $compo->getTarget("ingredient");
        // récupération du nom
        $nom = $ingredient->get("nom");
        // récupération de txt photo
        $photo = $ingredient->get("photo");
        ?>
            <div class="recap flex j-center a-center ">
                <div class="back <?= $photo ?>"></div>
                <p class="vert fs12 back-recap padRecap w100p txt-center"><b><?= $nom ?></b></p>
            </Div>
        <?php
    }
    
    for($i = 1; $i <= $divVide; $i++){
        ?>
            <Div class="recap flex j-center a-center opt-unselect">
                <p>/</p>
            </Div>
        <?php
    } 
    
    ?>
</div>

