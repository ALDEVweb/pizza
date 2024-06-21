<?php

// controleur de test - finalisartion commande
// parametres : id pizza

//initialisation
include "utils/init.php";


// vérification d'un utilisateur connecté, sinon redirection vers la connexion
use function Aldev\Utils\session_idconnected;
use function Aldev\Utils\session_isconnected;
include "utils/verif_connexion.php"; // inutile
$idUser = session_isconnected() ? session_idconnected() : 0; // inutile


// récupération
$id = isset($_GET["id"]) ? $_GET["id"] : 0;

// traitement
$pizza = new \Aldev\Modeles\pizza($id);
$infosPizz = $pizza->infoPizz();
// récupération de la liste des ingredient
$composition = new \Aldev\Modeles\composition();
$listeCompo = $composition->listAll(["pizza" => $id]);

//calcul prix total ingrédient (et préparation du tableau de nom d'ingredient à envoyer par mail)
$prixIngredient = 0;
$nomsIngredients = [];
foreach($listeCompo as $id => $compo){
    // récupération de 'lingrédient
    $ingredient = $compo->getTarget("ingredient");
    // récupération du nom
    $prix = $ingredient->prix;
    $prixIngredient += $prix;
    $nomsIngredients[] = $ingredient->nom;
}

$prixTotal = $infosPizz["prixTaille"] + $infosPizz["prixType"] + $infosPizz["prixBase"] + $prixIngredient;

// préparation et envoi d'un mail récapitulatif
$param = ["prenom" => $utilisateurConnecte->prenom, "taille" => $infosPizz["nomTaille"], "type" => $infosPizz["nomType"], "base" => $infosPizz["nomBase"], "ingredients" => $nomsIngredients, "prix" => $prixTotal, "detailMailTo" => "$utilisateurConnecte->prenom $utilisateurConnecte->nom", "mailTo" => "$utilisateurConnecte->mail", "subject" => "Récapitulatif de ta pizza personnallisée", "appli" => "Pizz'à la carte", "from" => "alaugier@mywebecom.ovh", "reply" => "alaugier@mywebecom.ovh"];
$utilisateurConnecte->sendMail("templates/mails/finalisation_mail.php", $param);

// affichage
include "templates/pages/finalisation.php";
