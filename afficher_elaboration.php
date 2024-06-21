<?php

// controleur : Affiche la page d'élabporation d'une pizza, crée ou charge la pizza en cours + supprime les pizza expiré
// parameres : error
//             idPizzElab
// Parametre ajouté : creation - information permettant de savoir si un compte a été créé ou non
//                    verif - info si 'lon vien de la page de verification ou non
//                    idUtilisateur - en lien avec la verif, id de l'utilisateur qui est passé par la verification de son mail

// initialisation

// use function Aldev\Utils\session_idconnected; // inutile
// use function Aldev\Utils\session_isconnected; // inutile

use Aldev\Modeles\composition;

// initialisation
include "utils/init.php";


use function Aldev\Utils\session_idconnected;
use function Aldev\Utils\session_isconnected;
$creation = isset($_GET["creation"]) ? $_GET["creation"] : 0;
$verif = isset($_GET["verif"]) ? $_GET["verif"] : 0;
$echec = isset($_GET["echec"]) ? $_GET["echec"] : 0;
$idUtilisateur = isset($_GET["idUtilisateur"]) ? $_GET["idUtilisateur"] : 0;
$renvoi = isset($_GET["renvoi"]) ? $_GET["renvoi"] : 0;
if($idUtilisateur != 0) $utilisateur = new Aldev\Modeles\utilisateur($idUtilisateur);
$inactif = isset($_GET["inactif"]) ? $_GET["inactif"] : 0;
$mailOubli = isset($_GET["mailOubli"]) ? $_GET["mailOubli"] : 0;
$majMdp = isset($_GET["majMdp"]) ? $_GET["majMdp"] : 0;
// vérification d'un utilisateur connecté, sinon redirection vers la connexion
include "utils/verif_connexion.php"; // inutile
$idUser = session_isconnected() ? session_idconnected() : 0; // inutile

// récupération
$error = isset($_GET["error"]) ? $_GET["error"] : 0;
$idPizzElab = isset($_SESSION["idPizzElab"]) ? $_SESSION["idPizzElab"] : 0;

// traitement
// si une pizza en cours d'élaboration existe je récupère l'id, sinon j'en crée une nouvelle
if($idPizzElab != 0){
    $pizza = new \Aldev\Modeles\pizza($idPizzElab);
    if($pizza->statut == "EC"){
        $pizza->majAction();
    } else{
        $pizza = new \Aldev\Modeles\pizza();
        $pizza->newpizz();
    }
} 
else {
    $pizza = new \Aldev\Modeles\pizza();
    $pizza->newpizz();
}
$pizza->nettoyage();

// construit les liste des options
$compo = new composition();

$ingredient = new \Aldev\Modeles\ingredient();
$ingredients = $ingredient->listAll();
$type = new \Aldev\Modeles\type();
$types = $type->listAll(); 
$base = new \Aldev\Modeles\base();
$bases = $base->listAll();
// récupération de l'objet taille pour le calcul du nombre d'ingredient disponible
$taille = new \Aldev\Modeles\taille($pizza->taille);
$tailles = $taille->listAll(); 


// affichage
include "templates/pages/elaboration.php";