<?php

// ajout en plus du cahier des charges

// fragment : affiche le formulaire de création d'un compte

?>

<form class="mt32" action="creer_compte.php" method="POST">
    <div class="w200 mrlauto flex j-between">
        <div class="w90">
            <label class="block mrlauto wfit fs14" for="nom"><b>Nom</b></label>
            <input class="mrlauto w90 mt4" type="text" name="nom" id="nom" value="<?= $nom ?>">
        </div>
        <div class="w90">
            <label class="block mrlauto wfit fs14" for="prenom"><b>Prenom</b></label>
            <input class="mrlauto w90 mt4" type="text" name="prenom" id="prenom" value="<?= $prenom ?>">
        </div>
    </div>
    <?php
        if($error == 1 && $nom == "" && $prenom == "") echo "<p class='w200 mt4 fs12 rouge mrlauto'>Veuillez saisir un nom et un prénom</p>";
        else if($error == 1 && $nom == "") echo "<p class='w200 mt4 fs12 rouge mrlauto'>Veuillez saisir un nom</p>";
        else if($error == 1 && $prenom == "") echo "<p class='w200 mt4 fs12 rouge mrlauto'>Veuillez saisir un prénom</p>"; 
    ?>
    <div class="w200 mrlauto mt8">
        <label class="block mrlauto wfit fs14" for="mailCrea"><b>Mail</b></label>
        <input class="mrlauto w200 mt4" type="text" name="mailCrea" id="mailCrea" value="<?= $mail ?>">
    </div>
    <?php if($error == 1 && $mail == "") echo "<p class='w200 mt4 fs12 rouge mrlauto'>Veuillez saisir un mail</p>"; ?>
    <?php include "templates/fragments/creation_mdp.php"; ?>
    <div class="flex j-center mt32">
        <input class="white back-green btnPad radius5 b-none txt-center" type="submit" value="Créer">
    </div>
    <?php if($mailExist == 1) echo "<p class='w200 mt16 fs12 rouge mrlauto'>Un compte est déjà créé avec ce mail</p>"; ?>
</form>