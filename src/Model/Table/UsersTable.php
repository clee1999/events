<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table {

    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');

     //   $this->addBehavior('Avatar');

        $this->hasMany('Events', ['foreignKey' => 'user_id', 'dependent' => true, 'cascadeCallbacks' => true]);

        $this->hasMany('Guests', ['foreignKey' => 'user_id', 'dependent' => true, 'cascadeCallbacks' => true]);
        $this->hasMany('Messages');


    }

    public function validationDefault(Validator $v)
    {
        $v->notEmpty('pseudo')->maxLength('pseudo',20)->notEmpty('password')->maxLength('password',150);

        $v->allowEmpty('created')->allowEmpty('modified')->allowEmpty('avatar');

        return $v;
    }
}
