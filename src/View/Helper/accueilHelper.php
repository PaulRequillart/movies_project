<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\ORM\TableRegistry;

class AccueilHelper extends Helper
{
    public function getRMovies(){
        $table = TableRegistry::get('Movies');

        $movies = $table->find('all', array('order' => 'rand()') )->limit(21);
        
        return $movies;

    }

    public function getAllMovies(){
        $table = TableRegistry::get('Movies');

        $movies = $table->find('all');
        
        return $movies;

    }
}

?>