<?php

namespace Aldev\Modeles;

/*

gestion de la classe composition

Utilisation :
    define() : définition des champs de la classe -> addField($name, $type = NULL, $libelle = NULL, $link = NULL);
    newPizz() : crée une pizza dans la bdd, la ratache à l'utilisateur et lui fixe le statut EC
    pizzInit() : initialise la pizza en cours
    nettoyage() : supprime toute les pizza ec expirée de la base de donnée
    majTime() : maj le time de la pizza en cours
    majAction() : maj la date de la pizza

    Inutiles :
    idElaboration($id) : retourne l'id une pizza en cours d'elaboration, (existante ou  nouvelle)
        pizzExist($id) : recherche dans la bdd si l'utilisateur à une pizza en cours
        newPizz($id) : crée une pizza dans la bdd, la ratache à l'utilisateur et lui fixe le statut EC
    
*/

class pizza extends \Aldev\Utils\_model{

    protected $table = "pizza";

    protected function define(){
        // création des champs de la class
        // $this->addField("utilisateur", $type = "LINK", $libelle = "Utilisateur", $link = "utilisateur"); // inutiles
        $this->addField("utilisateur", "LINK", "Utilisateur", "utilisateur");
        $this->addField("statut");
        $this->addField("taille", "LINK", "Taille", "taille");
        $this->addField("type", "LINK", "Type", "type");
        $this->addField("base", "LINK", "base", "base");
        $this->addField("time");


    }

/* inutile
    function idElaboration($id){
        // role : retourne l'id une pizza en cours d'elaboration, (existante ou  nouvelle)
        // parametre : $id - id de l'utilisateur connecté
        // retour : $idPizza - l'id de la pizza en elaboration

        // je vérifie qu'une pizza en cours existe et retourne son id
        if($this->pizzExist() != 0) return $this->pizzExist();
        // sinon j'en crée une nouvelle et retourne  son id
        else return $this->newPizz($id);
    }

    function pizzExist($id){
        // role : recherche dans la bdd si l'utilisateur à une pizza en cours
        // parametre : id de l'utilisateur connecté
        // retour : idPizz - id de la pizza en cours

        //construction
        $sql = "SELECT `id` FROM `$this->table` WHERE `utilisateur` = :id AND `statut` = 'EC'";
        $param = [":id" => $id];
        // preparation/execution
        $req = $this->runSql($sql, $param);
        // récupération/ retour
        if ($this->recoverReqSimple($req)) return $this->id();
        else return 0;
    }
*/
    // function newPizz($id){ // inutile
    function newPizz(){
        // role : crée une pizza dans la bdd, la ratache à l'utilisateur et lui fixe le statut EC
        // parametre : id de l'utilisateur connecté
        // retour : idPizz - id de la pizza en cours
      
        // chargement de l'utilisateur
        // $this->set("utilisateur", $id); // inutile
        // chargement du statut
        $this->statut = "EC";
        // chargement du time
        $this->majTime();
        // insertion dans la bdd
        $this->insert();
        $_SESSION["idPizzElab"] = $this->id();
        // retour de l'id
        return $this->id();
    }

    function pizzInit(){
        // role : initialise la pizza en cours
        // parametre : aucun
        // retour : aucun

        $this->taille = NULL;
        $this->type = NULL;
        $this->base = NULL;
        $this->majTime();
        $this->update();

        // instanciation d'un objet composition vierge
        $compo = new composition();
        // suppression des composition relatif à la pizza
        $compo->supAll($this->id);
    }

    function nettoyage(){
        // role : supprime toute les pizza ec expirée de la base de donnée
        // parametre : aucun
        // retour : aucun

        $timeActu = \time();
        $timeExpir = 3600;
        // récupère la liste de toutes les pizza expiré
        $liste = $this->listAll(["statut" => "EC"]);
        if(!empty($liste)){
            foreach($liste as $idPizza => $pizza){
                // pour chaque pizza concerné, si le time est inferieur a 1h, supprime leur composition
                if($pizza->time < ($timeActu - $timeExpir)){
                    $compo = new composition();
                    $compo->supAll($idPizza);
                    // supprime la pizza
                    $pizza->delete();
                }
            }
        }
    }

    function majTime(){
        // role : maj le time de la pizza en cours
        // parametre : id de la pizza en cours
        // retour : aucun

        // maj de la pizza avec le time
        $time = \time();
        $this->time = $time;
    }

    function majAction(){
        // role : maj la date de la pizza
        // parametre : aucun
        // retour : aucun

        $this->majTime();
        $this->update();
    }

    function infoPizz(){
        // role : renvoie les informations de la pizza
        // parametre : aucun
        // retour : les informations de la pizza dans un tableau indexé par le nom du champ

        $taille = $this->getTarget("taille");
        $nomTaille = $taille->nom;
        $prixTaille = $taille->prix;
        $photoTaille = $taille->photo;
        $type = $this->getTarget("type");
        $nomType = $type->nom;
        $prixType = $type->prix;
        $photoType = $type->photo;
        $base = $this->getTarget("base");
        $nomBase = $base->nom;
        $prixBase = $base->prix;
        $photoBase = $base->photo;

        return ["nomTaille" => $nomTaille, "prixTaille" => $prixTaille, "photoTaille" => $photoTaille, "nomType" => $nomType, "prixType" => $prixType, "photoType" => $photoType, "nomBase" => $nomBase, "prixBase" => $prixBase, "photoBase" => $photoBase];
    }
}