<?php

// controleur : modifie un mdp dans la bdd
// parametre : idUtilisateur
//             mdp

// initialisation
include "utils/init.php";

// récupération
$idUtilisateur = isset($_GET["idUtilisateur"]) ? $_GET["idUtilisateur"] : 0;
$mdpCrea = isset($_POST["mdpCrea"]) ? $_POST["mdpCrea"] : "";
$mdpVerif = isset($_POST["mdpVerif"]) ? $_POST["mdpVerif"] : "";
if($mdpCrea == "" || $mdpVerif == "" || $mdpCrea != $mdpVerif) $doubleMdp = 0;
else $doubleMdp = 1;

// traitement
// traitement
if($doubleMdp == 0){
    header("Location: afficher_modification_mdp.php?error=1&doubleMdp=$doubleMdp&idUtilisateur=$idUtilisateur");
    exit;
}
$utilisateur = new Aldev\Modeles\utilisateur($idUtilisateur);
$utilisateur->setPwd($mdpCrea);
$utilisateur->statut = 1;
$utilisateur->update();

// affichage
header("Location: afficher_elaboration.php?majMdp=1");