<?php

// controleur ajax : surveille et affiche les option de la pîzza (taille-type-base-ingredient-prix)
// parametre : idPizzElab - id de la pizza en cours

// initialisation
include "utils/init.php";

// vérification d'un utilisateur connecté, sinon redirection vers la connexion
use function Aldev\Utils\session_idconnected;
use function Aldev\Utils\session_isconnected;
include "utils/verif_connexion.php"; // inutile
$idUser = session_isconnected() ? session_idconnected() : 0; // inutile

// récupération
$idPizzElab = isset($_SESSION["idPizzElab"]) ? $_SESSION["idPizzElab"] : 0;

// traitement
// récupération nom et prix des options de la pizza
$pizza = new \Aldev\Modeles\pizza($idPizzElab);
$pizza->majAction();
$infosPizz = $pizza->infoPizz();
$photoTaille = !is_null($infosPizz["photoTaille"]) ? $infosPizz["photoTaille"] : "opt-unselect";
$photoType = !is_null($infosPizz["photoType"]) ? $infosPizz["photoType"] : "opt-unselect";
$photoBase = !is_null($infosPizz["photoBase"]) ? $infosPizz["photoBase"] : "opt-unselect";

// récupération de la liste des ingredient
$composition = new \Aldev\Modeles\composition();
$listeCompo = $composition->listAll(["pizza" => $idPizzElab]);
//calcul prix total ingrédient
$prixIngredient = 0;
foreach($listeCompo as $id => $compo){
    // récupération de 'lingrédient
    $ingredient = $compo->getTarget("ingredient");
    // récupération du nom
    $prix = $ingredient->prix;
    $prixIngredient += $prix;
}
// calcul du nombre de div vide à afficher
$divVide = 9 - count($listeCompo);

$prixTotal = $infosPizz["prixTaille"] + $infosPizz["prixType"] + $infosPizz["prixBase"] + $prixIngredient;

// affichage
include "templates/fragments/recap.php";