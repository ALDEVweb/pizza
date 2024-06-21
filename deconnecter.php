<?php

// controleur : deconnecte l'utilisateur (à développer pour la bonne réalisation des test)
// parametre : aucun

// intitialisation

use function Aldev\Utils\session_deconnect;

include "utils/init.php";

// récupération
// aucun

// traitement
session_deconnect();

// affichage
header("Location: afficher_elaboration.php");