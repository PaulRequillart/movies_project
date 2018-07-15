<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ViewMovie[]|\Cake\Collection\CollectionInterface $viewMovies
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New View Movie'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="viewMovies index large-9 medium-8 columns content">
    <h3><?= __('View Movies') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('movie_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($viewMovies as $viewMovie): ?>
            <tr>
                <td><?= $this->Number->format($viewMovie->id) ?></td>
                <td><?= $viewMovie->has('user') ? $this->Html->link($viewMovie->user->id, ['controller' => 'Users', 'action' => 'view', $viewMovie->user->id]) : '' ?></td>
                <td><?= $viewMovie->has('movie') ? $this->Html->link($viewMovie->movie->name, ['controller' => 'Movies', 'action' => 'view', $viewMovie->movie->id]) : '' ?></td>
                <td><?= h($viewMovie->created) ?></td>
                <td><?= h($viewMovie->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $viewMovie->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $viewMovie->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $viewMovie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $viewMovie->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
