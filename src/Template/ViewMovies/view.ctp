<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ViewMovie $viewMovie
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit View Movie'), ['action' => 'edit', $viewMovie->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete View Movie'), ['action' => 'delete', $viewMovie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $viewMovie->id)]) ?> </li>
        <li><?= $this->Html->link(__('List View Movies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New View Movie'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="viewMovies view large-9 medium-8 columns content">
    <h3><?= h($viewMovie->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $viewMovie->has('user') ? $this->Html->link($viewMovie->user->id, ['controller' => 'Users', 'action' => 'view', $viewMovie->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Movie') ?></th>
            <td><?= $viewMovie->has('movie') ? $this->Html->link($viewMovie->movie->name, ['controller' => 'Movies', 'action' => 'view', $viewMovie->movie->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($viewMovie->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($viewMovie->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($viewMovie->modified) ?></td>
        </tr>
    </table>
</div>
