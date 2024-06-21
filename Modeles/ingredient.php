<?php

namespace Aldev\Modeles;

/*

gestion de la classe ingredient
    
*/

class ingredient extends option{
    
    protected $table = "ingredient";

    protected function define(){
        parent::define();
        $this->addField("categorie");
    }
}