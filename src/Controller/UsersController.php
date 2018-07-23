<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Routing\Router;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'logout', 'forgotPassword', 'reset']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Likes', 'Recommendations', 'Scores', 'ToWatchMovies', 'ViewMovies']
        ]);

        $this->set('user', $user);
    }

    public function monProfil(){
        $id = $this->Auth->user('id');
        $user = $this->Users->get($id);
        $this->set('user', $user);
    
        if (isset($this->request->data['btn1'])) {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $userEmail = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Adresse email enregistrée.'));

                    return $this->redirect(['controller'=>'Users','action' => 'monProfil']);
                }
                $this->Flash->error(__('Erreur, veuillez réessayer.'));
            }
        }

        //Partie editPassword

        if (isset($this->request->data['btn2'])) {
            if (!empty($this->request->data)) {
                $user = $this->Users->patchEntity($user, [
                        'old_password'  => $this->request->data['old_password'],
                        'password'      => $this->request->data['password1'],
                        'password1'     => $this->request->data['password1'],
                        'password2'     => $this->request->data['password2']
                    ],
                    ['validate' => 'password']
                );
                if ($this->Users->save($user)) {
                    $this->Flash->success('The password is successfully changed');
                    return $this->redirect(['controller'=>'Users','action' => 'monProfil']);
                } else {
                    $this->Flash->error('Verifiez les champs');
                }
            }
        }
    }



    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->Flash->success('Vous êtes maintenant connecté.');
                /*['controller' => 'Users','action' => 'view', $this->Auth->User('id')]*/
            }else{
                $this->Flash->error(__('Nom d\'utilisateur ou mot de passe incorrecte'));
            }
        }
        return $this->redirect($this->referer());
    }

    public function logout()
    {
        $this->Flash->success('Vous êtes maintenant déconnecté.');
        return $this->redirect($this->Auth->logout());
    }

    public function forgotPassword(){
        if($this->request->is('post')){
            $query = $this->Users->findByEmail($this->request->data['email']);
            $user = $query->first();
            if(is_null($user)){
                $this->Flash->error('Aucun utilisateur trouvé, veuiller vérifier l\'adresse mail');
            }else{
                $passkey = uniqid();
                $url = Router::Url(['controller'=>'users', 'action'=>'reset-password'], true) . '/' . $passkey;
                $timeout = time() + HOUR;
                if($this->Users->updateAll(['passkey'=> $passkey, 'timeout'=> $timeout], ['id'=>$user->id])){
                    $this->sendResetEmail($url, $user);
                    $this->redirect(['controller'=>'Pages', 'action'=>'display']);
                }else{
                    $this->Flash->error('Erreur, temps dépassé.');
                }
            }
        }
    }

    public function sendResetEmail($url, $user){
        $email = new Email();
        $email->template('resetpw');
        $email->emailFormat('both');
        $email->from('univinfo.sio@gmail.com');
        $email->to($user->email, $user->username);
        $email->subject('Project Movies - Reset your password');
        $email->viewVars(['url' => $url, 'username' => $user->username]);
        if($email->send()){
            $this->Flash->success('Un email pour réinitialiser votre mot de passe a été envoyé');
        }else{
            $this->Flash->error('Erreur lors de l\'envoie de l\'email, veuillez réessayer :' . $email->smtpError);
        }
    }

    public function reset($passkey = null){
        if($passkey){
            $query = $this->Users->find('all', ['conditions'=>['passkey'=>$passkey, 'timeout >' => time()]]);
            $user = $query->first();
            if($user){
                if(!empty($this->request->data)){
                    $this->request->data['passkey'] = null;
                    $this->request->data['timeout'] = null;
                    $user = $this->Users->patchEntity($user, $this->request->data);
                    if($this->Users->save($user)){
                        $this->Flash->success('Nouveau mot de passe enregistré');
                        $this->redirect(['controller'=>'Pages', 'action'=>'display']);

                    }else{
                        $this->Flash->error('Impossible d\'enregistrer le nouveau mot de passe');
                    }
                }
            }else{
                $this->Flash->error('Url invalide ou expiré, vérifiez votre email ou réessayez ultérieurement.');
                $this->redirect(['action'=>'forgotPassword']);
            }
            unset($user->password);
            $this->set(compact('user'));
        }else{
            $this->redirect('/');
        }
    }
}
