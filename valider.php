<?php

// controleur ajax : vérifie que la pizza est éligible et redirige vers l'url de finalisation
// parametres : aucun

// initialisation 

// use function Aldev\Utils\session_idconnected; //inutile
// use function Aldev\Utils\session_isconnected; // inutile

use Aldev\Modeles\composition;
use Aldev\Modeles\taille;

include "utils/init.php";

// vérification d'un utilisateur connecté, sinon redirection vers la connexion
use function Aldev\Utils\session_idconnected;
use function Aldev\Utils\session_isconnected;
include "utils/verif_connexion.php"; // inutile
$idUser = session_isconnected() ? session_idconnected() : 0; // inutile

// récupération
// $idUser = session_isconnected() ? session_idconnected() : 0; // inutile
$idPizzElab = isset($_SESSION["idPizzElab"]) ? $_SESSION["idPizzElab"] : 0;

// vérifie qu'il y a une base, une taille et un type sélectionné ainsi que 3 ingrédients minimum, puis redirige si ok sinon demande d'ajouter ce qu'il manque
// charge la pizza
$pizza = new Aldev\Modeles\pizza($idPizzElab);
// récupère la liste des commposition
$compo = new composition();
$listeCompo = $compo->listAll(["pizza" => $idPizzElab]);
$taille = new taille($pizza->taille);

// redirection
if(!is_null($pizza->taille) && !is_null($pizza->type) && !is_null($pizza->base) && count($listeCompo) >= $taille->mini && count($listeCompo) <= $taille->maxi){
    $pizza->statut = "FIN";
    $pizza->update();
    header("Location: finaliser_commande.php?id=$idPizzElab");
}
else header("Location: afficher_elaboration.php?error=1");
