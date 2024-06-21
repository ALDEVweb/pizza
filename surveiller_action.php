<?php

// controleur ajax : ajoute l'option selectionné à la pizza
// parametre : $idOption : id de l'option à ajouter

// initialisation
include "utils/init.php";

// vérification d'un utilisateur connecté, sinon redirection vers la connexion
use function Aldev\Utils\session_idconnected;
use function Aldev\Utils\session_isconnected;
include "utils/verif_connexion.php"; // inutile
$idUser = session_isconnected() ? session_idconnected() : 0; // inutile

// récupération
$idOption = isset($_GET["idOption"]) ? $_GET["idOption"] : 0;
$categorie = isset($_GET["categorie"]) ? $_GET["categorie"] : "";
$idPizzElab = isset($_SESSION["idPizzElab"]) ? $_SESSION["idPizzElab"] : 0;
$action = isset($_GET["action"]) ? $_GET["action"] : "";

// traitement
// instanciation d'un objet pizza chargé par l'id de la pizz en cours
$pizza = new Aldev\Modeles\pizza($idPizzElab);
if($categorie == "ingredient"){
    // instanciation d'un nouvel objet composition vierge
    $composition = new Aldev\Modeles\composition();
    // appel de la méthode de création ou suppression d'une composition
    if($action == "ajout") $composition->compo($idPizzElab, $idOption);
    else if($action == "suppression") $composition->sup($idPizzElab, $idOption);
}else{
    // je charge l'id de l'option dans le champs concerné
    if($action == "ajout") $pizza->$categorie = $idOption;
    else if($action == "suppression") $pizza->$categorie = NULL;
}

// je met à jour la pizza avec le time de l'action
$pizza->majAction();

// retour
// aucun