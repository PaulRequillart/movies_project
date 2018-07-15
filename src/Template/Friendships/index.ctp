<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Friendship[]|\Cake\Collection\CollectionInterface $friendships
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Friendship'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="friendships index large-9 medium-8 columns content">
    <h3><?= __('Friendships') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_from') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_to') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($friendships as $friendship): ?>
            <tr>
                <td><?= $this->Number->format($friendship->id) ?></td>
                <td><?= $this->Number->format($friendship->user_from) ?></td>
                <td><?= $this->Number->format($friendship->user_to) ?></td>
                <td><?= h($friendship->status) ?></td>
                <td><?= h($friendship->created) ?></td>
                <td><?= h($friendship->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $friendship->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $friendship->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $friendship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $friendship->id)]) ?>
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
