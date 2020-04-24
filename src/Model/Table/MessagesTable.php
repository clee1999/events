<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class MessagesTable extends Table {

    public function initialize(array $config)
    {
        // Permet que l'app gère toute seule les champs created et modified
        $this->addBehavior('Timestamp');
        $this->belongsTo('Sender', [
            'className' => 'Users',
            'foreignKey' => 'sender_id',
            'propertyName' => 'Sender',
        ]);
        $this->belongsTo('Receiver', [
            'className' => 'Users',
            'foreignKey' => 'receiver_id',
            'propertyName' => 'Receiver'
        ]);

    }

    public function validationDefault(Validator $v)
    {
       // $v->notEmpty('pseudo')->maxLength('pseudo',20)->notEmpty('password')->maxLength('password',150);

       // $v->allowEmpty('created')->allowEmpty('modified')->allowEmpty('avatar');

        return $v;
    }
}
