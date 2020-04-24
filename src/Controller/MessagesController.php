<?php

namespace App\Controller;

class MessagesController extends AppController {

    public function index(){
        $messages = $this->Messages->find();
        $this->set('messages', $messages);
    }

    public function viewmessages(){
        $message = $this->Messages->find();
        $this->set(compact('message'));

    }

    public function new()
    {
        $n = $this->Messages->newEntity();
        if ($this->request->is('post')) {
            $n = $this->Messages->patchEntity($n, $this->request->getData());
            $u = $this->Auth->user();
            $n->user_id = $u['id'];
            if ($this->Messages->save($n)) {
                $this->Flash->success('Message envoyé');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Erreur, messsage non envoyé');
        }

        if ($this->request->is('post')) {
            $this->request->data['Message']['sender_id'] = $this->Auth->user('id');
            if ($this->Message->save($this->request->data)) {
                $this->Session->setFlash('Message successfully sent.');
                $this->redirect(array('action' => 'outbox'));
            }
        }
    }


}
