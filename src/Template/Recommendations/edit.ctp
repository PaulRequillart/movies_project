<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recommendation $recommendation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $recommendation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $recommendation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Recommendations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recommendations form large-9 medium-8 columns content">
    <?= $this->Form->create($recommendation) ?>
    <fieldset>
        <legend><?= __('Edit Recommendation') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('movie_id', ['options' => $movies]);
            echo $this->Form->control('message');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
