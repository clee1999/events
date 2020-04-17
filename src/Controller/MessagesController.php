<?php

namespace App\Controller;

class MessagesController extends AppController {

    public function index(){
        $messages = $this->Messages->find();
       $this->set('messages', $messages);
    }

    public function viewuser($id){
        //$user = $this->Users->get($id, ['contain' => ['Events']]); // ne pas oublier d'ajouter le contain events à la suite de cette ligne
        //$this->set(compact('user'));
    }

    public function new(){
        $n = $this->Messages->newEntity();

        if($this->request->is('post')){
            $n = $this->Messages->patchEntity($n, $this->request->getData());
            $u = $this->Auth->user();
            $n->user_id = $u['id'];
            if($this->Messages->save($n)){
                $this->Flash->success('Message envoyé');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Erreur, messsage non envoyé');
        }
      //  $res = $this->Messages->Users->find()->select(['id', 'pseudo'])->toArray();
     //   $users = [];
       // foreach ($res as $value) {
         //   $users[$value['id']] = $value['pseudo'];
       // }
     //   $this->set(compact('n', 'users'));
    }


}
