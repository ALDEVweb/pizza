<?php 

// controleur : renvoi un nouveau token, si la vérification a echoué (a cause d'un échec)
// parametre : idUtilisateur

// initialisation
include "utils/init.php";

// récupération
$mail = isset($_POST["mailOubli"]) ? $_POST["mailOubli"] : "";

// traitement
$utilisateur = new \Aldev\Modeles\utilisateur();

$idUtilisateur = $utilisateur->utilisateurExist("mail", $mail);

if($idUtilisateur == 0){
    header("Location: afficher_elaboration.php?mailOubli=1");
    exit;
}

// maj statut, token, validite et update
$utilisateur->statut = 0;
$token = $utilisateur->genToken();
$time = \time();
$utilisateur->token = $token;
$utilisateur->validite = $time;
$utilisateur->update();

// construction parametre et envoi du mail
$param = ["prenom" => $utilisateur->prenom, "token" => $token, "detailMailTo" => "$utilisateur->prenom $utilisateur->nom", "mailTo" => $utilisateur->prenom, "subject" => "Crée un nouveau mot de passe pour Pizz'@ la carte", "appli" => "Pizz'@ la carte", "from" => "alaugier@mywebecom.ovh", "reply" => "alaugier@mywebecom.ovh"];
$utilisateur->sendMail("templates/mails/oubli_mail.php", $param);

// affichage
header("Location: afficher_elaboration.php?renvoi=1&idUtilisateur=$idUtilisateur");