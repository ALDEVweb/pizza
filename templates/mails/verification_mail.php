<?php 

// ajout en plus du cahier des charges

// template de mail : vérification du mail utilisateur
//

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizz'@ la carte - vérification du mail</title>
</head>
<body>
    <p>Bonjour <?= $param["prenom"] ?>,</p>
    <p>Merci de t'être inscrit sur Pizz'@ la carte ! Pour compléter ton inscription et activer ton compte, vérifie ton adresse e-mail en cliquant sur le lien ci-dessous :</p>
    <p><a href="http://pizza.alaugier.mywebecom.ovh/pizza/verifier_token.php?token=<?= $param["token"] ?>">Pizz'@ la carte</a></p>
    <p>Si tu n'as pas créé de compte sur Pizz'@ la carte, ignore cet e-mail.</p>
    <p>Merci,</p>
    <p>L'équipe Pizz'@ la carte</p>
</body>
</html>