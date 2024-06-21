<?php

namespace Aldev\Modeles;

/*

gestion de la classe composition

Utilisation :
    define() : définition des champs de la classe -> addField($name, $type = NULL, $libelle = NULL, $link = NULL);
    suppression($id) : suppression de toute les composition dont le champ pizza est $id
    compo($idPizzElab, $idOption) : ajoute une composition dans la base de donnée
    supAll($id) : suppression de toute les composition dont le champ pizza est $id
    sup($pizza, $option) : supprime la composition correspondant aux parametre

*/

class composition extends \Aldev\Utils\_model{

    protected $table = "composition";

    protected function define(){
        // création des champs de la class
        $this->addField("pizza", "LINK", "Pizza", "pizza");
        $this->addField("ingredient", "LINK", "Inredient", "ingredient");
    }

    function compo($idPizzElab, $idOption){
        // role : ajoute une composition dans la base de donnée
        // parametre : $idPizzElab - id de la pizza concerné
        //             $idOption - id de l'option a rattaché à la pizza
        // retour : aucun

        $this->pizza = $idPizzElab;
        $this->ingredient = $idOption;
        $this->insert();
    }

    // function suppression($id){ // inutile
    function supAll($id){
        // role : suppression de toute les composition dont le champ pizza est $id
        // parametre : $id - id de la pizza en cours d'elaboration
        // retour : true false

        // construction
        $sql = "DELETE FROM `$this->table` WHERE `pizza` = :id";
        $param = [":id" => $id];

        // préparation/execution
        $this->runSql($sql, $param);

        // récupération
        // aucun

        // retour
        return true;
    }

    function sup($pizza, $option){
        // role : supprime la composition correspondant aux parametre
        // parametre : idPizzElab - id de la pizza concerné
        //             idOption - id de l'option concerné
        // retour : true / false

        // construction
        $sql = "DELETE FROM `$this->table` WHERE `pizza` = :id AND `ingredient` = :opt";
        $param = [":id" => $pizza, ":opt" => $option];

        // préparation/execution
        $this->runSql($sql, $param);

        // récupération
        // aucun

        // retour
        return true;
    }

    function compoExist($pizza, $ingredient){
        // role : récupère l'id de la composition recherché, si elle existe
        // parametre : $pizza = id de la pizza en cours
        //             $ingredient = id de l'ingredient de la compo
        // retour : l'id de la compo ou 0

        // construction
        $sql = "SELECT `id` FROM `$this->table` WHERE `pizza` = :pizza AND `ingredient` = :ingredient";
        $param = [":pizza" => $pizza, "ingredient" => $ingredient];
        // preparation/execution
        $req = $this->runSql($sql, $param);
        // récupération
        $id = $this->recoverReqSimple($req);
        // retour
        if($id != 0) return $id;
        else return 0;
    }
}