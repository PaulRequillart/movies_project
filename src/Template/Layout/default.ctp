<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Movies Project';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies Project</title>
    <?= $this->Html->meta('icon') ?>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('home.css') ?>
    <?= $this->Html->css('style1.css') ?>

    <?= $this->Html->script('account.js') ?>
    

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark" data-topbar role="navigation">
            <?= $this->Html->link($this->Html->image('movieLogo.png', array('width' => '30', 'height' => '30')). ' MovieProject', ['controller'=>'Pages', 'action'=>'display'], array("class"=>"navbar-brand", 'escape' => false));?>
        
            <ul class="nav navbar-nav">
            
                <li class="nav-item"> <?= $this->Html->link('Movies',['controller' => 'Movies', 'action'=>'index'], ["class"=>"nav-link hvr-underline-reveal"]) ?></li>
                <li class="nav-item"> <?= $this->Html->link('Categories','#' /* ['controller'=>'Modules', 'action'=>'index'] */ ,["class"=>"nav-link hvr-underline-reveal"]) ?> </li>

            <!-- MENU ADMIN -->

            <?php
                if($loggedIn){
                    if($admin){
                        //menu admin
                    } elseif(!$admin){ 
                        //menu user
                    }    
            ?>
            </ul>

            <ul class="navbar-nav ml-auto">        
                <li class="nav-item dropdown">
                <?= $this->Html->link($this->Html->image('user-logo.png', array('width' => '30', 'height' => '30')). ' ' .ucfirst($this->request->session()->read('Auth.User.username').'  '), '#', array('class'=>'nav-link dropdown-toggle', 'data-toggle'=>'dropdown',  'escape' => false));?>
                
                    <div class="dropdown-menu">
                        <span class='span-dropdown-item'><?= $this->Html->link('Mon compte',['controller'=>'Users', 'action'=>'monProfil'], ["class"=>"dropdown-item a-param"])?></span>
                        <span class='span-dropdown-item'><?= $this->Html->link('Deconnexion',['controller'=>'Users', 'action'=>'logout'], ["class"=>"dropdown-item a-logout"])?></span>
                    </div>
                </li>
            </ul>

                <?php }else{ ?>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><?= $this->Html->link('Connexion', '#loginModal', ["class"=>"nav-link", 'data-toggle'=>'modal'] ) ?></li>
                    <?php } ?>
            </ul>
        
    </nav>

     <!-- Modal -->
     <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <h3 class="center">Connexion</h3>
                        <?= $this->Form->create('Users', array(
                            'url' => ['controller'=>'Users', 'action' => 'login'],
                            'class'=> ''
                        )); ?>
                        <fieldset>
                            <?= $this->Form->input('username', ['label' => 'Nom d\'utilisateur']) ?>
                            <?= $this->Form->input('password', ['label' => 'Mot de passe']) ?>

                            <div class="checkbox-remember">
                                <div class="input checkbox">
                                    <input type="hidden" name="remember_me" value="0">
                                    <input type="checkbox" name="remember_me" value="0" id="remember_me" class="checkbox" checked="checked">
                                </div>                            
                                <label for="remember_me">
                                <span class="ui"></span>Se souvenir de moi</label>
                            </div>

                        </fieldset>
                        
                        <?= $this->Form->button('Connexion', ['class' => 'btn btn-dark']) ?>
                        <?= $this->Form->end() ?>
                        <?= $this->Html->link('Mot de passe oublié', ['controller'=>'Users', 'action'=>'forgotPassword'], ['class' => 'center']) ?>
                        
                        <div class='center'>
                            <hr>
                            <p>Pas encore membre ? N'hesitez plus !</p>
                            
                            <?= $this->Html->link('Inscription', ['controller'=>'Users', 'action'=>'add'], ["class"=>"btn btn-dark btna"] ) ?>
                        
                        </div>
                        <br>
                </div>
            </div>
        </div>
       

    <?= $this->Flash->render() ?>
    <div class="">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
