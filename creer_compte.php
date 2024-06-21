<?php

// ajout en plus du cahier des charges

// controleur : crée l'utilisateur dans la base de donnée - génére un token, fixe sa durée de validité et env un mail de vérification
// parametre : nom - prenom - mail - mdp  de l'utilisateur

// initialisation
include "utils/init.php";

// récupération
$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "";
$mail = isset($_POST["mailCrea"]) ? $_POST["mailCrea"] : "";
$mdpCrea = isset($_POST["mdpCrea"]) ? $_POST["mdpCrea"] : "";
$mdpVerif = isset($_POST["mdpVerif"]) ? $_POST["mdpVerif"] : "";
if($mdpCrea == "" || $mdpVerif == "" || $mdpCrea != $mdpVerif) $doubleMdp = 0;
else $doubleMdp = 1;

// vérification si un utilisateur existe ou non avec ce mail
$utilisateur = new \Aldev\Modeles\utilisateur();
$utilisateurExist = $utilisateur->utilisateurExist("mail", $mail);
if($utilisateurExist != 0){
    header("Location: afficher_page_creation.php?mailExist=1");
    exit;
}

// traitement
if($nom == "" || $prenom == "" || $mail == "" || $doubleMdp == 0){
    header("Location: afficher_page_creation.php?error=1&nom=$nom&prenom=$prenom&mail=$mail&doubleMdp=$doubleMdp");
    exit;
}

// chargement d'un nouvel utilisateur avec ses informations
$utilisateur->nom = $nom;
$utilisateur->prenom = $prenom;
$utilisateur->mail = $mail;
$utilisateur->setPwd($mdpCrea);
// chargement du statut
$utilisateur->statut = 0;
// génération et chargement d'un token
$token = $utilisateur->genToken();
$utilisateur->token = $token;
// récupération et chargement d'un time
$time = \time();
$utilisateur->validite = $time;
// insertion
$utilisateur->insert();
// envoi du mail
$utilisateur->sendMail("templates/mails/verification_mail.php", ["prenom" => $prenom, "token" => $token, "detailMailTo" => "$prenom $nom", "mailTo" => "$mail", "subject" => "Finalise ton inscription à Pizz'@ la carte", "appli" => "Pizz'à la carte", "from" => "alaugier@mywebecom.ovh", "reply" => "alaugier@mywebecom.ovh"]);

// affichage
header ("Location: afficher_elaboration.php?creation=1");

