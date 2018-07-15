<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Recommendations Controller
 *
 * @property \App\Model\Table\RecommendationsTable $Recommendations
 *
 * @method \App\Model\Entity\Recommendation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RecommendationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Movies']
        ];
        $recommendations = $this->paginate($this->Recommendations);

        $this->set(compact('recommendations'));
    }

    /**
     * View method
     *
     * @param string|null $id Recommendation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recommendation = $this->Recommendations->get($id, [
            'contain' => ['Users', 'Movies']
        ]);

        $this->set('recommendation', $recommendation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recommendation = $this->Recommendations->newEntity();
        if ($this->request->is('post')) {
            $recommendation = $this->Recommendations->patchEntity($recommendation, $this->request->getData());
            if ($this->Recommendations->save($recommendation)) {
                $this->Flash->success(__('The recommendation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recommendation could not be saved. Please, try again.'));
        }
        $users = $this->Recommendations->Users->find('list', ['limit' => 200]);
        $movies = $this->Recommendations->Movies->find('list', ['limit' => 200]);
        $this->set(compact('recommendation', 'users', 'movies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Recommendation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recommendation = $this->Recommendations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recommendation = $this->Recommendations->patchEntity($recommendation, $this->request->getData());
            if ($this->Recommendations->save($recommendation)) {
                $this->Flash->success(__('The recommendation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recommendation could not be saved. Please, try again.'));
        }
        $users = $this->Recommendations->Users->find('list', ['limit' => 200]);
        $movies = $this->Recommendations->Movies->find('list', ['limit' => 200]);
        $this->set(compact('recommendation', 'users', 'movies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Recommendation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recommendation = $this->Recommendations->get($id);
        if ($this->Recommendations->delete($recommendation)) {
            $this->Flash->success(__('The recommendation has been deleted.'));
        } else {
            $this->Flash->error(__('The recommendation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
