<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Friendships Controller
 *
 * @property \App\Model\Table\FriendshipsTable $Friendships
 *
 * @method \App\Model\Entity\Friendship[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FriendshipsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $friendships = $this->paginate($this->Friendships);

        $this->set(compact('friendships'));
    }

    /**
     * View method
     *
     * @param string|null $id Friendship id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $friendship = $this->Friendships->get($id, [
            'contain' => []
        ]);

        $this->set('friendship', $friendship);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $friendship = $this->Friendships->newEntity();
        if ($this->request->is('post')) {
            $friendship = $this->Friendships->patchEntity($friendship, $this->request->getData());
            if ($this->Friendships->save($friendship)) {
                $this->Flash->success(__('The friendship has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The friendship could not be saved. Please, try again.'));
        }
        $this->set(compact('friendship'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Friendship id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $friendship = $this->Friendships->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $friendship = $this->Friendships->patchEntity($friendship, $this->request->getData());
            if ($this->Friendships->save($friendship)) {
                $this->Flash->success(__('The friendship has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The friendship could not be saved. Please, try again.'));
        }
        $this->set(compact('friendship'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Friendship id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $friendship = $this->Friendships->get($id);
        if ($this->Friendships->delete($friendship)) {
            $this->Flash->success(__('The friendship has been deleted.'));
        } else {
            $this->Flash->error(__('The friendship could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
