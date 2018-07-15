<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ToWatchMovie[]|\Cake\Collection\CollectionInterface $toWatchMovies
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New To Watch Movie'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="toWatchMovies index large-9 medium-8 columns content">
    <h3><?= __('To Watch Movies') ?></h3>
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
            <?php foreach ($toWatchMovies as $toWatchMovie): ?>
            <tr>
                <td><?= $this->Number->format($toWatchMovie->id) ?></td>
                <td><?= $toWatchMovie->has('user') ? $this->Html->link($toWatchMovie->user->id, ['controller' => 'Users', 'action' => 'view', $toWatchMovie->user->id]) : '' ?></td>
                <td><?= $toWatchMovie->has('movie') ? $this->Html->link($toWatchMovie->movie->name, ['controller' => 'Movies', 'action' => 'view', $toWatchMovie->movie->id]) : '' ?></td>
                <td><?= h($toWatchMovie->created) ?></td>
                <td><?= h($toWatchMovie->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $toWatchMovie->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $toWatchMovie->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $toWatchMovie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $toWatchMovie->id)]) ?>
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
