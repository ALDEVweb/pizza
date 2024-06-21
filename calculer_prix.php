<?php

// controleur ajax : calcule le prix de la pizza en cours
// parametre : $idPizzElab - id de la pizza en corus

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
$pizza = new \Aldev\Modeles\pizza($idPizzElab);
$pizza->majAction();
$infosPizz = $pizza->infoPizz();
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
$prixTotal = $infosPizz["prixTaille"] + $infosPizz["prixType"] + $infosPizz["prixBase"] + $prixIngredient;

// retour
echo json_encode(["prix" => $prixTotal]);