<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Friendship $friendship
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Friendship'), ['action' => 'edit', $friendship->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Friendship'), ['action' => 'delete', $friendship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $friendship->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Friendships'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Friendship'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="friendships view large-9 medium-8 columns content">
    <h3><?= h($friendship->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($friendship->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($friendship->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User From') ?></th>
            <td><?= $this->Number->format($friendship->user_from) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User To') ?></th>
            <td><?= $this->Number->format($friendship->user_to) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($friendship->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($friendship->modified) ?></td>
        </tr>
    </table>
</div>
