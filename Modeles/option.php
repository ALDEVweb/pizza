<?php

namespace Aldev\Modeles;

/*

Modeles de gestion généralisé de la classe option etendu de la classe modèle (à étendre aux différentes classes)

Utilisation :
    define() : définition des champs de la classe -> addField($name, $type = NULL, $libelle = NULL, $link = NULL);

*/  
    
class option extends \Aldev\Utils\_model{

    protected function define(){
        // création des champs de la class
        // $this->addField("categorie"); inutile
        $this->addField("nom");
        $this->addField("description");
        $this->addField("prix");
        $this->addField("photo");
    }

}