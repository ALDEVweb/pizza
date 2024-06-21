<?php

namespace Aldev\Modeles;

/*

gestion de la classe taille
  
*/

class taille extends option{
    
    protected $table = "taille";

    protected function define(){
        parent::define();
        $this->addField("mini");
        $this->addField("maxi");
    }
}