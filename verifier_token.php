<?php

// ajout en plus du cahier des charges

// controleur : vérifie l'existance du token et sa validité, si ok, valide le compte, et affiche la page de connexion
// parametre : token de verification

// initialisation

use Aldev\Modeles\utilisateur;

include "utils/init.php";

// récupération
$token = isset($_GET["token"]) ? $_GET["token"] : 0;
$mdpOubli = isset($_GET["mdpOubli"]) ? $_GET["mdpOubli"] : 0;


// traitement
// on instancie un nouvel utilisateur
$utilisateur = new utilisateur();
// on récupère l'utilisateur qui possede le token
$utilisateur->utilisateurExist("token", $token);
$idUtilisateur = $utilisateur->id();

if($idUtilisateur == 0){
    header("Location: afficher_elaboration.php?noToken=1");
    exit;
}
if($mdpOubli == 1){
    // sinon, on récupère le time de validité
    $time = \time();
    if($utilisateur->validite < $time){
        // si le time actu est inferieur au time de validité, on affiche la page connexion avec msg compte vérifié
        header("Location: afficher_modification_mdp.php?idUtilisateur=$idUtilisateur");
    }else{
        // sinon on redirige vers page de création avec msg la verification a expiré
        header("Location: afficher_elaboration.php?echec=1");
    } 
}else{
    // si le statut est valide (1) on redirige vers la page de connexion
    if($utilisateur->statut == 1){
        header("Location: afficher_elaboration.php?idUtilisateur=$idUtilisateur");
    }else{
        // sinon, on récupère le time de validité
        $time = \time();
        if($utilisateur->validite < $time){
            // si le time actu est inferieur au time de validité, on passe le statut a 1 (valide) et on affiche la page connexion avec msg compte vérifié
            $utilisateur->statut = 1;
            $utilisateur->update();
            header("Location: afficher_elaboration.php?verif=1&idUtilisateur=$idUtilisateur");
        }else{
            // sinon on redirige vers page de création avec msg la verification a expiré
            header("Location: afficher_elaboration.php?echec=1");
        }
    }
}

