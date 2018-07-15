<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ViewMovies Controller
 *
 * @property \App\Model\Table\ViewMoviesTable $ViewMovies
 *
 * @method \App\Model\Entity\ViewMovie[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ViewMoviesController extends AppController
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
        $viewMovies = $this->paginate($this->ViewMovies);

        $this->set(compact('viewMovies'));
    }

    /**
     * View method
     *
     * @param string|null $id View Movie id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $viewMovie = $this->ViewMovies->get($id, [
            'contain' => ['Users', 'Movies']
        ]);

        $this->set('viewMovie', $viewMovie);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $viewMovie = $this->ViewMovies->newEntity();
        if ($this->request->is('post')) {
            $viewMovie = $this->ViewMovies->patchEntity($viewMovie, $this->request->getData());
            if ($this->ViewMovies->save($viewMovie)) {
                $this->Flash->success(__('The view movie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The view movie could not be saved. Please, try again.'));
        }
        $users = $this->ViewMovies->Users->find('list', ['limit' => 200]);
        $movies = $this->ViewMovies->Movies->find('list', ['limit' => 200]);
        $this->set(compact('viewMovie', 'users', 'movies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id View Movie id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $viewMovie = $this->ViewMovies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $viewMovie = $this->ViewMovies->patchEntity($viewMovie, $this->request->getData());
            if ($this->ViewMovies->save($viewMovie)) {
                $this->Flash->success(__('The view movie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The view movie could not be saved. Please, try again.'));
        }
        $users = $this->ViewMovies->Users->find('list', ['limit' => 200]);
        $movies = $this->ViewMovies->Movies->find('list', ['limit' => 200]);
        $this->set(compact('viewMovie', 'users', 'movies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id View Movie id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $viewMovie = $this->ViewMovies->get($id);
        if ($this->ViewMovies->delete($viewMovie)) {
            $this->Flash->success(__('The view movie has been deleted.'));
        } else {
            $this->Flash->error(__('The view movie could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
