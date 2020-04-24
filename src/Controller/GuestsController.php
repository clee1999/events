<?php

namespace App\Controller;

class GuestsController extends AppController {

    public function invite(){
        $u = $this->Auth->user();
        $guest = $this->Guests->newEntity();
        if ($this->request->is('post')) {
            $guest = $this->Guests->patchEntity($guest, $this->request->getData());
            $doublon = $this->Guests->find()->select(['id'])->where(['user_id'=> $guest->user_id, 'event_id' => $guest->event_id])->toArray();
            if(count($doublon) > 0){
                $this->Flash->error(__('Cet utilisateur a été déjà invité'));
                return $this->redirect(['action' => 'invite']);
            } else {
                if ($this->Guests->save($guest)) {
                    $this->Flash->success(__('The guest has been saved.'));
                    return $this->redirect(['action' => 'invite']);
                }
                $this->Flash->error(__('The guest could not be saved. Please, try again.'));
            }


        }
        // for user pseudo
        $res = $this->Guests->Users->find()->select(['id', 'pseudo'])->where(['id !=' => $u['id']])->toArray();
        $users = [];
        foreach ($res as $value) {
            $users[$value['id']] = $value['pseudo'];
        }
        // for event
        $ress = $this->Guests->Events->find()->select(['id', 'title'])->where(['user_id =' => $u['id']])->toArray();
        $events = [];
        foreach ($ress as $value) {
            $events[$value['id']] = $value['title'];
        }
        $this->set(compact('guest', 'events', 'users'))

        ;


    }


}

