<?php

// fragment : formulaire d'oubli mdp

?>


<div id="pop-oubli" class="w100p h100v-80 <?php if($mailOubli == 0) echo "d-none "; ?>flex j-center a-center">
    <div>
        <h3 class="txt-center vert">Mot de passe oublié</h3>
        <?php
            if($mailOubli == 1 ){
                ?>
                    <p class='w300 mt4 fs12 rouge mrlauto'>Ce mail est inconnu dans notre base de données, veuillez en saisir un autre pou créer un compmte</p>
                <?php
            }
        ?>
        <form action="renvoyer_token.php" method="POST" class="mt32">
            <div>
                <label class="fs14 block txt-center" for="mailOubli"><b>Mail</b></label>
                <input class="mrlauto w200 mt8" type="text" name="mailOubli" id="mailOubli">
            </div>
            <div class="flex j-center mt16">
                <input class="white back-green btnPad radius5 b-none txt-center" type="submit" value="Envoyer">
            </div>
        </form>        
        <div class="w200 flex j-between mt32 a-center">
            <a href="afficher_elaboration.php"><button class="white back-green btnPad radius5 b-none">Annuler</button></a>
            <a href="afficher_page_creation.php"><button class="white back-green btnPad radius5 b-none">Créer un compte</button></a>
        </div>
    </div>
</div>