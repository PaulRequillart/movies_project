<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Movies Controller
 *
 * @property \App\Model\Table\MoviesTable $Movies
 *
 * @method \App\Model\Entity\Movie[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MoviesController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'view']);
    }
    /**
     * Index method
     * 
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Countries', 'Categories']
        ];
        $movies = $this->paginate($this->Movies);

        $this->set(compact('movies'));
    }

    /**
     * View method
     *
     * @param string|null $id Movie id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $movie = $this->Movies->get($id, [
            'contain' => ['Countries', 'Categories', 'Likes', 'Recommendations', 'Scores', 'ToWatchMovies', 'ViewMovies']
        ]);

        $this->set('movie', $movie);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $movie = $this->Movies->newEntity();
        if ($this->request->is('post')) {
            $movie = $this->Movies->patchEntity($movie, $this->request->getData());
            if ($this->Movies->save($movie)) {
                $this->Flash->success(__('The movie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movie could not be saved. Please, try again.'));
        }
        $countries = $this->Movies->Countries->find('list', ['limit' => 200]);
        $categories = $this->Movies->Categories->find('list', ['limit' => 200]);
        $this->set(compact('movie', 'countries', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Movie id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $movie = $this->Movies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $movie = $this->Movies->patchEntity($movie, $this->request->getData());
            if ($this->Movies->save($movie)) {
                $this->Flash->success(__('The movie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movie could not be saved. Please, try again.'));
        }
        $countries = $this->Movies->Countries->find('list', ['limit' => 200]);
        $categories = $this->Movies->Categories->find('list', ['limit' => 200]);
        $this->set(compact('movie', 'countries', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Movie id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $movie = $this->Movies->get($id);
        if ($this->Movies->delete($movie)) {
            $this->Flash->success(__('The movie has been deleted.'));
        } else {
            $this->Flash->error(__('The movie could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    
}
