<?php

// ajout en plus du cahier des charges

// template : page de connexion de l'aplicaytion
// parametre : idPizzElab - id de la pizza en cours d'élaboration
// ajout : idUtilisateur - id de l'utilisateur qui a verifier son compte

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizz'@ la carte - connexion</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include "templates/fragments/header.php"; ?>
    <div id="connexion" class="arriere-plan w100p h100v-80"></div>
    <?php include "templates/fragments/mdp_oubli.php"; ?>
    <main class="w300 mrlauto h100v-80 flex a-center j-center">
        <div>
            <?php 
                if($creation == 1) echo "<p class='w200 vert fs12 txt-center mb32'>Compte créé avec succès !<br>Un e-mail de vérification t'a été envoyé.</p>";
                if($verif == 1 ) echo "<p class='w200 vert fs12 txt-center mb32'>Vérification réussie !<br>Ton compte est maintenant actif.</p>";
                if($echec == 1) echo "<a href='renvoyer_verif.php?idUtilisateur=$idUtilisateur'><p class='w200 vert fs12 txt-center mb32'>Le lien de vérification à expiré.<br>Clic <b>ici</b> pour recevoir un nouveau lien de vérification</p></a>";
                if($renvoi == 1) echo "<p class='w200 vert fs12 txt-center mb32'>Un e-mail de vérification t'a été envoyé.</p>";
                if($inactif == 1) echo "<a href='renvoyer_verif.php?idUtilisateur=$idUtilisateur'><p class='w200 vert fs12 txt-center mb32'>Ton compte est inactif.<br>Clic <b>ici</b> pour recevoir un lien de vérification et le réactiver.</p></a>";
                if($majMdp == 1) echo "<p class='w200 vert fs12 txt-center mb32'>La modification de ton mot de passe est bien prise en compte.</p>";
            ?> 
            <h2 class="txt-center vert">Connexion</h3>
            <?php include "templates/fragments/form_connect.php"; ?>
            <h4 class="txt-center mt80">Pas encore de compte ?</h3>
            <div class="flex j-center mt32"><a href="afficher_page_creation.php"><button class="white back-green btnPad radius5 b-none">Créer un compte</button></a></div>
        </div>
    </main>
    <script src="js/connexion.js" defer></script>
</body>
</html>