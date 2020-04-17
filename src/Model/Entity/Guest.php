<?php
namespace App\Model\Entity;
use Cake\ORM\Entity;

class Guest extends Entity {

    //on précise quelles sont les colonnes de la base de données qui sont modifiables : toutes sauf l'id
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

}
