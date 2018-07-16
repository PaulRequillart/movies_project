<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="container no-border">
    <h4 class="centerh">Informations personnelles</h3>
    <p>Bienvenue <span><?= h($user->prenom).' '.h($user->nom); ?></span></p>
    <div class="infos">
    
        <p>Nom d'utilisateur : <span><?= h($user->username) ?></span></p>
        <p>Adresse email : <span><?= h($user->email) ?></span></p>
        <p>Création du compte le : <span><?= date_format($user->created, 'd/m/Y') ?> à <?=date_format($user->created, 'H:i:s')?></span></p>
        <p>Dernière modification du compte le : <span><?= date_format($user->modified, 'd/m/Y') ?> à <?=date_format($user->modified, 'H:i:s')?></span></p>
    </div>
</div>

<div class="container no-border center">
    <div class="">
        <a class='btn btn-info' onclick="editEmail()">Changer l'adresse email</a>
        <a class='btn btn-info' onclick="editPassword()">Changer votre mot de passe</a>       

        <script>
            function editEmail() {
                if(document.getElementById("formEmail").style.display == "none"){
                    document.getElementById("formEmail").style.display = "block";
                }else{
                    document.getElementById("formEmail").style.display = "none"
                }
            }

            function editPassword() {
                if(document.getElementById("formPassword").style.display == "none"){
                    document.getElementById("formPassword").style.display = "block";
                }else{
                    document.getElementById("formPassword").style.display = "none"
                }
            }
        </script>

    </div>

    <div id="formEmail" style="display:none">
        <?= $this->Form->create($user) ?>
        <fieldset>
            <?php
                echo $this->Form->control('email');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), array('name'=>'btn1')) ?>
        <?= $this->Form->end() ?>
    </div>

    <div id="formPassword" style="display:none">
        <?= $this->Form->create($user) ?>
        <fieldset>
            <legend><?= __('Change password') ?></legend>
            <?= $this->Form->input('old_password',['type' => 'password' , 'label'=>'Old password'])?>
            <?= $this->Form->input('password1',['type'=>'password' ,'label'=>'Password']) ?>
            <?= $this->Form->input('password2',['type' => 'password' , 'label'=>'Repeat password'])?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), array('name' => 'btn2')) ?>
        <?= $this->Form->end() ?>
    <div>
</div>
    
    
   

