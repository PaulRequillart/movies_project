<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Friendship $friendship
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $friendship->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $friendship->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Friendships'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="friendships form large-9 medium-8 columns content">
    <?= $this->Form->create($friendship) ?>
    <fieldset>
        <legend><?= __('Edit Friendship') ?></legend>
        <?php
            echo $this->Form->control('user_from');
            echo $this->Form->control('user_to');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
