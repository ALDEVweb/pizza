<?php

// fragment : champ création mot de passe à intégrer dans un formulaire

?>

    <div class="w200 mrlauto mt16">
        <label class="block mrlauto wfit fs14" for="mdpCrea"><b>Mot de passe</b></label>
        <div class="w200 mt4 flex j-between">
            <input class="w160" type="password" name="mdpCrea" id="mdpCrea">
            <div id="oeil-crea" class="oeil flex j-center back-green btnPad radius5 b-none"><img src="assets/oeil_ferme_blanc.svg" alt="image d'un oeil"></div>
        </div>
    </div>
    <div id="instructionMdp" class="w200 mrlauto mt8">
        <p class="fs12">Le mot de passe doit contenir un minimum de :</p>
        <p id="mdpTot" class="fs12 mt4">- 8 caractères</p>
        <p id="mdpMaj" class="fs12">- 1 lettre majuscule</p>
        <p id="mdpNbr" class="fs12">- 1 chiffre</p>
        <p id="mdpSpe" class="fs12">- 1 caractère spécial</p>
        <p class="fs12 mt8">Tu peux aussi utiliser notre générateur de mot de passe aléatoirement</p>
        <div class="w200 flex j-around a-center mt8">
            <p id="generateur" class="w50 white back-green btnPad radius5 b-none txt-center fs10">Générer</p>
            <p id="affichage-mdp" class="w70 btnPad radius5 b-none txt-center fs10"></p>
        </div>
    </div>
    <div class="w200 mrlauto mt8">
        <label class="block mrlauto wfit fs12" for="mdpVerif"><b>Vérification du mot de passe</b></label>
        <div class="mrlauto w200 mt4 flex j-between a-center">
            <input class="w160" type="password" name="mdpVerif" id="mdpVerif">
            <div id="oeil-verif" class="oeil flex j-center back-green btnPad radius5 b-none"><img src="assets/oeil_ferme_blanc.svg" alt="image d'un oeil"></div>
        </div>
    </div>
    <?php if($error == 1 && $doubleMdp == 0) echo "<p class='w200 mt8 fs12 rouge mrlauto'>Veuillez saisir 2 mots de passe identiques</p>"; ?>