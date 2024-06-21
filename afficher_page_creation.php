<?php

// ajout en plus du cahier des charges

// controleur : dde l'affichage du formulaire de création d'un compte
// parametre : error doublemdp- nom prenom mail renseigné par l'utilisateur

// initialisation


include "utils/init.php";// vérification d'un utilisateur connecté, sinon redirection vers la connexion

// récupération
$error = isset($_GET["error"]) ? $_GET["error"] : 0;
$nom = isset($_GET["nom"]) ? $_GET["nom"] : "";
$prenom = isset($_GET["prenom"]) ? $_GET["prenom"] : "";
$mail = isset($_GET["mail"]) ? $_GET["mail"] : "";
$doubleMdp = isset($_GET["doubleMdp"]) ? $_GET["doubleMdp"] : 1;
$mailExist = isset($_GET["mailExist"]) ? $_GET["mailExist"] : 0;

// affichage
include "templates/pages/page_creation.php";