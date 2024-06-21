<?php

// controleur : demande l'affichage du formulaire de modification du mot de passe
// parametre : idUtilisateur - id de l'uutilisateur qui change son mdp

// initialisation
include "utils/init.php";

// récupération
$idUtilisateur = isset($_GET["idUtilisateur"]) ? $_GET["idUtilisateur"] : 0;
$error = isset($_POST["error"]) ? $_POST["error"] : 0;

//affichage
include "templates/pages/modification_mdp.php";