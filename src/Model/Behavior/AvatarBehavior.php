<?php

namespace App\Model\Behavior;

use ArrayObject;
use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\ORM\Table;

class AvatarBehavior extends Table {

    //on lui indique le comportement particulier à avoir avant de faire une suppression d'un objet
    public function beforeDelete(Event $event, EntityInterface $entity, ArrayObject $options){

        if (!empty($entity->avatar) && file_exists(WWW_ROOT.'img/avatars/'.$entity->avatar)){
            unlink(WWW_ROOT.'img/avatars/'.$entity->avatar);
        }
    }
}

?>
