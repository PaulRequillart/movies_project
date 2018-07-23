<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="col-12 profile-container">
    <div class="title">
        <h4 class='title-left'>Gestion de votre profil :</h4>
    </div>

    <div class="profile-content">
        
        <div class="infos-content">
            
                <h4 class="center h4-white" >Informations personnelles</h4>
                <hr>
            <div class="p-15">
                <p>Bienvenue <span><?= h($user->prenom).' '.h($user->nom); ?></span></p>
                <p>Nom d'utilisateur : <span><?= h($user->username) ?></span></p>
                <p>Adresse email : <span><?= h($user->email) ?></span></p>
                <p>Création du compte le : <span><?= date_format($user->created, 'd/m/Y') ?> à <?=date_format($user->created, 'H:i:s')?></span></p>
                <p>Dernière modification du compte le : <span><?= date_format($user->modified, 'd/m/Y') ?> à <?=date_format($user->modified, 'H:i:s')?></span></p>
            
            </div>
        </div>

        <div class="form-content center">
            <h4 class="center h4-white">Modifier vos informations personnelles</h4>
            <hr>
            <div>
                <a class='btn btn-info btn-account' id="action-email" >Changer l'adresse email</a>
                <a class='btn btn-info btn-account' id="action-password">Changer le mot de passe</a>       
            </div>

            <div class="form-account" id="form-account-email"  hidden="hidden">
                <?= $this->Form->create($user) ?>
                <fieldset>
                    <h3 class="h4-white">Modifier votre adresse email</h3>
                    <?php
                        echo $this->Form->input('email', ['type' => 'email' , 'label'=> ['text'=>'Nouvelle adresse email', 'class' => 'lab-white']]);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit'), array('name'=>'btn1')) ?>
                <?= $this->Form->end() ?>
            </div>

            <div class="form-account" id="form-account-password" hidden="hidden">
                <?= $this->Form->create($user) ?>
                <fieldset>
                    <h4 class="h4-white">Modifier votre mot de passe</h4>
                    <?= $this->Form->input('old_password',['type' => 'password' , 'label'=> ['text'=>'Mot de passe actuel', 'class' => 'lab-white']])?>
                    <?= $this->Form->input('password1',['type'=>'password' ,'label'=>['text'=>'Nouveau mot de passe', 'class' => 'lab-white']]) ?>
                    <?= $this->Form->input('password2',['type' => 'password' , 'label'=>['text'=>'Répétez le mot de passe', 'class' => 'lab-white']])?>
                </fieldset>
                <?= $this->Form->button(__('Submit'), array('name' => 'btn2')) ?>
                <?= $this->Form->end() ?>
            </div>

        </div>

        <div class="activity-content center">
            <h4 class="h4-white">Votre activité</h4>
            <hr>
            <br><br><br>
        </div>
    </div>
    
</div>
    
    
   

