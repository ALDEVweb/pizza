<?php

// ajout en plus du cahier des charges

// fragment : formulaire de connexion

?>

<form class="mt32" action="connecter.php" method="POST">
    <div class="w200 mrlauto">
        <label class="fs14 block mrlauto wfit" for="mail"><b>Mail</b></label>
        <input class="mrlauto w200 mt8" type="text" name="mail" id="mail" <?php if($idUtilisateur != 0) echo "value='$utilisateur->mail'"; ?>>
    </div>
    <div class="w200 mrlauto mt16">
        <label class="fs14 block mrlauto wfit" for="mdp"><b>Mot de passe</b></label>
        <div class="w200 flex j-between mt8">
            <input class="w160" type="password" name="mdp" id="mdp">
            <div id="oeil-connect" class="oeil flex j-center back-green btnPad radius5 b-none"><img src="assets/oeil_ferme_blanc.svg" alt="image d'un oeil"></div>
        </div>
        <p id="mdp-oubli" class="fs10 vert txt-center mt8">Mot de passe oublié ?</p>
    </div>
    <div class="flex j-center mt32">
        <input class="white back-green btnPad radius5 b-none txt-center" type="submit" value="Connexion">
    </div>
    <?php if($error == 1) echo "<p class='w200 mt16 fs12 rouge mrlauto'>Il y a une erreur de saisie sur ton mail ou mot de passe</p>"; ?>
</form>