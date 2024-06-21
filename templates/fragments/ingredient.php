<?php

// fragment : affiche le choix de sélection de la taille de la pizza

?>

<h3 class="wfit mrlauto mt4">Les ingrédients</h3>
<div id="containIngredient" class="w100p mt4">
    <h4 class="txt-center mt8"><b>Fromages</b></h4>
    <?php
        $listeCompo = $compo->listAll(["pizza" => $idPizzElab]);
        foreach($ingredients as $idIngredient => $ingredient){
            if($ingredient->categorie == "fromage"){
                $compoSelect = $compo->compoExist($idPizzElab, $idIngredient);
                include "templates/fragments/select_ingredient.php";
            }
        }
    ?>
    <h4 class="txt-center mt8"><b>Viandes</b></h4>
    <?php
        foreach($ingredients as $idIngredient => $ingredient){
            if($ingredient->categorie == "viande"){
                $compoSelect = $compo->compoExist($idPizzElab, $idIngredient);
                include "templates/fragments/select_ingredient.php";
            }
        }
    ?>
    <h4 class="txt-center mt8"><b>Légumes</b></h4> 
    <?php
        foreach($ingredients as $idIngredient => $ingredient){
            if($ingredient->categorie == "legume"){
                $compoSelect = $compo->compoExist($idPizzElab, $idIngredient);
                include "templates/fragments/select_ingredient.php";
            }
        }
    ?> 
    <h4 class="txt-center mt8"><b>Autres</b></h4> 
    <?php
        foreach($ingredients as $idIngredient => $ingredient){
            if($ingredient->categorie == "autre"){
                $compoSelect = $compo->compoExist($idPizzElab, $idIngredient);
                include "templates/fragments/select_ingredient.php";
            }
        }
    ?>   
</div>