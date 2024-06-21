<?php

// controleur de générations d'un hash directement via un echo sur page vierge. a toute fin de le rentrer dans la bdd

include "utils/init.php";


$mdp = "Antoine123";
$hash = password_hash($mdp, PASSWORD_DEFAULT);
echo"$hash";