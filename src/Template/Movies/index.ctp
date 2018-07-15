<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Movie[]|\Cake\Collection\CollectionInterface $movies
  */
?>

<div class="col-12">

    <?php if($this->request->session()->check('Auth.User')){
        echo $this->Html->link(__('New movies'), ['action' => 'add']);
    }else{
        echo $this->Html->link('New movies', '#loginModal', ['data-toggle'=>'modal'] );
    }
    ?>


    <div class='col-12 center'>
        
        <div class='title no-center'>
            <h3 class=''>Liste des films</h2>
        </div>
            
        <div class='container-movies center'>
            <?php 
                $movies = $this->accueil->getAllMovies();
                foreach ($movies as $movie): ?>
                
                <div class='display-film'>
                    <?php $name = $movie->name; ?>
                    <?=  $this->Html->link(
                        $this->Html->image("cover.jpg", [
                            'alt' => 'Movie cover',
                            'class' => 'imgMovie'
                        ]).'<span class="spanMovie">'.$name.'</span>',
                        ['controller' => 'Movies', 'action' => 'view', $movie->id],
                        array('escape' => false)
                    ); ?>
                </div>
            <?php 
                endforeach; 
            ?>
        </div>
    </div>
    

</div>