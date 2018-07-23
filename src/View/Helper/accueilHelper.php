<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\ORM\TableRegistry;

class AccueilHelper extends Helper
{
    public function getRMovies($limit = null){
        $table = TableRegistry::get('Movies');

        $movies = $table->find('all', array('order' => 'rand()') )->limit($limit);
        
        return $movies;

    }

    public function getAllMovies($limit = null){
        $table = TableRegistry::get('Movies');

        $movies = $table->find('all',[
            'limit' => $limit
        ]);
        
        return $movies;

    }
}

?>