<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ToWatchMovies Controller
 *
 * @property \App\Model\Table\ToWatchMoviesTable $ToWatchMovies
 *
 * @method \App\Model\Entity\ToWatchMovie[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ToWatchMoviesController extends AppController
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
        $toWatchMovies = $this->paginate($this->ToWatchMovies);

        $this->set(compact('toWatchMovies'));
    }

    /**
     * View method
     *
     * @param string|null $id To Watch Movie id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $toWatchMovie = $this->ToWatchMovies->get($id, [
            'contain' => ['Users', 'Movies']
        ]);

        $this->set('toWatchMovie', $toWatchMovie);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $toWatchMovie = $this->ToWatchMovies->newEntity();
        if ($this->request->is('post')) {
            $toWatchMovie = $this->ToWatchMovies->patchEntity($toWatchMovie, $this->request->getData());
            if ($this->ToWatchMovies->save($toWatchMovie)) {
                $this->Flash->success(__('The to watch movie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The to watch movie could not be saved. Please, try again.'));
        }
        $users = $this->ToWatchMovies->Users->find('list', ['limit' => 200]);
        $movies = $this->ToWatchMovies->Movies->find('list', ['limit' => 200]);
        $this->set(compact('toWatchMovie', 'users', 'movies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id To Watch Movie id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $toWatchMovie = $this->ToWatchMovies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $toWatchMovie = $this->ToWatchMovies->patchEntity($toWatchMovie, $this->request->getData());
            if ($this->ToWatchMovies->save($toWatchMovie)) {
                $this->Flash->success(__('The to watch movie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The to watch movie could not be saved. Please, try again.'));
        }
        $users = $this->ToWatchMovies->Users->find('list', ['limit' => 200]);
        $movies = $this->ToWatchMovies->Movies->find('list', ['limit' => 200]);
        $this->set(compact('toWatchMovie', 'users', 'movies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id To Watch Movie id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $toWatchMovie = $this->ToWatchMovies->get($id);
        if ($this->ToWatchMovies->delete($toWatchMovie)) {
            $this->Flash->success(__('The to watch movie has been deleted.'));
        } else {
            $this->Flash->error(__('The to watch movie could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
