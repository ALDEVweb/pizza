<?php

// fragment : formulaire de modification d'un mdp
// parametre : idUtilisateur

?>


<form class="mt32" action="modifier_mdp.php?idUtilisateur=<?= $idUtilisateur ?>" method="POST">
    <?php include "templates/fragments/creation_mdp.php"; ?>
    <div class="flex j-center mt32">
        <input class="white back-green btnPad radius5 b-none txt-center" type="submit" value="Modifier">
    </div>
</form>