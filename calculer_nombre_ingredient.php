<?php

// controleur ajax : retourne le nombre de composition de la pizza et son nombre maxi
// parametre : $idPizzElab : id de la pizza en cours

// initialisation

use Aldev\Modeles\composition;
use Aldev\Modeles\pizza;
use Aldev\Modeles\taille;

include "utils/init.php";

use function Aldev\Utils\session_idconnected;
use function Aldev\Utils\session_isconnected;
include "utils/verif_connexion.php"; // inutile
$idUser = session_isconnected() ? session_idconnected() : 0; // inutile


// récupération
$idPizzElab = isset($_SESSION["idPizzElab"]) ? $_SESSION["idPizzElab"] : 0;

// traitement
// nombre compo
$compo = new composition();
$liste = $compo->listAll(["pizza" => $idPizzElab]);
$nbr = count($liste);
// nombre maxi
$pizza = new pizza($idPizzElab);
$taillePizza = $pizza->taille;
$taille = new taille($taillePizza);
$maxi = $taille->maxi;

// retour
echo json_encode(["nombre" => $nbr, "maxi" => $maxi]);