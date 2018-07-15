<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ToWatchMovie $toWatchMovie
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit To Watch Movie'), ['action' => 'edit', $toWatchMovie->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete To Watch Movie'), ['action' => 'delete', $toWatchMovie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $toWatchMovie->id)]) ?> </li>
        <li><?= $this->Html->link(__('List To Watch Movies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New To Watch Movie'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="toWatchMovies view large-9 medium-8 columns content">
    <h3><?= h($toWatchMovie->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $toWatchMovie->has('user') ? $this->Html->link($toWatchMovie->user->id, ['controller' => 'Users', 'action' => 'view', $toWatchMovie->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Movie') ?></th>
            <td><?= $toWatchMovie->has('movie') ? $this->Html->link($toWatchMovie->movie->name, ['controller' => 'Movies', 'action' => 'view', $toWatchMovie->movie->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($toWatchMovie->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($toWatchMovie->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($toWatchMovie->modified) ?></td>
        </tr>
    </table>
</div>
