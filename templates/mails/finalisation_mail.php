<?php 

// ajout en plus du cahier des charges

// template de mail : envoi un mail à l'utilisateur avec un recap de sa pizza finalisé
//

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizz'@ la carte - récapitulatif pizza</title>
</head>
<body>
    <p>Bonjour <?= $param["prenom"] ?>,</p>
    <p>Merci d'avoir commandé chez pizz'@ la carte !</p>
    <p>Voici le récapitulatif de ta pizza personnalisée :</p>
    <p><b>- Taille de la pizza :</b> <?= $param["taille"] ?></p>
    <p><b>- Type de pâte :</b> <?= $param["type"] ?></p>
    <p><b>- Base :</b> <?= $param["base"] ?></p>
    <p><b>- Ingrédients :</b></p>
    <ul>
        <?php 
        foreach($param["ingredients"] as $id => $nom){
            echo "<li>- $nom</li>";
        }
        ?>
    </ul>
    <p><b>- Prix total :</b> <?= $param["prix"] ?>€</p>
    <p>Merci, l'équipe Pizz'@ la carte</p>
</body>
</html>