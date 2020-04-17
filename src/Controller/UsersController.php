<?php

namespace App\Controller;

class UsersController extends AppController {

    public function index(){
        $users = $this->Users->find();
        $this->set('users', $users);
    }

    public function viewuser($id){
        $user = $this->Users->get($id, ['contain' => ['Events', 'Guests', 'Guests.Events']]); // ne pas oublier d'ajouter le contain events à la suite de cette ligne
        $this->set(compact('user'));
    }

    public function new(){
        $new = $this->Users->newEntity();
        if($this->request->is('post')){
            $new = $this->Users->patchEntity($new,$this->request->getData());
            if ($this->Users->save($new)){
                $this->Flash->success('OK, user enregistré');
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error('erreur, ça n a pas fonctionné');
        }
        $this ->set('new', $new);
    }

    public function login(){
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->Flash->success('Welcome back');
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Invalid username or password, try again');
        }
    }

    public function logout(){
        $this->Flash->success('See you later');
        return $this->redirect($this->Auth->logout());
    }

    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->Auth->allow(['logout','new']);
    }

    public function edit(){
        $u = $this->Auth->user();
        $e = $this->Users->find()->where(['id'=> $u['id']]);
        if ($e->isEmpty()){
            $this->Flash->error('Votre utilisateur n\'a pas été trouvé');
            return $this->redirect(['action' => 'new']);
        }
        $fe = $e->first();
        $this->set('e', $fe);
        if($this->request->is(['post', 'put'])){
            $this->Users->patchEntity($fe,$this->request->getData());
            if ($this->Users->save($fe)){
                $this->Flash->success('OK, votre utilisateur a été modifie');
                return $this->redirect(['action' => 'viewuser', $fe->id]);
            }
            $this->Flash->error('Erreur, ça n\'a pas fonctionné. Réessayez.');
        }
    }

    public function delete($id){
        $u = $this->Auth->user();
        $this->request->allowMethod(['delete','post']);
        $d = $this->Users->get($u['id']);
        if ($this->Users->delete($d)){
            $this->Flash->success('OK,votre compte a été supprimé');
            return $this->redirect($this->Auth->logout());
        }
        $this->Flash->error('Erreur, ça n\'a pas fonctionné. Réessayez.');
        return $this->redirect(['action' => 'viewuser', $u['id']]);

    }

    public function editavatar()
    {
        $modif = $this->Users->get($this->Auth->user('id'));
        $this->set(compact('modif'));
        $ancierNom = $modif->avatar;
        if ($this->request->is(['post', 'put'])) {
            $this->Users->patchEntity($modif, $this->request->getData());
            if (empty($this->request->getData()['avatar']['name']) ||
                !in_array($this->request->getData()['avatar']['type'], ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'])) {
                $this->Flash->error('erreur, pas reçu le ficher ou erreur de format');
            } else {
                $ext = pathinfo($this->request->getData()['avatar']['name'], PATHINFO_EXTENSION);
                $newName = 'user-' . $modif->id . '-' . time() . '.' . $ext;
                move_uploaded_file($this->request->getData()['avatar']['tmp_name'], WWW_ROOT . 'img/avatars/' . $newName);
                $modif->avatar = $newName;
                if ($this->Users->save($modif)) {
                    $this->Flash->success('img upload');

                    if (!empty($ancierNom) && file_exists(WWW_ROOT . 'img/avatars/' . $ancierNom))
                        unlink(WWW_ROOT . 'img/avatars/' . $ancierNom);

                    return $this->redirect(['action' => 'viewuser', $modif->id]);

                } else {
                    $this->Flash->error('modif impossible');
                }
            }
        }

    }
}
