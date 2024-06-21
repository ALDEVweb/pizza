<?php

// ajout en plus du cahier des charges

// controleur : compare le mail et mdp envoyé et les compare avec la base de donnée pour connecter l'utilisateur (à développer pour la bonne réalisation des test)
//              Crée une nouvelle pizza au statut en cours d'elaboration ou charge l'existante si il y en a une
// paramètres : mail : mail de l'utilisateur
//              mdp : mot de passe de l'utilisateur

// initialisation

use function Aldev\Utils\session_connect;

include "utils/init.php";


// récupération
$mail = isset($_POST["mail"]) ? $_POST["mail"] : "";
$mdp = isset($_POST["mdp"]) ? $_POST["mdp"] : "";

// traitement
// instanciation d'un objet utilisateur vierge
$utilisateur = new Aldev\Modeles\utilisateur();
// vérification de la correspondance des identifiant (récupération de l'id)
$idUtilisateur = $utilisateur->loginVerify($mail, $mdp);

// si l'id est égal à 0, echec authentification je renvoi sur la page connexion
if($idUtilisateur == 0){
    header("Location: afficher_elaboration.php?error=1");
    exit;
}

$utilisateur = new \Aldev\Modeles\utilisateur($idUtilisateur);
if($utilisateur->statut == 0){
    header("Location: afficher_elaboration.php?inactif=1&idUtilisateur=$idUtilisateur");
    exit;
}
// sinon, je connecte l'utilisateur
session_connect($idUtilisateur);

// affichage
// (redirection vers la page d'elaboration)
header("Location: afficher_elaboration.php");