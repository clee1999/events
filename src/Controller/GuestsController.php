<?php

namespace App\Controller;

class GuestsController extends AppController {

    public function invite(){
        $guest = $this->Guests->newEntity();
        if ($this->request->is('post')) {
            $guest = $this->Guests->patchEntity($guest, $this->request->getData());
            if ($this->Guests->save($guest)) {
                $this->Flash->success(__('The guest has been saved.'));
                return $this->redirect(['action' => 'invite', $id]);
            }
            $this->Flash->error(__('The guest could not be saved. Please, try again.'));
        }
        // for user pseudo
        $res = $this->Guests->Users->find()->select(['id', 'pseudo'])->toArray();
        $users = [];
        foreach ($res as $value) {
            $users[$value['id']] = $value['pseudo'];
        }
        // for event
        $ress = $this->Guests->Events->find()->select(['id', 'title'])->toArray();
        $events = [];
        foreach ($ress as $value) {
            $events[$value['id']] = $value['title'];
        }
        $this->set(compact('guest', 'events', 'users'));
    }


}

