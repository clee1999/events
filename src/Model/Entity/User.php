<?php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity {

    //on précise quelles sont les colonnes de la base de données qui sont modifiables : toutes sauf l'id
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    protected function _setPassword($value){
       if(strlen($value)){
           $hash = new DefaultPasswordHasher();
           return $hash->hash($value);
        }
    }

}
