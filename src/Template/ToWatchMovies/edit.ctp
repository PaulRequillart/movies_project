<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ToWatchMovie $toWatchMovie
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $toWatchMovie->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $toWatchMovie->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List To Watch Movies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="toWatchMovies form large-9 medium-8 columns content">
    <?= $this->Form->create($toWatchMovie) ?>
    <fieldset>
        <legend><?= __('Edit To Watch Movie') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('movie_id', ['options' => $movies]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
