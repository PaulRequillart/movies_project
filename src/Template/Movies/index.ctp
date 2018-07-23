<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Movie[]|\Cake\Collection\CollectionInterface $movies
  */
?>

<div class="col-12">

    <div class='col-12 center'>
        
        <div class='title width-80'>
            <h3 class='title-left'>Liste des films</h2>
            <?php 
                if($loggedIn){
                    if($admin){
                        echo $this->Html->link(__('Ajouter un film'), ['action' => 'add'], ['class' => 'btn btn-success button-right']); 
                    }else{
                        echo $this->Html->link(__('btn user'), '#', ['class' => 'btn btn-success button-right']); 
                    }
                }else{
                    echo $this->Html->link('action avec connexion', '#loginModal', ['data-toggle'=>'modal', 'class' => 'btn btn-success button-right'] );
                } 
            ?>
        </div>
            
        <div class='container-movies center'>
            <?php 
                $movies = $this->accueil->getAllMovies();
                foreach ($movies as $movie): ?>
                
                <div class='display-film'>
                    <?php $name = $movie->name;
                    if($movie->image != "" AND $movie->image != "t"){
                        $pictLink = "cover-movies/".$movie->image;
                    }else{
                        $pictLink = "cover.jpg";
                    }
                     ?>
                    <?=  $this->Html->link(
                        $this->Html->image($pictLink, [
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