<?php

namespace App\Controller;

class EventsController extends AppController {

    public function new()
    {
        $n = $this->Events->newEntity();
        $this->set(compact('n'));
        $ancierNom = $n->picture;
        if($this->request->is('post')){
            $n = $this->Events->patchEntity($n, $this->request->getData());
            $u = $this->Auth->user();
            $n->user_id = $u['id'];
            if (empty($this->request->getData()['picture']['name']) ||
                !in_array($this->request->getData()['picture']['type'], ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'])) {
                $this->Flash->error('erreur, pas reçu le ficher ou erreur de format');
            } else {
                $ext = pathinfo($this->request->getData()['picture']['name'], PATHINFO_EXTENSION);
                $newName = 'picture-' . $n->id . '-' . time() . '.' . $ext;
                move_uploaded_file($this->request->getData()['picture']['tmp_name'], WWW_ROOT . 'img/pictures/' . $newName);
                $n->picture = $newName;
                if ($this->Events->save($n)) {
                    $this->Flash->success('Event enregistré');

                } else {
                    $this->Flash->error('Event non enregistré');
                }
            }

        }
    }



    public function edit($id){
        // on recupere les donnee liee à l'id
        $e = $this->Events->find()->where(['id' => $id]);


        // si l'ensemble de resultat est vide, on redirige
        if($e->isEmpty()){
            $this->Flash->error('event introuvable ');
            return $this->redirect(['action' => 'index']);
        }

        //on passe le premier élément de l'ensemble dans la vue
        $firstElement = $e->first();

        $this->set('elmt', $firstElement);

        //si on a reçu le formulaire de modidif (aka si on est ne post ou put)
        if($this->request->is(['post','put'])){
            $this->Events->patchEntity($firstElement, $this->request->getData());

            if($this->Events->save($firstElement)) {
                $this->Flash->success('Modification ok');
                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error('erreur, ça n a pas fonctionné');

        }
    }



    public function view($id){
       $e = $this->Events->get($id , ['contain' => ['Users', 'Guests.Users']]);

        $this->set(compact('e'));
    }

    public function index(){
        $list = $this->Events->find()->contain(['Users'])->order(['beginning' => 'DESC']);
       $this->set(compact('list'));
    }
}
