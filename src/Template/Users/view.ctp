<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Likes'), ['controller' => 'Likes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Like'), ['controller' => 'Likes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recommendations'), ['controller' => 'Recommendations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recommendation'), ['controller' => 'Recommendations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Scores'), ['controller' => 'Scores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Score'), ['controller' => 'Scores', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List To Watch Movies'), ['controller' => 'ToWatchMovies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New To Watch Movie'), ['controller' => 'ToWatchMovies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List View Movies'), ['controller' => 'ViewMovies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New View Movie'), ['controller' => 'ViewMovies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Likes') ?></h4>
        <?php if (!empty($user->likes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Movie Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->likes as $likes): ?>
            <tr>
                <td><?= h($likes->id) ?></td>
                <td><?= h($likes->user_id) ?></td>
                <td><?= h($likes->movie_id) ?></td>
                <td><?= h($likes->created) ?></td>
                <td><?= h($likes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Likes', 'action' => 'view', $likes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Likes', 'action' => 'edit', $likes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Likes', 'action' => 'delete', $likes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $likes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Recommendations') ?></h4>
        <?php if (!empty($user->recommendations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Movie Id') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->recommendations as $recommendations): ?>
            <tr>
                <td><?= h($recommendations->id) ?></td>
                <td><?= h($recommendations->user_id) ?></td>
                <td><?= h($recommendations->movie_id) ?></td>
                <td><?= h($recommendations->message) ?></td>
                <td><?= h($recommendations->created) ?></td>
                <td><?= h($recommendations->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Recommendations', 'action' => 'view', $recommendations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Recommendations', 'action' => 'edit', $recommendations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Recommendations', 'action' => 'delete', $recommendations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recommendations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Scores') ?></h4>
        <?php if (!empty($user->scores)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Movie Id') ?></th>
                <th scope="col"><?= __('Value') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->scores as $scores): ?>
            <tr>
                <td><?= h($scores->id) ?></td>
                <td><?= h($scores->user_id) ?></td>
                <td><?= h($scores->movie_id) ?></td>
                <td><?= h($scores->value) ?></td>
                <td><?= h($scores->message) ?></td>
                <td><?= h($scores->created) ?></td>
                <td><?= h($scores->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Scores', 'action' => 'view', $scores->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Scores', 'action' => 'edit', $scores->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Scores', 'action' => 'delete', $scores->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scores->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related To Watch Movies') ?></h4>
        <?php if (!empty($user->to_watch_movies)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Movie Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->to_watch_movies as $toWatchMovies): ?>
            <tr>
                <td><?= h($toWatchMovies->id) ?></td>
                <td><?= h($toWatchMovies->user_id) ?></td>
                <td><?= h($toWatchMovies->movie_id) ?></td>
                <td><?= h($toWatchMovies->created) ?></td>
                <td><?= h($toWatchMovies->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ToWatchMovies', 'action' => 'view', $toWatchMovies->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ToWatchMovies', 'action' => 'edit', $toWatchMovies->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ToWatchMovies', 'action' => 'delete', $toWatchMovies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $toWatchMovies->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related View Movies') ?></h4>
        <?php if (!empty($user->view_movies)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Movie Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->view_movies as $viewMovies): ?>
            <tr>
                <td><?= h($viewMovies->id) ?></td>
                <td><?= h($viewMovies->user_id) ?></td>
                <td><?= h($viewMovies->movie_id) ?></td>
                <td><?= h($viewMovies->created) ?></td>
                <td><?= h($viewMovies->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ViewMovies', 'action' => 'view', $viewMovies->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ViewMovies', 'action' => 'edit', $viewMovies->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ViewMovies', 'action' => 'delete', $viewMovies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $viewMovies->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
