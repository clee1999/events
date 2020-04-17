<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class EventsTable extends Table {

    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');

      //  $this->addBehavior('Picture');

        $this->belongsTo('Users',['foreignKey' => 'user_id', 'joinType' => 'inner']);

        $this->hasMany('Guests', ['foreignKey' => 'event_id','user_id', 'dependent' => true, 'cascadeCallbacks' => true]);


    }

    public function validationDefault(Validator $v)
    {
        $v->notEmpty('title')->maxLength('title',150)->notEmpty('beginning')->notEmpty('picture');

        $v->allowEmpty('location')->allowEmpty('description');

        return $v;
    }

}
