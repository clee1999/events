<?php

namespace App\Controller;

class MessagesController extends AppController {

    public function index(){
        $messages = $this->Messages->find()->contain(['Sender', 'Receiver'])->where(['Messages.sender_id' => $this->Auth->user('id')])
            ->order(['Messages.created' => 'DESC']);
        $this->set('messages', $messages);
    }



    public function viewmessages(){
       $message = $this->Messages->find()->contain(['Sender', 'Receiver'])->where(['Messages.receiver_id' => $this->Auth->user('id')])
           ->orwhere(['Messages.sender_id' => $this->Auth->user('id')])
         ->order(['Messages.created' => 'ASC']);
       $this->set('message', $message);

        //display sender's message
        $sender = $this->Messages->Sender->find()
            ->order(['Sender.created' => 'ASC']);
        $this->set('sender', $sender);
        //display reveiver's message
        $receiver = $this->Messages->Receiver->find()->order(['receiver.created' => 'ASC']);
        $this->set('reveiver', $receiver);

    }

    public function new($c_id){
        if($this->request->is('post')){
            //on créer une entité vide
            $new = $this->Messages->newEntity();
            $new = $this->Messages->patchEntity($new,$this->request->getData());

            //on rajoute l'id du message (qui n'était pas contenu dans le formulaire)
            $new->sender_id = $c_id;

            //on essaie de sauvegarder
            if ($this->Messages->save($new)){
                //on cree un message de succes
                $this->Flash->success('Message envoyé');
            } else
                $this->Flash->error('erreur, ça n a pas fonctionné');

        }else
        return $this->redirect(['controller' =>'Messages',  'action' => 'viewmessages', $c_id]);

    }


}
