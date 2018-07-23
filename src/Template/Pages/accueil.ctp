<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        
        <title>
            <?= $cakeDescription ?>
        </title>

        <?= $this->Html->meta('icon') ?>
        <?= $this->Html->css('base.css') ?>
        <?= $this->Html->css('cake.css') ?>

        <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
    </head>
    <body>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner center">
                <div class="carousel-item active">
                    <?= $this->Html->image('default.jpg', [
                        'alt' => 'First slide',
                        'class' => 'd-block center',
                    ])
                    ?>
                </div>
                <div class="carousel-item">
                    <?= $this->Html->image('default.jpg', [
                        'alt' => 'Second slide',
                        'class' => 'd-block '
                    ])
                    ?>
                </div>
                <div class="carousel-item">
                    <?= $this->Html->image('default.jpg', [
                        'alt' => 'Third slide',
                        'class' => 'd-block '
                    ])
                    ?>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        
        <div class="col-12 center">
            <div class='title width-80'>
                <h3 class='title-left'>Quelques films :</h2>
            </div>
            <div class='container-movies center'>
                <?php 
                    $movies = $this->accueil->getRMovies(14);
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

    </body>

</html>
