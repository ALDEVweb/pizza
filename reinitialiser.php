<?php

// controleur : supprime les options de la pizza à modifier
// parametres : aucun

// initialisation 

// use function Aldev\Utils\session_idconnected; //inutile
// use function Aldev\Utils\session_isconnected; // inutile

include "utils/init.php";

// vérification d'un utilisateur connecté, sinon redirection vers la connexion
use function Aldev\Utils\session_idconnected;
use function Aldev\Utils\session_isconnected;
include "utils/verif_connexion.php"; // inutile
$idUser = session_isconnected() ? session_idconnected() : 0; // inutile

// récupération
// $idUser = session_isconnected() ? session_idconnected() : 0; // inutile
$idPizzElab = isset($_SESSION["idPizzElab"]) ? $_SESSION["idPizzElab"] : 0;

// traitement
// Chargement de la pizza
$pizza = new \Aldev\Modeles\pizza($idPizzElab);
// remise à 0 des options
$pizza->pizzInit();

// affichage
header("Location: afficher_elaboration.php");