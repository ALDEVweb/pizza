<?php 

namespace Aldev\Utils;

/* code d'initialisation à insérer en début de chaque contrôleur */

// gestion et affichage des erreurs
ini_set("display_errors", 1);       // Aficher les erreurs
error_reporting(E_ALL);             // Toutes les erreurs

include "utils/field.php";
include "utils/model.php";
include "utils/user.php";
include "Modeles/option.php";

// ouverture de la base de donnée
$bdd = _model::bdd();

// propriété de debug
$bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);

// chargement des librairies

include "Modeles/taille.php";
include "Modeles/type.php";
include "Modeles/base.php";
include "Modeles/pizza.php";
include "Modeles/ingredient.php";
include "Modeles/composition.php";
include "Modeles/utilisateur.php";
include "utils/session.php";


// activation du mécanisme de session
session_activation();



