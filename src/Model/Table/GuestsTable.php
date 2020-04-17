<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class GuestsTable extends Table {

    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');

        $this->belongsTo('Events',['foreignKey' => 'event_id', 'joinType' => 'inner']);
        $this->belongsTo('Users',['foreignKey' => 'user_id', 'joinType' => 'inner']);

    }

    public function validationDefault(Validator $v)
    {
        $v->notEmpty('user_id')->notEmpty('event_id');


        return $v;
    }



}
