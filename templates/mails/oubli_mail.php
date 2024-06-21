<?php 

// ajout en plus du cahier des charges

// template de mail : mail avec lien de vérification pointant vers le formulaire de modification de mdp
//

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizz'@ la carte - Mot de passe oublié</title>
</head>
<body>
    <p>Bonjour <?= $param["prenom"] ?>,</p>
    <p>Pour créer un nouveau mot de passe, vérifie ton adresse e-mail en cliquant sur le lien ci-dessous :</p>
    <p><a href="http://pizza.alaugier.mywebecom.ovh/pizza/verifier_token.php?mdpOubli=1&token=<?= $param["token"] ?>">Pizz'@ la carte</a></p>
    <p>Si tu n'as pas demandé la modification de ton mot de passe, ignore cet e-mail.</p>
    <p>Merci,</p>
    <p>L'équipe Pizz'@ la carte</p>
</body>
</html>